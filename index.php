<?php 
/*
 Plugin Name: FOSTER CHARITY PRO POSTTYPE
 lugin URI: https://www.themeseye.com/
 Description: Creating new post type for TS Gym Pro Theme.
 Author: Themeseye
 Version: 1.0
 Author URI: https://www.themeseye.com/
*/

define( 'FOSTER_CHARITY_PRO_POSTTYPE_VERSION', '1.0' );
add_action( 'init', 'foster_charity_pro_posttype_create_post_type' );

function foster_charity_pro_posttype_create_post_type() {
  register_post_type( 'cause',
    array(
      'labels' => array(
        'name' => __( 'Urgent Causes','foster-charity-pro-posttype' ),
        'singular_name' => __( 'Urgent Cause','foster-charity-pro-posttype' )
      ),
      'capability_type' => 'post',
      'menu_icon'  => 'dashicons-portfolio',
      'public' => true,
      'supports' => array(
        'title',
        'editor',
        'thumbnail'
      )
    )
  );
  register_post_type( 'causes_attention',
    array(
      'labels' => array(
        'name' => __( 'Causes Need Attention','foster-charity-pro-posttype' ),
        'singular_name' => __( 'Causes Need Attention','foster-charity-pro-posttype' )
      ),
      'capability_type' => 'post',
      'menu_icon'  => 'dashicons-portfolio',
      'public' => true,
      'supports' => array(
        'title',
        'editor',
        'thumbnail'
      )
    )
  );
  register_post_type( 'events',
    array(
      'labels' => array(
        'name' => __( 'Upcoming Events','foster-charity-pro-posttype' ),
        'singular_name' => __( 'Upcoming Events','foster-charity-pro-posttype' )
      ),
      'capability_type' => 'post',
      'menu_icon'  => 'dashicons-portfolio',
      'public' => true,
      'supports' => array(
        'title',
        'editor',
        'thumbnail'
      )
    )
  );
  register_post_type( 'donors',
    array(
      'labels' => array(
        'name' => __( 'Charity Donors','foster-charity-pro-posttype' ),
        'singular_name' => __( 'Upcoming Events','foster-charity-pro-posttype' )
      ),
      'capability_type' => 'post',
      'menu_icon'  => 'dashicons-portfolio',
      'public' => true,
      'supports' => array(
        'title',
        'editor',
        'thumbnail'
      )
    )
  );
  register_post_type( 'testimonials',
    array(
  		'labels' => array(
  			'name' => __( 'Testimonials','foster-charity-pro-posttype' ),
  			'singular_name' => __( 'Testimonials','foster-charity-pro-posttype' )
  		),
  		'capability_type' => 'post',
  		'menu_icon'  => 'dashicons-businessman',
  		'public' => true,
  		'supports' => array(
  			'title',
  			'editor',
  			'thumbnail'
  		)
		)
	);
}

