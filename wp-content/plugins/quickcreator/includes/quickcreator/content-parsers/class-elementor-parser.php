<?php

/**
 *  Parser that prepare data for Elementor
 *
 * @package QuickcreatorBlog
 * @link https://quickcreator.io
 */

namespace QuickcreatorBlog\Quickcreator\Content_Parsers;

use DOMDocument;
use Elementor\Frontend;

/**
 * Object that imports data from different sources into WordPress.
 */
class Elementor_Parser extends Content_Parser
{

	/**
	 * Parse content from Quickcrator to Gutenberg Editor.
	 *
	 * @param string $content  - Content from Quickcreator.
	 * @return string
	 */
	public function parse_content($content)
	{

		parent::parse_content($content);
		$content = wp_unslash($this->parse_default_content($content));

		return $content;
	}


	/**
	 * Parse images for classic editor.
	 *
	 * @param string $content - whole content.
	 * @return string content where <img> URLs are corrected to media library.
	 */
	private function parse_default_content($content)
	{

		$doc = new DOMDocument();
		$doc->loadHTML($content);

		$h1s = $doc->getElementsByTagName('h1');

		foreach ($h1s as $h1) {
			$h1_text = $this->get_inner_html($h1);
			if (wp_strip_all_tags($h1_text) === $this->title) {
				// @codingStandardsIgnoreLine
				$h1_string = $h1->ownerDocument->saveXML($h1);
				$content   = str_replace($h1_string, '', $content);
			}
		}

		$tags = $doc->getElementsByTagName('img');

		foreach ($tags as $tag) {
			$image_url = $tag->getAttribute('src');
			$image_alt = $tag->getAttribute('alt');

			$media_library_image_url = $this->download_img_to_media_library($image_url, $image_alt);

			$content = str_replace($image_url, $media_library_image_url, $content);
		}

		return $content;
	}

	/**
	 * Creates actual Elementor content.
	 *
	 * @param int $post_id - ID of the post.
	 * @return void
	 */
	public function run_after_post_insert_actions($post_id)
	{

		if (! defined('ELEMENTOR_VERSION')) {
			return;
		}

		update_post_meta($post_id, '_elementor_edit_mode', 'builder');
		update_post_meta($post_id, '_elementor_template_type', 'wp-post');
		update_post_meta($post_id, '_elementor_version', ELEMENTOR_VERSION);
		update_post_meta($post_id, '_elementor_data', $this->get_elementor_data($post_id));
		// update_post_meta($post_id, '_elementor_page_assets', $this->get_page_assets($post_id));
	}

