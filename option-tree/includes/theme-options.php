<?php
/**
 * Initialize the custom theme options.
 */
add_action( 'init', 'custom_theme_options' );

/**
 * Build the custom settings & update OptionTree.
 */
function custom_theme_options() {
  
  /* OptionTree is not loaded yet, or this is not an admin request */
  if ( ! function_exists( 'cosparell_settings_id' ) || ! is_admin() )
    return false;
    
  /**
   * Get a copy of the saved settings array. 
   */
  $saved_settings = get_option( cosparell_settings_id(), array() );
  
  /**
   * Custom settings array that will eventually be 
   * passes to the OptionTree Settings API Class.
   */
   $custom_settings = array( 
    'contextual_help' => array( 
      'content'       => array( 
        array(
          'id'        => '',
          'title'     => '',
          'content'   => ''
        )
      ),
      'sidebar'       => ''
    ),
    'sections'        => array( 
      array(
        'id'          => 'logo',
        'title'       => __( 'Logo', 'cosparell' )
      ),

      array(
        'id'          => 'social_links',
        'title'       => __( 'Social Links', 'cosparell' )
      ),
      array(
        'id'          => 'slider_settings',
        'title'       => __( 'Slider Settings', 'cosparell' )
      )
    ),
    'settings'        => array( 
    
     array(
        'id'          => 'cosparell_logo_settings',
        'label'       => __( 'Logo', 'cosparell' ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'logo',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),

      array(
        'id'          => 'cosparell_social_links',
        'label'       => __( 'Social Links', 'cosparell' ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'social-links',
        'section'     => 'social_links',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'cosparell_slider_settings',
        'label'       => __( 'Slider', 'cosparell' ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'slider',
        'section'     => 'slider_settings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      )
    )
  );
  
  /* allow settings to be filtered before saving */
  $custom_settings = apply_filters( cosparell_settings_id() . '_args', $custom_settings );
  
  /* settings are not the same update the DB */
  if ( $saved_settings !== $custom_settings ) {
    update_option( cosparell_settings_id(), $custom_settings ); 
  }
  
  /* Lets OptionTree know the UI Builder is being overridden */
  global $cosparell_has_custom_theme_options;
  $cosparell_has_custom_theme_options = true;
  
}