/*--------------- Urgent Causes section ----------------*/
/* Adds a meta box to the portfolio editing screen */
function foster_charity_pro_posttype_bn_work_meta_box() {
  add_meta_box( 'foster-charity-pro-posttype-portfolio-meta', __( 'Enter Details', 'foster-charity-pro-posttype' ), 'foster_charity_pro_posttype_bn_work_meta_callback', 'cause', 'normal', 'high' );
}
// Hook things in for admin
if (is_admin()){
    add_action('admin_menu', 'foster_charity_pro_posttype_bn_work_meta_box');
}
/* Adds a meta box for custom post */
function foster_charity_pro_posttype_bn_work_meta_callback( $post ) {
  wp_nonce_field( basename( __FILE__ ), 'vw_work_meta_nonce' );
  $bn_stored_meta = get_post_meta( $post->ID );
  $bn_foster_charity_pro_posttype_organizer = '';
  if(!empty($bn_stored_meta['foster_charity_pro_posttype_organizer'][0]))
      $bn_foster_charity_pro_posttype_organizer = $bn_stored_meta['foster_charity_pro_posttype_organizer'][0];
    else
      $bn_foster_charity_pro_posttype_location = '';
  if(!empty($bn_stored_meta['foster_charity_pro_posttype_location'][0]))
      $bn_foster_charity_pro_posttype_location = $bn_stored_meta['foster_charity_pro_posttype_location'][0];
    else
      $bn_foster_charity_pro_posttype_pledged = '';
  if(!empty($bn_stored_meta['foster_charity_pro_posttype_pledged'][0]))
      $bn_foster_charity_pro_posttype_pledged = $bn_stored_meta['foster_charity_pro_posttype_pledged'][0];
    else
      $bn_foster_charity_pro_posttype_funded = '';
  if(!empty($bn_stored_meta['foster_charity_pro_posttype_funded'][0]))
      $bn_foster_charity_pro_posttype_funded = $bn_stored_meta['foster_charity_pro_posttype_funded'][0];
     else
      $bn_foster_charity_pro_posttype_backers = '';
  if(!empty($bn_stored_meta['foster_charity_pro_posttype_backers'][0]))
      $bn_foster_charity_pro_posttype_backers = $bn_stored_meta['foster_charity_pro_posttype_backers'][0];
     else
      $bn_foster_charity_pro_posttype_days = '';
  if(!empty($bn_stored_meta['foster_charity_pro_posttype_days'][0]))
      $bn_foster_charity_pro_posttype_days = $bn_stored_meta['foster_charity_pro_posttype_days'][0];
   else
      $bn_foster_charity_pro_posttype_donate_now = '';
  if(!empty($bn_stored_meta['foster_charity_pro_posttype_donate_now'][0]))
      $bn_foster_charity_pro_posttype_donate_now = $bn_stored_meta['foster_charity_pro_posttype_donate_now'][0];
   else
      $bn_foster_charity_pro_posttype_donate_now_btnurl = '';
  if(!empty($bn_stored_meta['foster_charity_pro_posttype_donate_now_btn_url'][0]))
      $bn_foster_charity_pro_posttype_donate_now_btn_url = $bn_stored_meta['foster_charity_pro_posttype_donate_now_btnurl'][0];


  //date details
  if(!empty($bn_stored_meta['vw_work_project_url'][0]))
    $bn_vw_work_project_url = $bn_stored_meta['vw_work_project_url'][0];
  else
    $bn_vw_work_project_url = '';
    if(!empty($bn_stored_meta['meta-image'][0]))
      $bn_meta_image = $bn_stored_meta['meta-image'][0];
    else
      $bn_meta_image = '';
  $organizer = get_post_meta($post->id,'foster_charity_pro_posttype_organizer',true);
  $location = get_post_meta($post->id,'foster_charity_pro_posttype_location',true);
  $pledged = get_post_meta($post->id,'foster_charity_pro_posttype_pledged',true);
  $funded = get_post_meta($post->id,'foster_charity_pro_posttype_funded',true);
  $backers = get_post_meta($post->id,'foster_charity_pro_posttype_backers',true);
  $days = get_post_meta($post->id,'foster_charity_pro_posttype_days',true);
  $donate = get_post_meta($post->id,'foster_charity_pro_posttype_donate_now',true);
  $donate_url = get_post_meta($post->id,'foster_charity_pro_posttype_donate_now_btnurl',true);
  ?>
  <div id="portfolios_custom_stuff">
    <table id="list">
      <tbody id="the-list" data-wp-lists="list:meta">
        <tr id="meta-1">
          <td class="left">
            <?php _e( 'Organizer', 'foster-charity-pro-posttype' )?>
          </td>
          <td class="left" >
            <input type="text" name="foster_charity_pro_posttype_organizer" id="foster_charity_pro_posttype_organizer" value="<?php echo esc_attr( $bn_foster_charity_pro_posttype_organizer ); ?>" />
          </td>
        </tr>
        <tr id="meta-2">
          <p>
            <label for="meta-image"><?php echo esc_html('Icon Image'); ?></label><br>
            <input type="text" name="meta-image" id="meta-image" class="meta-image regular-text" value="<?php echo esc_attr($bn_meta_image); ?>">
            <input type="button" class="button image-upload" value="Browse">
          </p>
          <div class="image-preview"><img src="<?php echo $bn_stored_meta['meta-image'][0]; ?>" style="max-width: 250px;"></div>
        <tr>
        <tr id="meta-3">
          <td class="left">
            <?php _e( 'Location', 'foster-charity-pro-posttype' )?>
          </td>
          <td class="left" >
            <input type="textarea" name="foster_charity_pro_posttype_location" id="foster_charity_pro_posttype_location" value="<?php echo esc_attr( $bn_foster_charity_pro_posttype_location ); ?>" />
          </td>
        </tr>
        <tr id="meta-4">
          <td class="left">
            <?php _e( 'Pledged Amount', 'foster-charity-pro-posttype' )?>
          </td>
          <td class="left" >
            <input type="text" name="foster_charity_pro_posttype_pledged" id="foster_charity_pro_posttype_pledged" value="<?php echo esc_attr( $bn_foster_charity_pro_posttype_pledged ); ?>" />
          </td>
        </tr>
        <tr id="meta-5">
          <td class="left">
            <?php _e( 'Percentage of Amount Funded', 'foster-charity-pro-posttype' )?>
          </td>
          <td class="left" >
            <input type="range" list="tickmarks" onchange="textbox1.value = foster_charity_pro_posttype_funded.value" type="range" name="foster_charity_pro_posttype_funded" id="foster_charity_pro_posttype_funded" value="<?php echo esc_attr( $funded ); ?>" />
            <input id="textbox1" type="text" />
          </td>
        </tr>
         <datalist id="tickmarks">
          <option value="0" label="0%">
          <option value="10">
          <option value="20">
          <option value="30">
          <option value="40">
          <option value="50" label="50%">
          <option value="60">
          <option value="70">
          <option value="80">
          <option value="90">
          <option value="100" label="100%">
        </datalist>
        <tr id="meta-6">
          <td class="left">
            <?php _e( 'Backers', 'foster-charity-pro-posttype' )?>
          </td>
          <td class="left" >
            <input type="text" name="foster_charity_pro_posttype_backers" id="foster_charity_pro_posttype_backers" value="<?php echo esc_attr( $bn_foster_charity_pro_posttype_backers ); ?>" />
          </td>
        </tr>
        <tr id="meta-7">
          <td class="left">
            <?php _e( 'Days', 'foster-charity-pro-posttype' )?>
          </td>
          <td class="left" >
            <input type="text" name="foster_charity_pro_posttype_days" id="foster_charity_pro_posttype_days" value="<?php echo esc_attr( $bn_foster_charity_pro_posttype_days ); ?>" />
          </td>
        </tr>
        <tr id="meta-8">
          <td class="left">
            <?php _e( 'Donate Now Label', 'foster-charity-pro-posttype' )?>
          </td>
          <td class="left" >
            <input type="text" name="foster_charity_pro_posttype_donate_now" id="foster_charity_pro_posttype_donate_now" value="<?php echo esc_attr( $bn_foster_charity_pro_posttype_donate_now ); ?>" />
          </td>
        </tr>
        <tr id="meta-9">
          <td class="left">
            <?php _e( 'Donate Now URL', 'foster-charity-pro-posttype' )?>
          </td>
          <td class="left" >
            <input type="text" name="foster_charity_pro_posttype_donate_now_btnurl" id="foster_charity_pro_posttype_donate_now_btnurl" value="<?php echo esc_attr( $foster_charity_pro_posttype_donate_now_btnurl ); ?>" />
          </td>
        </tr>
      </tbody>
    </table>
  </div>
  <?php
}