	/**
	 * Returns page assets for Elementor post.
	 *
	 * @param int $post_id - ID of the post.
	 * @return string
	 */
	private function get_elementor_data($post_id)
	{

		$content = wp_unslash(get_the_content(null, false, $post_id));

		$doc = new DOMDocument();

		$utf8_fix_prefix = '<html><head><meta http-equiv="content-type" content="text/html; charset=utf-8" /></head><body>';
		$utf8_fix_suffix = '</body></html>';

		$doc->loadHTML($utf8_fix_prefix . $content . $utf8_fix_suffix, LIBXML_HTML_NODEFDTD | LIBXML_SCHEMA_CREATE);

		$document                 = new \stdClass();
		$document->id             = substr(wp_generate_uuid4(), 0, 8);
		$document->elType         = 'container'; // @codingStandardsIgnoreLine
		$settings                 = new \stdClass();
		$settings->flex_direction = 'column';
		$document->settings       = $settings;
		$document->elements       = array();
		$document->isInner        = null; // @codingStandardsIgnoreLine

		$this->parse_dom_node($doc, $document->elements);

		return wp_json_encode(array($document), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
	}


	/**
	 * Function interates by HTML tags in provided content.
	 *
	 * @param DOMDocument $parent_node - node to parse.
	 * @param array       $content     - reference to content variable, to store Gutenberg output.
	 * @return void
	 */
	private function parse_dom_node($parent_node, &$content)
	{
		// @codingStandardsIgnoreLine
		foreach ($parent_node->childNodes as $node) {

			// @codingStandardsIgnoreLine
			$execute_for_child = $this->check_if_execute_recurrence($node->nodeName);

			$parsed_node = $this->parse_certain_node_type($node);
			if ('' !== $parsed_node && ! empty($parsed_node)) {
				$content[] = $parsed_node;
			}

			if ($execute_for_child && $node->hasChildNodes()) {
				$this->parse_dom_node($node, $content);
			}
		}
	}

	/**
	 * Function checks if we want to dig deep into content scheme.
	 *
	 * @param string $node_type - name of the node, example: ul, p, h1.
	 * @return bool
	 */
	private function check_if_execute_recurrence($node_type)
	{

		$execute_for_child = true;

		if (in_array($node_type, array('ul', 'ol', 'p', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'h7', 'img', 'blockquote', 'table', 'iframe', 'qc-block'), true)) {
			$execute_for_child = false;
		}

		return $execute_for_child;
	}

	/**
	 * Function prepares attributes and run correct parser function for certain node type.
	 *
	 * @param DOMElement $node - node to parse.
	 * @return string
	 */
	private function parse_certain_node_type($node)
	{

		// @codingStandardsIgnoreLine
		$node_name = $node->nodeName;

		if ('p' === $node_name) {
			return $this->parse_node_p($node);
		}

		if ('ul' === $node_name) {
			return $this->parse_node_ul($node);
		}

		if ('ol' === $node_name) {
			return $this->parse_node_ol($node);
		}

		if (0 === strpos($node_name, 'h') && 'html' !== $node_name && 'hr' !== $node_name && 'head' !== $node_name) {
			return $this->parse_node_h($node);
		}

		if ('img' === $node_name) {
			return $this->parse_node_img($node);
		}

		if ('blockquote' === $node_name) {
			return $this->parse_node_blockquote($node);
		}

		if ('table' === $node_name) {
			return $this->parse_node_table($node);
		}

		if ('iframe' === $node_name) {
			return $this->parse_node_iframe($node);
		}

		if ('qc-block' === $node_name) {
			return $this->parse_node_qc_block($node);
		}

		return '';
	}

	/**
	 * Parses <p> node.
	 *
	 * @param DOMElement $node - node to parse.
	 * @return stdClass
	 */
	private function parse_node_p($node)
	{

		$attributes = $this->parse_node_attributes($node);

		$element         = new \stdClass();
		$element->id     = substr(wp_generate_uuid4(), 0, 8);
		$element->elType = 'widget'; // @codingStandardsIgnoreLine

		$settings         = new \stdClass();
		$settings->editor = '<p>' . str_replace("\'", "'", addslashes($this->get_inner_html($node))) . '</p>';

		if (isset($attributes['align'])) {
			$settings->align = $attributes['align'];
		}

		$element->settings = $settings;

		$element->elements   = array();
		$element->widgetType = 'text-editor'; // @codingStandardsIgnoreLine

		return $element;
	}

	/**
	 * Parses <ul> node.
	 *
	 * @param DOMElement $node - node to parse.
	 * @return stdClass
	 */
	private function parse_node_ul($node)
	{

		$attributes = $this->parse_node_attributes($node);

		$element         = new \stdClass();
		$element->id     = substr(wp_generate_uuid4(), 0, 8);
		$element->elType = 'widget'; // @codingStandardsIgnoreLine

		$settings = new \stdClass();
		$settings->editor = '<ul>' . str_replace("\'", "'", addslashes($this->get_inner_html($node))) . '</ul>';

		if (isset($attributes['align'])) {
			$settings->align = $attributes['align'];
		}

		$element->settings = $settings;

		$element->elements   = array();
		$element->widgetType = 'text-editor'; // @codingStandardsIgnoreLine

		return $element;
	}

	/**
	 * Parses <ol> node.
	 *
	 * @param DOMElement $node - node to parse.
	 * @return stdClass
	 */
	private function parse_node_ol($node)
	{

		$attributes = $this->parse_node_attributes($node);

		$element         = new \stdClass();
		$element->id     = substr(wp_generate_uuid4(), 0, 8);
		$element->elType = 'widget'; // @codingStandardsIgnoreLine

		$settings = new \stdClass();
		$settings->editor = '<ol>' . str_replace("\'", "'", addslashes($this->get_inner_html($node))) . '</ol>';

		if (isset($attributes['align'])) {
			$settings->align = $attributes['align'];
		}

		$element->settings = $settings;

		$element->elements   = array();
		$element->widgetType = 'text-editor'; // @codingStandardsIgnoreLine

		return $element;
	}

	/**
	 * Parses <h1-6> nodes
	 *
	 * @param DOMElement $node - node to parse.
	 * @return string
	 */
	private function parse_node_h($node)
	{

		$element         = new \stdClass();
		$element->id     = substr(wp_generate_uuid4(), 0, 8);
		$element->elType = 'widget'; // @codingStandardsIgnoreLine

		// @codingStandardsIgnoreLine
		$node_name = $node->nodeName;

		$settings              = new \stdClass();
		$settings->title       = str_replace("\'", "'", addslashes($this->get_inner_html($node)));
		$settings->header_size = $node_name;
		$element->settings     = $settings;

		$element->elements   = array();
		$element->widgetType = 'heading'; // @codingStandardsIgnoreLine

		return $element;
	}

	/**
	 * Parses <img> node.
	 *
	 * @param DOMElement $node - node to parse.
	 * @return string
	 */
	private function parse_node_img($node)
	{

		$attributes = $this->parse_node_attributes($node);

		$image_url = '';
		$image_alt = '';

		if (isset($attributes['src']) && ! empty($attributes['src'])) {
			$image_url = $attributes['src'];
		}

		if (isset($attributes['alt']) && ! empty($attributes['alt'])) {
			$image_alt = $attributes['alt'];
		}

		$image_data = $this->download_img_to_media_library($image_url, $image_alt, false);
		$image_url  = $image_data['url'];
		$image_id   = $image_data['id'];

		$caption = null;
		if (isset($node->parentNode) && 'figure' === $node->parentNode->nodeName) {
			foreach ($node->parentNode->childNodes as $child) {
				if ('figcaption' === $child->nodeName) {
					$caption = str_replace("\'", "'", addslashes($this->get_inner_html($child)));
				}
			}
		}

		$element         = new \stdClass();
		$element->id     = substr(wp_generate_uuid4(), 0, 8);
		$element->elType = 'widget'; // @codingStandardsIgnoreLine

		$image         = new \stdClass();
		$image->url    = $image_url;
		$image->id     = $image_id;
		$image->size   = null;
		$image->alt    = $image_alt;
		$image->source = 'library';

		$settings        = new \stdClass();
		$settings->title = 'Header';
		$settings->image = $image;
		if (isset($caption)) {
			$settings->caption_source = "custom";
			$settings->caption        = $caption;
		}

		$element->settings = $settings;

		$element->elements   = array();
		$element->widgetType = 'image'; // @codingStandardsIgnoreLine

		return $element;
	}

	/**
	 * Parses <blockquote> node.
	 *
	 * @param DOMElement $node - node to parse.
	 * @return string
	 */
	private function parse_node_blockquote($node)
	{

		$node_content = str_replace("\'", "'", addslashes($this->get_inner_html($node)));
		if (empty($node_content) || '' === $node_content) {
			return '';
		}

		$element         = new \stdClass();
		$element->id     = substr(wp_generate_uuid4(), 0, 8);
		$element->elType = 'widget'; // @codingStandardsIgnoreLine

		$settings          = new \stdClass();
		$settings->html    = '<blockquote>' . $node_content . '</blockquote>';
		$element->settings = $settings;

		$element->elements   = array();
		$element->widgetType = 'html'; // @codingStandardsIgnoreLine

		return $element;
	}

	/**
	 * Parses <table> node.
	 *
	 * @param DOMElement $node - node to parse.
	 * @return string
	 */
	private function parse_node_table($node)
	{

		$element         = new \stdClass();
		$element->id     = substr(wp_generate_uuid4(), 0, 8);
		$element->elType = 'widget'; // @codingStandardsIgnoreLine

		$settings          = new \stdClass();
		$settings->html    = '<table>' . str_replace("\'", "'", addslashes($this->get_inner_html($node))) . '</table>';
		$element->settings = $settings;

		$element->elements   = array();
		$element->widgetType = 'html'; // @codingStandardsIgnoreLine

		return $element;
	}

	/**
	 * Parses <iframe> node.
	 *
	 * @param DOMElement $node - node to parse.
	 * @return string
	 */
	private function parse_node_iframe($node)
	{
		$iframe_url = "";
		$attributes = $this->parse_node_attributes($node);
		if (isset($attributes['src']) && ! empty($attributes['src'])) {
			$iframe_url = $attributes['src'];
		}

		// check youtube
		if (false !== strpos($iframe_url, 'youtube.com')) {
			$element         = new \stdClass();
			$element->id     = substr(wp_generate_uuid4(), 0, 8);
			$element->elType = 'widget';

			$settings = new \stdClass();
			$settings->youtube_url = $iframe_url;
			$settings->video_type = "youtube";
			$element->settings = $settings;
			$element->elements   = array();
			$element->widgetType = 'video';
		} else if (false !== strpos($iframe_url, 'vimeo.com')) {
			$element         = new \stdClass();
			$element->id     = substr(wp_generate_uuid4(), 0, 8);
			$element->elType = 'widget';

			$settings = new \stdClass();
			$settings->video_type = "vimeo";
			$settings->vimeo_url = $iframe_url;
			$element->settings = $settings;
			$element->elements   = array();
			$element->widgetType = 'video';
		} else {
			$element         = new \stdClass();
			$element->id     = substr(wp_generate_uuid4(), 0, 8);
			$element->elType = 'widget'; // @codingStandardsIgnoreLine

			$settings          = new \stdClass();
			$attributes = str_replace('\n', '', $this->glue_attributes($attributes));
			$settings->html    = '<iframe ' . $attributes . '></iframe>';
			$element->settings = $settings;

			$element->elements   = array();
			$element->widgetType = 'html'; // @codingStandardsIgnoreLine
		}
		return $element;
	}

	/**
	 * Parses <qc-block> node.
	 *
	 * @param DOMElement $node - node to parse.
	 * @return string
	 */ private function parse_node_qc_block($node)
	{

		$element         = new \stdClass();
		$element->id     = substr(wp_generate_uuid4(), 0, 8);
		$element->elType = 'widget'; // @codingStandardsIgnoreLine

		$settings          = new \stdClass();
		$settings->html    = str_replace("\'", "'", addslashes($this->get_inner_html($node)));
		$element->settings = $settings;

		$element->elements   = array();
		$element->widgetType = 'html'; // @codingStandardsIgnoreLine

		return $element;
	}

	/**
	 * Functions prepare attributes for HTML and Gutendber tags.
	 *
	 * @param DOMElement $node - node to parse.
	 * @return array
	 */
	private function parse_node_attributes($node)
	{

		$attributes_array = array();

		if ($node->hasAttributes()) {

			// @codingStandardsIgnoreLine
			$node_name  = $node->nodeName;

			foreach ($node->attributes as $attr) {

				// @codingStandardsIgnoreLine
				$attr_name  = $attr->nodeName;
				// @codingStandardsIgnoreLine
				$attr_value = $attr->nodeValue;

				if ('contenteditable' === $attr_name) {
					continue;
				}

				$attributes_array[$attr_name] = $attr_value;

				if (in_array($node_name, array('h2', 'h3', 'h4', 'h5', 'h6', 'h7'), true) && 'style' === $attr_name) {
					$special_h        = $this->parse_styles_special_attributes($attr_value);
					$attributes_array = array_merge($attributes_array, $special_h);
				}

				if ('p' === $node_name && 'style' === $attr_name) {
					$special_p        = $this->parse_styles_special_attributes($attr_value);
					$attributes_array = array_merge($attributes_array, $special_p);
				}
			}
		}

		return $attributes_array;
	}

	/**
	 * Parses special styles attributes for h and p tags.
	 *
	 * @param string $styles_string - string with styles.
	 * @return array
	 */
	private function parse_styles_special_attributes($styles_string)
	{
		$styles       = explode(';', $styles_string);
		$styles_assoc = array();
		foreach ($styles as $style) {
			$s                     = explode(':', $style);
			$styles_assoc[$s[0]] = trim($s[1]);
		}

		$attributes = array();
		if (key_exists('text-align', $styles_assoc)) {
			$styles_assoc['text-align'] = str_replace('start', 'left', $styles_assoc['text-align']);
			$styles_assoc['text-align'] = str_replace('end', 'right', $styles_assoc['text-align']);

			$attributes['align'] = $styles_assoc['text-align'];
		}

		return $attributes;
	}
}
