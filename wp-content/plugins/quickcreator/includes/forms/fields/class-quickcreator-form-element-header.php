<?php

/**
 *  Class to handle header in forms.
 *
 * @package Quickcreator
 * @link https://quickcreator.io
 */

namespace QuickcreatorBlog\Forms\Fields;


/**
 * Class to handle header in forms.
 */
class Quickcreator_Form_Element_Header extends Quickcreator_Form_Element
{

	/**
	 * Default construct for text fields.
	 *
	 * @param string $name - name of the field.
	 */
	public function __construct($name)
	{
		parent::__construct($name);

		$this->type = 'header';
	}

	/**
	 * Executed field default renderer.
	 *
	 * @return void
	 */
	protected function default_renderer()
	{
		ob_start();
?>
		<h2 id="<?php echo esc_html($this->name); ?>" class="<?php echo esc_html($this->get_classes()); ?>">
			<?php echo esc_html($this->label); ?>
		</h2>
<?php
		$content = ob_get_clean();

		echo wp_kses($content, parent::return_allowed_html_for_forms_elements());
	}
}