/* Saves the custom meta input */
function foster_charity_pro_posttype_bn_meta_work_save( $post_id ) {
  if (!isset($_POST['vw_work_meta_nonce']) || !wp_verify_nonce($_POST['vw_work_meta_nonce'], basename(__FILE__))) {
    return;
  }

  if (!current_user_can('edit_post', $post_id)) {
    return;
  }

  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
    return;
  }

   // Save desig.
  if( isset( $_POST[ 'vw_work_project_url' ] ) ) {
    update_post_meta( $post_id, 'vw_work_project_url', esc_url($_POST[ 'vw_work_project_url']) );
  }

   // Save Image
  if( isset( $_POST[ 'meta-image' ] ) ) {
      update_post_meta( $post_id, 'meta-image', $_POST[ 'meta-image' ] );
  }

    // Save desig.
  if( isset( $_POST[ 'foster_charity_pro_posttype_organizer' ] ) ) {
    update_post_meta( $post_id, 'foster_charity_pro_posttype_organizer', sanitize_text_field($_POST[ 'foster_charity_pro_posttype_organizer']) );
  }

     // Save desig.
  if( isset( $_POST[ 'foster_charity_pro_posttype_location' ] ) ) {
    update_post_meta( $post_id, 'foster_charity_pro_posttype_location', sanitize_text_field($_POST[ 'foster_charity_pro_posttype_location']) );
  }

      // Save desig.
  if( isset( $_POST[ 'foster_charity_pro_posttype_pledged' ] ) ) {
    update_post_meta( $post_id, 'foster_charity_pro_posttype_pledged', sanitize_text_field($_POST[ 'foster_charity_pro_posttype_pledged']) );
  }

      // Save desig.
  if( isset( $_POST[ 'foster_charity_pro_posttype_funded' ] ) ) {
    update_post_meta( $post_id, 'foster_charity_pro_posttype_funded', sanitize_text_field($_POST[ 'foster_charity_pro_posttype_funded']) );
  }

      // Save desig.
  if( isset( $_POST[ 'foster_charity_pro_posttype_backers' ] ) ) {
    update_post_meta( $post_id, 'foster_charity_pro_posttype_backers', sanitize_text_field($_POST[ 'foster_charity_pro_posttype_backers']) );
  }

      // Save desig.
  if( isset( $_POST[ 'foster_charity_pro_posttype_days' ] ) ) {
    update_post_meta( $post_id, 'foster_charity_pro_posttype_days', sanitize_text_field($_POST[ 'foster_charity_pro_posttype_days']) );
  }

       // Save desig.
  if( isset( $_POST[ 'foster_charity_pro_posttype_donate_now' ] ) ) {
    update_post_meta( $post_id, 'foster_charity_pro_posttype_donate_now', sanitize_text_field($_POST[ 'foster_charity_pro_posttype_donate_now']) );
  }

  if( isset( $_POST[ 'foster_charity_pro_posttype_donate_now_btnurl' ] ) ) {
    update_post_meta( $post_id, 'foster_charity_pro_posttype_donate_now_btnurl', sanitize_text_field($_POST[ 'foster_charity_pro_posttype_donate_now_btnurl']) );
  }
}

add_action( 'save_post', 'foster_charity_pro_posttype_bn_meta_work_save' );

/*--------------------- Causes Need Attention Section ----------------------*/
// Causes Need Attention section
function foster_charity_pro_posttype_images_metabox_enqueue($hook) {
  if ( 'post.php' === $hook || 'post-new.php' === $hook ) {
    wp_enqueue_script('foster-charity-pro-posttype-images-metabox', plugin_dir_url( __FILE__ ) . '/js/img-metabox.js', array('jquery', 'jquery-ui-sortable'));

    global $post;
    if ( $post ) {
      wp_enqueue_media( array(
          'post' => $post->ID,
        )
      );
    }
  }
}
add_action('admin_enqueue_scripts', 'foster_charity_pro_posttype_images_metabox_enqueue');
// Services Meta
function foster_charity_pro_posttype_bn_custom_meta_programs() {

    add_meta_box( 'bn_meta', __( 'Icon Image', 'foster-charity-pro-posttype-posttype' ), 'foster_charity_pro_posttype_bn_meta_callback_programs', 'causes_attention', 'normal', 'high' );
}
/* Hook things in for admin*/
if (is_admin()){
  add_action('admin_menu', 'foster_charity_pro_posttype_bn_custom_meta_programs');
}

function foster_charity_pro_posttype_bn_meta_callback_programs( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'bn_nonce' );
    $bn_stored_meta = get_post_meta( $post->ID );
    //Work category details
      $bn_foster_charity_pro_posttype_donate = '';
    if(!empty($bn_stored_meta['foster_charity_pro_posttype_donate'][0]))
      $bn_foster_charity_pro_posttype_donate = $bn_stored_meta['foster_charity_pro_posttype_donate'][0];
    else $bn_foster_charity_pro_posttype_goal = '';
    if(!empty($bn_stored_meta['foster_charity_pro_posttype_goal'][0]))
      $bn_foster_charity_pro_posttype_goal = $bn_stored_meta['foster_charity_pro_posttype_goal'][0];
    else $bn_foster_charity_pro_posttype_raised = '';
    if(!empty($bn_stored_meta['foster_charity_pro_posttype_raised'][0]))
      $bn_foster_charity_pro_posttype_raised = $bn_stored_meta['foster_charity_pro_posttype_raised'][0];

    $donate_now = get_post_meta($post->id,'foster_charity_pro_posttype_donate',true);
    $donate_now_url = get_post_meta($post->id,'foster_charity_pro_posttype_donate_url',true);
    $goal = get_post_meta($post->id,'foster_charity_pro_posttype_goal',true);
    $raised = get_post_meta($post->id,'foster_charity_pro_posttype_raised',true);
    ?>
  <div id="property_stuff">
    <table id="list-table">     
      <tbody id="the-list" data-wp-lists="list:meta">
        <tr id="meta-1">
          <td class="left">
            <?php _e( 'Donate Now Label: ', 'foster-charity-pro-posttype' )?>
          </td>
          <td class="left" >
            <input type="text" name="foster_charity_pro_posttype_donate" id="foster_charity_pro_posttype_donate" value="<?php echo esc_attr( $bn_foster_charity_pro_posttype_donate ); ?>" />
          </td>
        </tr>
        <tr id="meta-2">
          <td class="left">
            <?php _e( 'Goal: ', 'foster-charity-pro-posttype' )?>
          </td>
          <td class="left" >
            <input type="text" name="foster_charity_pro_posttype_goal" id="foster_charity_pro_posttype_goal" value="<?php echo esc_attr( $bn_foster_charity_pro_posttype_goal ); ?>" />
          </td>
        </tr>
        <tr id="meta-3">
          <td class="left">
            <?php _e( 'Raised: ', 'foster-charity-pro-posttype' )?>
          </td>
          <td class="left" >
            <input type="text" name="foster_charity_pro_posttype_raised" id="foster_charity_pro_posttype_raised" value="<?php echo esc_attr( $bn_foster_charity_pro_posttype_raised ); ?>" />
          </td>
        </tr>
         <tr id="meta-4">
          <td class="left">
            <?php _e( 'Donate Now URL: ', 'foster-charity-pro-posttype' )?>
          </td>
          <td class="left" >
            <input type="text" name="foster_charity_pro_posttype_donate_url" id="foster_charity_pro_posttype_donate_url" value="<?php echo esc_attr( $foster_charity_pro_posttype_donate_url ); ?>" />
          </td>
        </tr>
      </tbody>
    </table>
  </div>
  <?php
}

