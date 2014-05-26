<?php

	// Registering Menus
	function register_menu() { register_nav_menu('navigation', __('Main Navigation')); }
	add_action('init', 'register_menu');
        
        // Register stylesheets
        function register_css() {
                if (!is_admin()){
                        wp_register_style( 'maincss', get_template_directory_uri() . '/style.css', array(), 'all' );
                        wp_register_style( 'tweetcss', get_template_directory_uri() . '/jquery.tweet.css', array(), 'all' );
                        
                        wp_enqueue_style( 'maincss' );
                        wp_enqueue_style( 'tweetcss' );
                }
        }
        
        add_action( 'wp_enqueue_scripts', 'register_css' );
	
	// Register javaScripts
	function register_js() {
		if (!is_admin()) {
                        wp_deregister_script('respondjs');
                        wp_register_script('respondjs', get_template_directory_uri() . '/js/respond.min.js');
			wp_deregister_script('jquery');
			wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js');
			wp_register_script('quicksand', get_template_directory_uri() . '/js/jquery.quicksand.js', 'jquery');
			wp_register_script('easing', get_template_directory_uri() . '/js/jquery.easing.1.3.js', 'jquery');
                        wp_register_script('scrollto', get_template_directory_uri() . '/js/jquery.scrollTo.min.js', 'jquery');
                        wp_register_script('twitter', get_template_directory_uri() . '/js/jquery.tweet.js', 'jquery');
                        wp_register_script('tinynav', get_template_directory_uri() . '/js/tinynav.min.js', 'jquery');
			wp_register_script('custom', get_template_directory_uri() . '/js/jquery.custom.js', 'jquery', '1.0', TRUE);

                        wp_enqueue_script('respondjs');
			wp_enqueue_script('jquery');
			wp_enqueue_script('quicksand');
			wp_enqueue_script('easing');
                        wp_enqueue_script('scrollto');
                        wp_enqueue_script('twitter');
                        wp_enqueue_script('tinynav');
			wp_enqueue_script('custom');
		}
	}
	
	add_action('init', 'register_js');

	//Setting Up Feature Images
	if ( function_exists( 'add_theme_support' ) ) {
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 56, 56, true );
		add_image_size( 'portfolio', 748, 600, true ); 
	}

	// Include the portfolio functionality
	include("portfolio/portfolio-post-type.php");
        
        // Adds Sidebar functionality to theme
        function eruma_ichi_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Sidebar', 'eruma_ichi' ),
		'id' => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );
        }
        add_action( 'widgets_init', 'eruma_ichi_widgets_init' );

?>