<?php
//
// Recommended way to include parent theme styles.
//  (Please see http://codex.wordpress.org/Child_Themes#How_to_Create_a_Child_Theme)
//
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array('parent-style')
    );
}
//
// Your code goes below
//

//code overwritten to add RMM color tweaks as selection possibilities
/*
 $wp_customize->add_section( 'sporty_color_scheme_settings', array(
    'title'       => __( 'Color Scheme', 'rmm-sporty' ),
    'priority'    => 30,
    'description' => __( 'Color scheme', 'rmm-sporty' ),
  ) );

  $wp_customize->add_setting( 'sporty_color_scheme', array(
    'default'        => 'blue',
    'sanitize_callback' => 'sporty_sanitize_text',
  ) );

  $wp_customize->add_control( 'sporty_color_scheme', array(
    'label'   => __( 'Choose a color scheme', 'rmm-sporty' ),
    'section' => 'sporty_color_scheme_settings',
    'default'        => 'blue',
    'type'       => 'radio',
    'choices'    => array(
      __( 'Blue', 'rmm-sporty' ) => 'blue',
      __( 'Red', 'rmm-sporty' ) => 'red',
      __( 'Green', 'rmm-sporty' ) => 'green',
      __( 'Orange', 'rmm-sporty' ) => 'orange',
    ),
  ));

}
*/
//Added widget area to header so that we can add
//the WA login button and keep it acccessible on phones

if ( function_exists ('register_sidebar') )
register_sidebar( array(
  'name' => __( 'Header Widgets Area', 'rmm-sporty' ),
  'id' => 'sidebar-header',
  'description' => __( 'Header widgets area for my rmm-sporty child theme.'),
  'before_widget' => '<aside id="%1$s" class="widget %2$s">',
  'after_widget' => '</aside>',
  'before_title' => '<h3 class="widget-title">',
  'after_title' => '</h3>',
) );