function foster_charity_pro_posttype_bn_meta_save_programs( $post_id ) {

  if (!isset($_POST['bn_nonce']) || !wp_verify_nonce($_POST['bn_nonce'], basename(__FILE__))) {
    return;
  }

  if (!current_user_can('edit_post', $post_id)) {
    return;
  }

  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
    return;
  }
  // Save Image
  if( isset( $_POST[ 'meta-image' ] ) ) {
      update_post_meta( $post_id, 'meta-image', $_POST[ 'meta-image' ] );
  }
  // Save desig.
  if( isset( $_POST[ 'foster_charity_pro_posttype_donate' ] ) ) {
    update_post_meta( $post_id, 'foster_charity_pro_posttype_donate', sanitize_text_field($_POST[ 'foster_charity_pro_posttype_donate']) );
  }

  if( isset( $_POST[ 'foster_charity_pro_posttype_donate_url' ] ) ) {
    update_post_meta( $post_id, 'foster_charity_pro_posttype_donate_url', sanitize_text_field($_POST[ 'foster_charity_pro_posttype_donate_url']) );
  }

   // Save desig.
  if( isset( $_POST[ 'foster_charity_pro_posttype_goal' ] ) ) {
    update_post_meta( $post_id, 'foster_charity_pro_posttype_goal', sanitize_text_field($_POST[ 'foster_charity_pro_posttype_goal']) );
  }

     // Save desig.
  if( isset( $_POST[ 'foster_charity_pro_posttype_raised' ] ) ) {
    update_post_meta( $post_id, 'foster_charity_pro_posttype_raised', sanitize_text_field($_POST[ 'foster_charity_pro_posttype_raised']) );
  }
}
add_action( 'save_post', 'foster_charity_pro_posttype_bn_meta_save_programs' );

/*--------------------- Charity Donors Section ----------------------*/
// Charity Donors Section
function foster_charity_pro_posttype_charity_donors_metabox($hook) {
  if ( 'post.php' === $hook || 'post-new.php' === $hook ) {
    wp_enqueue_script('foster-charity-pro-posttype-charity-donors-metabox', plugin_dir_url( __FILE__ ) . '/js/img-metabox.js', array('jquery', 'jquery-ui-sortable'));

    global $post;
    if ( $post ) {
      wp_enqueue_media( array(
          'post' => $post->ID,
        )
      );
    }
  }
}
add_action('admin_enqueue_scripts', 'foster_charity_pro_posttype_charity_donors_metabox');
// Services Meta
function foster_charity_pro_posttype_bn_custom_meta_donors() {

    add_meta_box( 'bn_meta', __( 'Icon Image', 'foster-charity-pro-posttype' ), 'foster_charity_pro_posttype_bn_meta_callback_donors', 'donors', 'normal', 'high' );
}
/* Hook things in for admin*/
if (is_admin()){
  add_action('admin_menu', 'foster_charity_pro_posttype_bn_custom_meta_donors');
}

function foster_charity_pro_posttype_bn_meta_callback_donors( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'bn_nonce' );
    $bn_stored_meta = get_post_meta( $post->ID );
    //Work category details
       $bn_foster_charity_pro_posttype_designation = '';
    if(!empty($bn_stored_meta['foster_charity_pro_posttype_designation'][0]))
      $bn_foster_charity_pro_posttype_designation = $bn_stored_meta['foster_charity_pro_posttype_designation'][0];
    else
    $bn_meta_facebookurl = '';
    if(!empty($bn_stored_meta['meta-facebookurl'][0]))
      $bn_meta_facebookurl = $bn_stored_meta['meta-facebookurl'][0];
    else
    $bn_meta_linkdenurl = '';
    if(!empty($bn_stored_meta['meta-linkdenurl'][0]))
      $bn_meta_linkdenurl = $bn_stored_meta['meta-linkdenurl'][0];
    else
    $bn_meta_twitterurl = '';
    if(!empty($bn_stored_meta['meta-twitterurl'][0]))
      $bn_meta_twitterurl = $bn_stored_meta['meta-twitterurl'][0];
    else
    $bn_meta_googleplusurl = '';
    if(!empty($bn_stored_meta['meta-googleplusurl'][0]))
      $bn_meta_googleplusurl = $bn_stored_meta['meta-googleplusurl'][0];

    $desig = get_post_meta($post->id,'foster_charity_pro_posttype_designation',true);
    $facebook = get_post_meta($post->id,'meta-facebookurl',true);
    $linkedin = get_post_meta($post->id,'meta-linkdenurl',true);
    $twitter = get_post_meta($post->id,'meta-twitterurl',true);
    $pinterest = get_post_meta($post->id,'meta-pinteresturl',true);
    $googleplus = get_post_meta($post->id,'meta-googleplusurl',true);
    ?>
    <div id="property_stuff">
      <table id="list-table">     
        <tbody id="the-list" data-wp-lists="list:meta">
          <tr id="meta-1">
            <td class="left">
              <?php _e( 'Designation: ', 'foster-charity-pro-posttype' )?>
            </td>
            <td class="left" >
              <input type="text" name="foster_charity_pro_posttype_designation" id="foster_charity_pro_posttype_designation" value="<?php echo esc_attr( $bn_foster_charity_pro_posttype_designation ); ?>" />
            </td>
          </tr>
           <tr id="meta-1">
              <td class="left">
                <?php esc_html_e( 'Facebook Url', 'advance-fitness-gym-pro-posttype' )?>
              </td>
              <td class="left" >
                <input type="url" name="meta-facebookurl" id="meta-facebookurl" value="<?php echo esc_url($bn_meta_facebookurl); ?>" />
              </td>
            </tr>
            <tr id="meta-2">
              <td class="left">
                <?php esc_html_e( 'Linkedin URL', 'advance-fitness-gym-pro-posttype' )?>
              </td>
              <td class="left" >
                <input type="url" name="meta-linkdenurl" id="meta-linkdenurl" value="<?php echo esc_url($bn_meta_linkdenurl); ?>" />
              </td>
            </tr>
            <tr id="meta-3">
              <td class="left">
                <?php esc_html_e( 'Twitter Url', 'advance-fitness-gym-pro-posttype' ); ?>
              </td>
              <td class="left" >
                <input type="url" name="meta-twitterurl" id="meta-twitterurl" value="<?php echo esc_url( $bn_meta_twitterurl); ?>" />
              </td>
            </tr>
            <tr id="meta-4">
              <td class="left">
                <?php esc_html_e( 'GooglePlus URL', 'advance-fitness-gym-pro-posttype' ); ?>
              </td>
              <td class="left" >
                <input type="url" name="meta-googleplusurl" id="meta-googleplusurl" value="<?php echo esc_url($bn_meta_googleplusurl); ?>" />
              </td>
            </tr>
        </tbody>
      </table>
    </div>
  <?php
}

