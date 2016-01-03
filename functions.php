<?php
  add_action( 'customize_register', 'alpha_control_customize_register' );
  function alpha_control_customize_register( $wp_customize ) {

    // Inlcude the Alpha Color Picker control file.
    require_once( dirname( __FILE__ ) . '/customizer/alpha-color-picker/alpha-color-picker.php' );
  }

  function enqueue_assets() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_script( 'masonry',  get_stylesheet_directory_uri() . '/js/masonry.pkgd.min.js', array( 'jquery' ), '1.0', true );

    // Override custom js from parent theme
    wp_register_script('custom_script', get_stylesheet_directory_uri() .'/js/custom.js', array( 'jquery' ), '1.0', true);
    wp_enqueue_script( 'custom_script');
  }

  add_action( 'wp_enqueue_scripts', 'enqueue_assets' );

  add_action( 'customize_preview_init', 'et_origin_child_customize_preview_js' );
	function et_origin_child_customize_preview_js() {
		wp_enqueue_script( 'origin-child-customizer', get_stylesheet_directory_uri() . '/js/theme-child-customizer.js', array( 'customize-preview' ), false, true );
	}

  if ( function_exists( 'get_custom_header' ) ) {
  	// compatibility with versions of WordPress prior to 3.4

  	add_action( 'customize_register', 'et_origin_child_customize_register' );
  	function et_origin_child_customize_register( $wp_customize ) {

  		$wp_customize->add_setting('et_origin[box_bg_hover_color]', array(
  			'default'		    => 'rgba( 255,150,0,0.65 )',
  			'type'			    => 'option',
  			'capability'	    => 'edit_theme_options',
  			'transport'		    => 'postMessage',
  		) );

  		$wp_customize->add_control( new Customize_Alpha_Color_Control( $wp_customize, 'et_origin[box_bg_hover_color]', array(
  			'label'		=> __( 'Box Background Hover Color', 'Origin' ),
  			'section'	=> 'colors',
  			'settings'	=> 'et_origin[box_bg_hover_color]',
  		) ) );
    }
  }
?>
