<?php
/**
 * P Blog Featured Content
 *
 * This module allows you to define a subset of posts to be displayed
 * with a full background image once thumbail is set.
 *
 */
function pblog_featured_check_box() {

    $screens = array( 'post' );//we only need Featured filter in post

    foreach ( $screens as $screen ) {

        add_meta_box(
            'featured_check_box',
            __( 'Is this a featured post?', 'pblog' ),
            'pblog_inner_featured_check_box',
            $screen,
            'side',
            'high'
        );
    }
}
add_action( 'add_meta_boxes', 'pblog_featured_check_box' );

/**
 * Prints the box content.
 * 
 * @param WP_Post $post The object for the current post/page.
 */
function pblog_inner_featured_check_box( $post ) {

  // Add an nonce field so we can check for it later.
  wp_nonce_field( 'pblog_inner_featured_check_box', 'pblog_inner_featured_check_box_nonce' );

  /*
   * Use get_post_meta() to retrieve an existing value
   * from the database and use the value for the form.
   */
  $value = get_post_meta( $post->ID, 'pblog_featured', true );
  if(!$value) $value = 'no';?>

  <input type="checkbox" id="featured_check_box" name="featured_check_box" value="<?php echo $value;?>" <?php checked( $value, 'yes' ); ?>>
  <label for="featured_check_box">
       <?php _e( 'If this is checked as a featured post, it will be displayed with a full image background once thumbnail is set', 'pblog' );?>
  </label>
  
<?php }

/**
 * When the post is saved, saves our custom data.
 *
 * @param int $post_id The ID of the post being saved.
 */
function pblog_featured_save_postdata( $post_id ) {

  /*
   * We need to verify this came from the our screen and with proper authorization,
   * because save_post can be triggered at other times.
   */

  // Check if our nonce is set.
  if ( ! isset( $_POST['pblog_inner_featured_check_box_nonce'] ) )
    return $post_id;

  $nonce = $_POST['pblog_inner_featured_check_box_nonce'];

  // Verify that the nonce is valid.
  if ( ! wp_verify_nonce( $nonce, 'pblog_inner_featured_check_box' ) )
      return $post_id;

  // If this is an autosave, our form has not been submitted, so we don't want to do anything.
  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
      return $post_id;

  // Check the user's permissions.
  if ( 'post' == $_POST['post_type'] ) {

    if ( ! current_user_can( 'edit_post', $post_id ) )
        return $post_id;
  }

  /* OK, its safe for us to save the data now. */

  // Checks for input and saves
  if( isset( $_POST[ 'featured_check_box' ] ) ) {
    update_post_meta( $post_id, 'pblog_featured', 'yes' );
  } else {
    update_post_meta( $post_id, 'pblog_featured', 'no' );
  }
}
add_action( 'save_post', 'pblog_featured_save_postdata' );