function foster_charity_pro_posttype_bn_meta_save_donors( $post_id ) {

  if (!isset($_POST['bn_nonce']) || !wp_verify_nonce($_POST['bn_nonce'], basename(__FILE__))) {
    return;
  }

  if (!current_user_can('edit_post', $post_id)) {
    return;
  }

  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
    return;
  }
  // Save Image
  if( isset( $_POST[ 'meta-image' ] ) ) {
      update_post_meta( $post_id, 'meta-image', $_POST[ 'meta-image' ] );
  }
  // Save desig.
  if( isset( $_POST[ 'foster_charity_pro_posttype_donors' ] ) ) {
    update_post_meta( $post_id, 'foster_charity_pro_posttype_donors', sanitize_text_field($_POST[ 'foster_charity_pro_posttype_donors']) );
  }

  // Save facebookurl
    if( isset( $_POST[ 'meta-facebookurl' ] ) ) {
        update_post_meta( $post_id, 'meta-facebookurl', esc_url($_POST[ 'meta-facebookurl' ]) );
    }
    // Save linkdenurl
    if( isset( $_POST[ 'meta-linkdenurl' ] ) ) {
        update_post_meta( $post_id, 'meta-linkdenurl', esc_url($_POST[ 'meta-linkdenurl' ]) );
    }
    if( isset( $_POST[ 'meta-twitterurl' ] ) ) {
        update_post_meta( $post_id, 'meta-twitterurl', esc_url($_POST[ 'meta-twitterurl' ]) );
    }
    // Save googleplusurl
    if( isset( $_POST[ 'meta-googleplusurl' ] ) ) {
        update_post_meta( $post_id, 'meta-googleplusurl', esc_url($_POST[ 'meta-googleplusurl' ]) );
    }
    // Save desig.
    if( isset( $_POST[ 'foster_charity_pro_posttype_designation' ] ) ) {
      update_post_meta( $post_id, 'foster_charity_pro_posttype_designation', sanitize_text_field($_POST[ 'foster_charity_pro_posttype_designation']) );
    }
}
add_action( 'save_post', 'foster_charity_pro_posttype_bn_meta_save_donors' );

/*------------------- Charity Donors Shortcode -------------------------*/
function foster_charity_pro_posttype_charity_donors_func( $atts ) {
    $attention = ''; 
    $attention = '<section id="events"><div class="row">';
      $new = new WP_Query( array( 'post_type' => 'events') );
      if ( $new->have_posts() ) :
        $k=1;
        while ($new->have_posts()) : $new->the_post();
          $post_id = get_the_ID();
          $donate_now = get_post_meta($post_id,'foster_charity_pro_posttype_donate',true);
          $donate_url = get_post_meta($post_id,'foster_charity_pro_posttype_donate_url',true);
          $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post_id), 'medium' );
          $date = get_post_meta($post_id,'foster_charity_pro_posttype_date',true);
          $time = get_post_meta($post_id,'foster_charity_pro_posttype_time',true);
          $place = get_post_meta($post_id,'foster_charity_pro_posttype_place',true);
          $url = $thumb['0'];
          $facebook = get_post_meta($post_id,'meta-facebookurl',true);
          $linkedin = get_post_meta($post_id,'meta-linkdenurl',true);
          $twitter = get_post_meta($post_id,'meta-twitterurl',true);
          $pinterest = get_post_meta($post_id,'meta-pinteresturl',true);
          $googleplus = get_post_meta($post_id,'meta-googleplusurl',true);
          $excerpt = foster_charity_pro_string_limit_words(get_the_excerpt(),20);
           $attention .= '<div class="col-lg-4 col-md-4 col-sm-4 col-12 pb-4">
                            <div class="donors-box first">
                              <div class="box">
                                <div class="donors-image">
                                  <img src="'.esc_html($url).'">
                                </div>
                                <div class="overlay">
                                  <div class="overlay_content"> 
                                    <div class="socialbox-content">
                                      <div class="socialbox">';
                                        if($facebook || $twitter || $googleplus || $linkedin);{
                                        if(get_post_meta($post_id,'meta-facebookurl',true)){
                                        $attention .= '<a class="" href="'.$facebook.'" target="_blank"><i class="fab fa-facebook-f"></i></a>';
                                         } if(get_post_meta($post_id,'meta-twitterurl',true)){
                                         $attention .= '<a class="" href='.$twitter.'>" target="_blank"><i class="fab fa-twitter"></i></a>';                              
                                         } if(get_post_meta($post_id,'meta-linkdenurl',true)){
                                        $attention .= '<a class="" href="'.
                                        $linkedin.'" target="_blank"><i class="fab fa-linkedin-in"></i></a>';
                                        } if(get_post_meta($post_id,'meta-googleplusurl',true)){
                                         $attention .= '<a class="" href="'.$googleplus.'" target="_blank"><i class="fab fa-google-plus-g"></i></a>';
                                        }
                                       }
                                     $attention .= ' </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>';
          $k++;         
        endwhile; 
        wp_reset_postdata();
      else :
         $attention = '<section id="attention" class="col-md-3 mt-3 mb-4"><h2 class="center">'.__('Not Found','foster-charity-pro-posttype').'</h2></section';
      endif;
     $attention .= '</div></section>';
    return  $attention;
}
add_shortcode( 'foster-charity-pro-charity-donors', 'foster_charity_pro_posttype_charity_donors_func' );


/*--------------------- Upcoming Events Section ----------------------*/
// Upcoming Events Section
function foster_charity_pro_posttype_upcoming_events_meta_box($hook) {
  if ( 'post.php' === $hook || 'post-new.php' === $hook ) {
    wp_enqueue_script('vw_lawyer-pro-posttype-images-metabox', plugin_dir_url( __FILE__ ) . '/js/img-metabox.js', array('jquery', 'jquery-ui-sortable'));

    global $post;
    if ( $post ) {
      wp_enqueue_media( array(
          'post' => $post->ID,
        )
      );
    }
  }
}
add_action('admin_enqueue_scripts', 'foster_charity_pro_posttype_upcoming_events_meta_box');
// Services Meta
function foster_charity_pro_posttype_bn_meta_custom_events() {

    add_meta_box( 'bn_meta', __( 'Icon Image', 'foster-charity-pro-posttype' ), 'foster_charity_pro_posttype_bn_meta_callback_events', 'events', 'normal', 'high' );
}
/* Hook things in for admin*/
if (is_admin()){
  add_action('admin_menu', 'foster_charity_pro_posttype_bn_meta_custom_events');
}

