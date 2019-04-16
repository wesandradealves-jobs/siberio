<!DOCTYPE html>
<html <?php language_attributes(); $lang = explode("lang=",get_language_attributes()); ?>>
  <head>
    <title><?php echo (is_single() ? get_bloginfo('title')." - ".get_the_title() : get_bloginfo('title').' - '.get_bloginfo('description')); ?></title>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="content-language" content="<?php echo str_replace('"','',$lang[1]); ?>" />
    <meta name="language" content="<?php echo str_replace('"','',$lang[1]); ?>" />
    <meta property="og:locale" content="<?php echo str_replace('"','',$lang[1]); ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="<?php echo (is_single() ? get_bloginfo('title')." - ".get_the_title() : get_bloginfo('title')); ?>" />
    <meta property="og:description" content="<?php echo get_bloginfo('description'); ?>" />
    <meta property="og:url" content="<?php echo site_url(); ?>" />
    <meta property="og:site_name" content="<?php echo get_bloginfo('title'); ?>" />
    <meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/screenshot.png" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="true">
    <?php wp_meta(); ?>
    <link rel="canonical" href="<?php echo site_url(); ?>" />
    <?php
        wp_head();
        global $post;
        $page = $post->post_title;

        function avatar($string){
            echo '
                <div class="avatar-wrapper">
                    <div class="avatar" style="background-image:url('.$string.')"></div>
                </div>
            ';
        }
    ?>
  </head>
  <body
    <?php
    if (is_front_page()) {
    echo 'class="'.str_replace('templates','templates-',str_replace(array('/','.php'), '', get_page_template_slug($post->ID))).' pg-home"';
    } else if(is_author()){
    echo 'class="'.str_replace('templates','templates-',str_replace(array('/','.php'), '', get_page_template_slug($post->ID))).' pg-author pg-profile pg-interna"';
    } else if(is_archive()){
    echo 'class="'.str_replace('templates','templates-',str_replace(array('/','.php'), '', get_page_template_slug($post->ID))).' pg-archive pg-interna pg-'.get_queried_object()->slug.'"';
    } else if(is_category()){
    echo 'class="'.str_replace('templates','templates-',str_replace(array('/','.php'), '', get_page_template_slug($post->ID))).' pg-category pg-interna pg-'.get_queried_object()->slug.'"';
    } else if(is_search()){
    echo 'class="'.str_replace('templates','templates-',str_replace(array('/','.php'), '', get_page_template_slug($post->ID))).' pg-search pg-interna"';
    } else if(is_single()){
    echo 'class="'.str_replace('templates','templates-',str_replace(array('/','.php'), '', get_page_template_slug($post->ID))).' pg-single pg-interna post-'.$post->post_name.'"';
    } else if(is_404()){
    echo 'class="'.str_replace('templates','templates-',str_replace(array('/','.php'), '', get_page_template_slug($post->ID))).' pg-404 pg-interna"';
    } else {
    echo 'class="'.str_replace('templates','templates-',str_replace(array('/','.php'), '', get_page_template_slug($post->ID))).' pg-interna pg-'.$post->post_name.' page_id_'.$post->ID.'"';
    }
    ?>>
    <div id="wrap">
    	<header class="header">
    		<div class="container">
                <h1 class="logo">
                    <?php get_template_part( 'template-parts/logo' ); ?>
                </h1>
                <?php if(wp_get_nav_menu_items('header')) : ?>
                    <nav class="navigation">
                        <ul>
                            <?php 
                                foreach (wp_get_nav_menu_items('header') as $key => $value) {
                                    echo '<li class="'.( ($value->title == $page) || (get_post_type_object( get_post_type() )->labels->name && is_single() && $value->title == get_post_type_object( get_post_type() )->labels->name) || ((is_archive() || is_category()) && get_queried_object()->name == $value->title) ? 'current' : '' ).'"><a href="'.$value->url.'" title="'.$value->title.'">'.$value->title.'</a>
                                        </li>';
                                }
                            ?> 
                            <li>
                                <button onclick="mobileNavigation(this)" class="hamburger hamburger--collapse" type="button">
                                  <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                  </span>
                                </button>   
                            </li>      
                        </ul>
                    </nav>      
                <?php endif; ?>
                <?php if ( get_theme_mod('facebook') || get_theme_mod('instagram')) : ?>
                <ul class="socialnetworks">
                    <?php if ( get_theme_mod('instagram') ) : ?>
                    <li><a target="_blank" href="<?php echo get_theme_mod('instagram');  ?>" title="Instagram" target="_blank"><i class="fab fa-instagram"></i></a></li>
                    <?php endif; ?>                    
                    <?php if ( get_theme_mod('facebook') ) : ?>
                    <li><a target="_blank" href="<?php echo get_theme_mod('facebook');  ?>" title="Facebook" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                    <?php endif; ?>
                </ul>
                <?php endif; ?>
            </div>
    	</header>
        <?php if(wp_get_nav_menu_items('header')) : ?>
            <nav class="navigation mobile">
                <ul>
                    <?php 
                        foreach (wp_get_nav_menu_items('header') as $key => $value) {
                            echo '<li class="'.( ($value->title == $page) ? 'current' : '' ).'"><a href="'.$value->url.'" title="'.$value->title.'">'.$value->title.'</a>
                                </li>';
                        }
                    ?>    
                </ul>
            </nav>      
        <?php endif; ?>        
    	<main class="main">