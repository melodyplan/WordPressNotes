<?php

function learningWordPress_resources() {

  wp_enqueue_style('style', get_stylesheet_uri());

}

add_action('wp_enqueue_scripts', 'learningWordPress_resources');

// Get top ancestor
function get_top_ancestor_id() {

  global $post;

  if ($post->post_parent) {
    $ancestors = array_reverse(get_post_ancestors($post->ID));
    return $ancestors[0];

  }

  return $post->ID;

}

// Does page have children?
function has_children() {

    global $post;

    $pages = get_pages('child_of=' . $post->ID);
    return count($pages);

}

// Customize excerpt word count length
function custom_excerpt_length() {
  // the integer decides how many words shown in excerpt, in this case 25
  return 25;
}

add_filter('excerpt_length', 'custom_excerpt_length');

//Theme setup
function learningWordPress_setup() {

  // Navigation Menus
  register_nav_menus(array(
    'primary' => __( 'Primary Menu' ),
    'footer' => __( 'Footer Menu' ),
  ));

  // Add featured image support
  /* add_theme_support() specifies the add-on you want to add in WordPress
  depending on the parameter you pass through */
  add_theme_support('post-thumbnails');
  add_image_size('small-thumbnail', 180, 120, true);
  add_image_size('banner-image', 920, 210, array('right', 'top'));

  // Add post format support
  add_theme_support('post-formats', array('aside', 'gallery', 'link'));

}

/*first argument for add_acton says when to run the function, second arg is the
name of the function you want to execute*/
add_action('after_setup_theme', 'learningWordPress_setup');

// Add Our Widget Locations
function ourWidgetsInit() {

  //Add widget support in admin
  register_sidebar(array(
    //name needs to be human friendly. seen in frontend.
    'name' => 'Sidebar',
    //id is not seen in frontend. needs to be computer friendly.
    'id' => 'sidebar1',
    'before_widget' => '<div class="widget-item">',
    'after_widget' => '</div>',
    'before_title' => '<h4 class="my-special-class">',
    'after_title' => '</h4>'
  ));

  register_sidebar(array(
    'name' => 'Footer Area 1',
    'id' => 'footer1',
    'before_widget' => '<div class="widget-item">',
    'after_widget' => '</div>'
  ));

  register_sidebar(array(
    'name' => 'Footer Area 2',
    'id' => 'footer2',
    'before_widget' => '<div class="widget-item">',
    'after_widget' => '</div>'
  ));

  register_sidebar(array(
    'name' => 'Footer Area 3',
    'id' => 'footer3',
    'before_widget' => '<div class="widget-item">',
    'after_widget' => '</div>'
  ));

  register_sidebar(array(
    'name' => 'Footer Area 4',
    'id' => 'footer4',
    'before_widget' => '<div class="widget-item">',
    'after_widget' => '</div>'
  ));

}

add_action('widgets_init', 'ourWidgetsInit');

// Customize Appearance options
function learningWordPress_customize_register( $wp_customize ) {

  $wp_customize -> add_setting('lwp_link_color', array(
    // the default of the setting
    'default' => '#006er3',
    /* controls how WordPress will update the preview of the website when you are
    on the customize screen. */
    'transport' => 'refresh'
  ));

  $wp_customize -> add_setting('lwp_btn_color', array(
    'default' => '#006er3',
    'transport' => 'refresh'
  ));

  $wp_customize -> add_setting('lwp_btn_hover', array(
    'default' => '#006er3',
    'transport' => 'refresh'
  ));

  $wp_customize -> add_section('lwp_standard_colors', array(
    // titles will actually be seen by users of the theme
    'title' => __('Standard Colors', 'LearningWordPress'),
    'priorty' => 30,
  ));

  $wp_customize -> add_control( new WP_Customize_Color_Control( $wp_customize, 'lwp_link_color_control', array(
    'label' => __('Link Color', 'LearningWordPress'),
    'section' => 'lwp_standard_colors',
    'settings' => 'lwp_link_color'
  )));

  $wp_customize -> add_control( new WP_Customize_Color_Control( $wp_customize, 'lwp_btn_color_control', array(
    'label' => __('Button Color', 'LearningWordPress'),
    /* didn't create a new section btn_color because we wanted to put it in the
    same section as lwp_standard_colors */
    'section' => 'lwp_standard_colors',
    'settings' => 'lwp_btn_color'
  )));

  $wp_customize -> add_control( new WP_Customize_Color_Control( $wp_customize, 'lwp_btn_hover_control', array(
    'label' => __('Button Hover', 'LearningWordPress'),
    'section' => 'lwp_standard_colors',
    'settings' => 'lwp_btn_hover'
  )));

}

add_action('customize_register', 'learningWordPress_customize_register');

// Output Customize CSS
function learningWordPress_customize_css() { ?>
  <style type="text/css">

    a:link,
    a:visited {
      color: <?php echo get_theme_mod('lwp_link_color'); ?>;
    }

    .site-header nav ul li.current-menu-item a:link,
    .site-header nav ul li.current-menu-item a:visited,
    .site-header nav ul li.current-page-ancestor a:link,
    .site-header nav ul li.current-page-ancestor a:visited {
      background-color: <?php echo get_theme_mod('lwp_link_color'); ?>;
    }

    .hd-search #searchsubmit {
      background-color: <?php echo get_theme_mod('lwp_btn_color'); ?>;
    }

    .hd-search #searchsubmit:hover {
      background-color: <?php echo get_theme_mod('lwp_btn_hover'); ?>;
    }

  </style>
<?php }

add_action('wp_head', 'learningWordPress_customize_css');

?>