function foster_charity_pro_posttype_bn_meta_callback_events( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'bn_nonce' );
    $bn_stored_meta = get_post_meta( $post->ID );
    //Work category details

      $bn_foster_charity_pro_posttype_date = '';
    if(!empty($bn_stored_meta['foster_charity_pro_posttype_date'][0]))
      $bn_foster_charity_pro_posttype_date = $bn_stored_meta['foster_charity_pro_posttype_date'][0];

    else $bn_foster_charity_pro_posttype_time = '';
    if(!empty($bn_stored_meta['foster_charity_pro_posttype_time'][0]))
      $bn_foster_charity_pro_posttype_time = $bn_stored_meta['foster_charity_pro_posttype_time'][0];

    else $bn_foster_charity_pro_posttype_place = '';
    if(!empty($bn_stored_meta['foster_charity_pro_posttype_place'][0]))
      $bn_foster_charity_pro_posttype_place = $bn_stored_meta['foster_charity_pro_posttype_place'][0];

    $date = get_post_meta($post->id,'foster_charity_pro_posttype_date',true);
    $time = get_post_meta($post->id,'foster_charity_pro_posttype_time',true);
    $place = get_post_meta($post->id,'foster_charity_pro_posttype_place',true);

    ?>
  <div id="property_stuff">
    <table id="list-table">     
      <tbody id="the-list" data-wp-lists="list:meta">
        <tr id="meta-1">
          <td class="left">
            <?php _e( 'Date: ', 'foster-charity-pro-posttype' )?>
          </td>
          <td class="left" >
            <input type="text" name="foster_charity_pro_posttype_date" id="foster_charity_pro_posttype_date" value="<?php echo esc_attr( $bn_foster_charity_pro_posttype_date ); ?>" />
          </td>
        </tr>
        <tr id="meta-2">
          <td class="left">
            <?php _e( 'Time: ', 'foster-charity-pro-posttype' )?>
          </td>
          <td class="left" >
            <input type="text" name="foster_charity_pro_posttype_time" id="foster_charity_pro_posttype_time" value="<?php echo esc_attr( $bn_foster_charity_pro_posttype_time ); ?>" />
          </td>
        </tr>
        <tr id="meta-3">
          <td class="left">
            <?php _e( 'Location: ', 'foster-charity-pro-posttype' )?>
          </td>
          <td class="left" >
            <input type="text" name="foster_charity_pro_posttype_place" id="foster_charity_pro_posttype_place" value="<?php echo esc_attr( $bn_foster_charity_pro_posttype_place ); ?>" />
          </td>
        </tr>
      </tbody>
    </table>
  </div>
  <?php
}

function foster_charity_pro_posttype_bn_meta_save_events( $post_id ) {

  if (!isset($_POST['bn_nonce']) || !wp_verify_nonce($_POST['bn_nonce'], basename(__FILE__))) {
    return;
  }

  if (!current_user_can('edit_post', $post_id)) {
    return;
  }

  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
    return;
  }
  // Save Image
  if( isset( $_POST[ 'meta-image' ] ) ) {
      update_post_meta( $post_id, 'meta-image', $_POST[ 'meta-image' ] );
  }

    // Save desig.
  if( isset( $_POST[ 'foster_charity_pro_posttype_date' ] ) ) {
    update_post_meta( $post_id, 'foster_charity_pro_posttype_date', sanitize_text_field($_POST[ 'foster_charity_pro_posttype_date']) );
  }
  
  // Save desig.
  if( isset( $_POST[ 'foster_charity_pro_posttype_time' ] ) ) {
    update_post_meta( $post_id, 'foster_charity_pro_posttype_time', sanitize_text_field($_POST[ 'foster_charity_pro_posttype_time']) );
  }

   // Save desig.
  if( isset( $_POST[ 'foster_charity_pro_posttype_place' ] ) ) {
    update_post_meta( $post_id, 'foster_charity_pro_posttype_place', sanitize_text_field($_POST[ 'foster_charity_pro_posttype_place']) );
  }

}
add_action( 'save_post', 'foster_charity_pro_posttype_bn_meta_save_events' );

/*------------------- Upcoming Events Shortcode -------------------------*/
function foster_charity_pro_posttype_events_func( $atts ) {
    $attention = ''; 
    $attention = '<section id="events"><div class="row">';
      $new = new WP_Query( array( 'post_type' => 'events') );
      if ( $new->have_posts() ) :
        $k=1;
        while ($new->have_posts()) : $new->the_post();
          $post_id = get_the_ID();
          $donate_now = get_post_meta($post_id,'foster_charity_pro_posttype_donate',true);
          $donate_url = get_post_meta($post_id,'foster_charity_pro_posttype_donate_url',true);
          $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post_id), 'medium' );
          $date = get_post_meta($post_id,'foster_charity_pro_posttype_date',true);
          $time = get_post_meta($post_id,'foster_charity_pro_posttype_time',true);
          $place = get_post_meta($post_id,'foster_charity_pro_posttype_place',true);
          $url = $thumb['0'];
          $excerpt = foster_charity_pro_string_limit_words(get_the_excerpt(),20);
           $attention .= '<div class="col-lg-4 col-md-4 col-sm-4 col-12 pb-4">
                            <div class="events-box first">
                              <div class="events-image">
                                <img src="'.esc_html($url).'">
                              </div>
                              <div class="events-box-content">
                                <h4><a href="'.get_the_permalink().'">'. get_the_title() .'</a></h4>
                                <div class="events_content">'.$excerpt.'</div>
                                  <div class="date"><i class="fas fa-calendar-alt"></i>
                                  '.$date.'</div>
                                <div class="time_location">
                                  <div class="row">
                                    <div class="time col-lg-6 col-md-6 col-sm-6 col-6">
                                      <span class="time_field"><span class="time_icon"><i class="far fa-clock"></i></span>'.$time.'</span>
                                    </div>
                                    <div class="location col-lg-6 col-md-6 col-sm-6 col-6">
                                      <span class="location_field"><span class="location_icon"><i class="fas fa-location-arrow"></i></span>'.$place.'</span>
                                        </div>
                                     <?php } ?>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>';
          $k++;         
        endwhile; 
        wp_reset_postdata();
      else :
         $attention = '<section id="attention" class="col-md-3 mt-3 mb-4"><h2 class="center">'.__('Not Found','foster-charity-pro-posttype').'</h2></section';
      endif;
     $attention .= '</div></section>';
    return  $attention;
}
add_shortcode( 'foster-charity-pro-upcoming-events', 'foster_charity_pro_posttype_events_func' );


