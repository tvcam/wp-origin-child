<?php

  function enqueue_assets() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_script( 'masonry',  get_stylesheet_directory_uri() . '/js/masonry.pkgd.min.js', array( 'jquery' ), '1.0', true );

    // Override custom js from parent theme
    wp_register_script('custom_script', get_stylesheet_directory_uri() .'/js/custom.js', array( 'jquery' ), '1.0', true);
    wp_enqueue_script( 'custom_script');
  }

  add_action( 'wp_enqueue_scripts', 'enqueue_assets' );
?>
