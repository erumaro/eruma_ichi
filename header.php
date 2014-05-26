<!DOCTYPE html>
<html>
    <head>
        <title><?php bloginfo('name'); ?> <?php wp_title(); ?></title>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <meta name="viewport" content="width=device-width, user-scalable=no" />
	<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/images/favicon.ico">
        <?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
        <!--[if lt IE 9]>
        <script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
        <![endif]-->
        
        <?php wp_head(); ?>
    </head>
    <body>
    <?php if ( is_home() ) { ?>
        <header class="clearfix">
            <nav role="navigation">
                <?php wp_nav_menu('menu=nav'); ?>
            </nav>
        </header>
    <?php } else { ?>
        <header class="clearfix">
            <nav role="homebutton">
                <?php wp_nav_menu('menu=hem'); ?>
            </nav>
        </header>
    <?php } ?>
        <div id="container">