/*------------------- Urgent Causes Shortcode -------------------------*/
function foster_charity_pro_posttype_urgent_causes_func( $atts ) {
    $testimonial = ''; 
    $testimonial = '<div id="urgent_cause">';
      $new = new WP_Query( array( 'post_type' => 'cause') );
      if ( $new->have_posts() ) :
        $k=1;
        while ($new->have_posts()) : $new->the_post();
          $post_id = get_the_ID();
          $data = get_post_meta( $post_id);
          $funded = get_post_meta($post_id,'foster_charity_pro_posttype_funded',true);
          $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post_id), 'medium' );
          $url = $thumb['0'];
          $custom_url = '';
          $img = get_post_meta(get_the_ID(), 'meta-image', true);
          $excerpt = foster_charity_pro_string_limit_words(get_the_excerpt(),20);
          $organizer = get_post_meta($post_id,'foster_charity_pro_posttype_organizer',true);
          $backers = get_post_meta($post_id,'foster_charity_pro_posttype_backers',true);
          $pledged = get_post_meta($post_id,'foster_charity_pro_posttype_pledged',true);
          $location = get_post_meta($post_id,'foster_charity_pro_posttype_location',true);
          $days = get_post_meta($post_id,'foster_charity_pro_posttype_days',true);
          $designation = get_post_meta($post_id,'foster_charity_pro_posttype_testimonial_desigstory',true);
          $donate = get_post_meta($post_id,'foster_charity_pro_posttype_donate_now',true);
          $donate_url = get_post_meta($post_id,'foster_charity_pro_posttype_donate_now_btnurl',true);
          $testimonial .= '<div id="urgent_cause">
                        <div class="row">
                           <div class="col-lg-6 col-md-6 col-sm-12 col-12">';    
                               if (has_post_thumbnail()){
                              $testimonial.= '<img class="cause-image" src="'.esc_url($url).'">';
                              }
                         $testimonial.= '</div>
                          <div class="col-lg-6 col-md-6 col-sm-12 col-12 mt-4">
                            <div class="urgent_cause_content">
                              <div class="cause_title">
                                <a class="theme_button_cause" href="'. get_the_permalink() .'">'.get_the_title().'</a>
                              </div>
                              <div class="post_dec">'. $excerpt .'</div>
                              <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                  <div class="cause_image">
                                    <img class="urgent_cause_icons mt-3" src="'.esc_html($img).'">
                                  </div>                                   
                                  <div class="organizer_name">'.esc_html($organizer).'</div>                  
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-6"> 
                                  <div class="location_name"><i class="fas fa-location-arrow"></i>'.esc_html($location) .'</div>
                                </div>
                              </div>
                              <div class="row">                                  
                                <div class="progress-bar">
                                    <div class="skills html" style="width: '. esc_html($funded) .'"></div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-3 col-sm-3 col-3"> 
                                  <div class="donation">'. esc_html($pledged) .'</div>
                                  <p class="pledged_name">Pledged</p>
                                </div>
                                <div class="col-md-3 col-sm-3 col-3">
                                  <div class="donation">'.esc_html($funded).'</div>
                                  <p class="subtitle">Funded</p>
                                </div>
                                <div class="col-md-3 col-sm-3 col-3">
                                  <div class="donation"> '.$backers.' </div>
                                  <p class="subtitle">Backers</p>
                                </div>
                                <div class="col-md-3 col-sm-3 col-3">
                                    <div class="donation">'.$days.'</div>
                                    <p class="subtitle">Days Ago</p>
                                </div>
                              </div>
                              <div class="row">
                                <a class="donate_now_posttype" href="'.$donate_url.'><i class="fas fa-hand-holding-usd"></i>'.$donate.' </a>
                              </div>
                             </div>               
                            </div>
                          </div>
                        </div>
                      </div>';
          $k++;         
        endwhile; 
        wp_reset_postdata();
      else :
        $testimonial = '<div id="urgent_cause" class="testimonial_wrap col-md-3 mt-3 mb-4"><h2 class="center">'.__('Not Found','foster-charity-pro-posttype').'</h2></div>';
      endif;
    $testimonial .= '</div>';
    return $testimonial;
}
add_shortcode( 'foster-charity-pro-urgent-causes', 'foster_charity_pro_posttype_urgent_causes_func' );

/*----------------------Testimonial section ----------------------*/
/* Adds a meta box to the Testimonial editing screen */
function foster_charity_pro_posttype_bn_testimonial_meta_box() {
	add_meta_box( 'foster-charity-pro-posttype-testimonial-meta', __( 'Enter Details', 'foster-charity-pro-posttype' ), 'foster_charity_pro_posttype_bn_testimonial_meta_callback', 'testimonials', 'normal', 'high' );
}
// Hook things in for admin
if (is_admin()){
    add_action('admin_menu', 'foster_charity_pro_posttype_bn_testimonial_meta_box');
}
/* Adds a meta box for custom post */
function foster_charity_pro_posttype_bn_testimonial_meta_callback( $post ) {
	wp_nonce_field( basename( __FILE__ ), 'foster_charity_pro_posttype_posttype_testimonial_meta_nonce' );
  $bn_stored_meta = get_post_meta( $post->ID );
  if(!empty($bn_stored_meta['foster_charity_pro_posttype_testimonial_desigstory'][0]))
      $bn_foster_charity_pro_posttype_testimonial_desigstory = $bn_stored_meta['foster_charity_pro_posttype_testimonial_desigstory'][0];
    else
      $bn_foster_charity_pro_posttype_testimonial_desigstory = '';
	?>
	<div id="testimonials_custom_stuff">
		<table id="list">
			<tbody id="the-list" data-wp-lists="list:meta">
				<tr id="meta-1">
					<td class="left">
						<?php _e( 'Designation', 'foster-charity-pro-posttype' )?>
					</td>
					<td class="left" >
						<input type="text" name="foster_charity_pro_posttype_testimonial_desigstory" id="foster_charity_pro_posttype_testimonial_desigstory" value="<?php echo esc_attr( $bn_foster_charity_pro_posttype_testimonial_desigstory ); ?>" />
					</td>
				</tr>
			</tbody>
		</table>
	</div>
	<?php
}

/* Saves the custom meta input */
function foster_charity_pro_posttype_bn_metadesig_save( $post_id ) {
	if (!isset($_POST['foster_charity_pro_posttype_posttype_testimonial_meta_nonce']) || !wp_verify_nonce($_POST['foster_charity_pro_posttype_posttype_testimonial_meta_nonce'], basename(__FILE__))) {
		return;
	}

	if (!current_user_can('edit_post', $post_id)) {
		return;
	}

	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return;
	}

	// Save desig.
	if( isset( $_POST[ 'foster_charity_pro_posttype_testimonial_desigstory' ] ) ) {
		update_post_meta( $post_id, 'foster_charity_pro_posttype_testimonial_desigstory', sanitize_text_field($_POST[ 'foster_charity_pro_posttype_testimonial_desigstory']) );
	}
}

add_action( 'save_post', 'foster_charity_pro_posttype_bn_metadesig_save' );

/*------------------- Testimonial Shortcode -------------------------*/
function foster_charity_pro_posttype_testimonials_func( $atts ) {
    $testimonial = ''; 
    $testimonial = '<div id="testimonials"><div class="row inner-test-bg">';
      $new = new WP_Query( array( 'post_type' => 'testimonials') );
      if ( $new->have_posts() ) :
        $k=1;
        while ($new->have_posts()) : $new->the_post();
          $post_id = get_the_ID();
          $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post_id), 'medium' );
          $url = $thumb['0'];
          $excerpt = foster_charity_pro_string_limit_words(get_the_excerpt(),20);
          $designation = get_post_meta($post_id,'foster_charity_pro_posttype_testimonial_desigstory',true);
          $testimonial .= '<div class="col-md-4 mb-4">
                <ul class="testimonial_auther">
                  <li class="textimonial-img">';
                    if (has_post_thumbnail()){
                    $testimonial.= '<img src="'.esc_url($url).'">';
                    }
                  $testimonial .= '</li>
                  <li class="testimonial-box">
                    <h4 class="testimonial_name"><a href="'.get_the_permalink().'">'.get_the_title().'</a> <cite>'.esc_html($designation).'</cite></h4>
                  </li>
                </ul>
                <div class="testimonial_box mb-3 col-md-10 offset-md-1" >
                  <div class="content_box w-100">
                    <div class="short_text pb-3"><blockquote>'.$excerpt.'</blockquote></div>
                  </div>                  
                </div>
              </div>
              <div class="clearfix"></div>';
          $k++;         
        endwhile; 
        wp_reset_postdata();
      else :
        $testimonial = '<div id="testimonial" class="testimonial_wrap col-md-3 mt-3 mb-4"><h2 class="center">'.__('Not Found','foster-charity-pro-posttype').'</h2></div>';
      endif;
    $testimonial .= '</div></div>';
    return $testimonial;
}
add_shortcode( 'foster-charity-pro-testimonials', 'foster_charity_pro_posttype_testimonials_func' );

/*------------------- Causes Needs Attention Shortcode -------------------------*/
function foster_charity_pro_posttype_attention_func( $atts ) {
    $attention = ''; 
    $attention = '<section id="attention">';
      $new = new WP_Query( array( 'post_type' => 'causes_attention') );
      if ( $new->have_posts() ) :
        $k=1;
        while ($new->have_posts()) : $new->the_post();
          $post_id = get_the_ID();
          $donate_now = get_post_meta($post_id,'foster_charity_pro_posttype_donate',true);
          $donate_url = get_post_meta($post_id,'foster_charity_pro_posttype_donate_url',true);
          $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post_id), 'medium' );
          $goal = get_post_meta($post_id,'foster_charity_pro_posttype_goal',true);
          $raised = get_post_meta($post_id,'foster_charity_pro_posttype_raised',true);
          $url = $thumb['0'];
          $excerpt = foster_charity_pro_string_limit_words(get_the_excerpt(),20);
           $attention .= '<div class="container">
            <div class="col-lg-8 col-md-6 col-sm-12 col-12 pb-4">
            <div class="attention-box row">
              <div class="col-lg-6 col-md-12 col-sm-12 col-12 p-0">
                  <div class="attention-image">
                    <img src="'.esc_url($url).'">
                  </div>
              </div>
              <div class="col-lg-6 col-md-12 col-sm-12 col-12 p-0">
              <div class="attention-box-content">
                <h4><a href="'. get_the_permalink() .'">'. get_the_title().' </a></h4>
                <div class="attention_content">'.$excerpt .'</div>                 
                <div class="donate_now"> '.$donate_now.' </div>
                <div class="goals_raised">
                  <div class="row">
                    <div class="goal col-md-6 col-sm-6 col-6">
                      <span class="goal_amount"><span class="goal_label">Goal: </span>'.$goal.'</span>
                    </div>
                    <div class="raised col-lg-6 col-md-6 col-sm-6 col-6">
                      <span class="raised_amount"><span class="raised_label">Raised: </span>'.$raised.'</span>
                    </div>
                  </div>
                </div>
                </div>
               </div>
              </div>
            </div>
           </div>';
          $k++;         
        endwhile; 
        wp_reset_postdata();
      else :
         $attention = '<section id="attention" class="col-md-3 mt-3 mb-4"><h2 class="center">'.__('Not Found','foster-charity-pro-posttype').'</h2></section';
      endif;
     $attention .= '</section>';
    return  $attention;
}
add_shortcode( 'foster-charity-pro-causes-attention', 'foster_charity_pro_posttype_attention_func' );

/*---------------- Causes Need Attention Shortcode ---------------------*/
function foster_charity_pro_posttype_causes_attention_func( $atts ) {
    $work = ''; 
    $work = '<div id="our_work" class="row inner-test-bg">';
      $new = new WP_Query( array( 'post_type' => 'work') );
      if ( $new->have_posts() ) :
        $k=1;
        while ($new->have_posts()) : $new->the_post();
          $post_id = get_the_ID();
          $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post_id), 'medium' );
          $url = $thumb['0'];
          $excerpt = foster_charity_pro_string_limit_words(get_the_excerpt(),20);
          $work .= '<div class="col-md-6 col-sm-6 mt-4">
              <div class="box">';
                if (has_post_thumbnail()){
                  $work.= '<img src="'.esc_url($url).'">';
                  }
                $work.= '<div class="over-layer">
                  <div class="work_content">
                    <h3 class="title"><a href="'.get_the_permalink().'">'.get_the_title().'</a></h3>
                    <div class="post_dec">'.$excerpt.'</div>
                    <div class="box-search-icon"><a href="'.get_the_permalink().'"><i class="fas fa-long-arrow-alt-right"></i></a></div>
                  </div>
                </div>
              </div>
          </div>
          <div class="clearfix"></div>';
          $k++;         
        endwhile; 
        wp_reset_postdata();
        $work.= '</div>';
      else :
        $work = '<div id="our_work" class="col-md-3 mt-3 mb-4"><h2 class="center">'.__('Not Found','foster-charity-pro-posttype').'</h2></div>';
      endif;
      $work.= '</div>';
    return $work;
}
add_shortcode( 'foster-charity-pro-work', 'foster_charity_pro_posttype_causes_attention_func' );