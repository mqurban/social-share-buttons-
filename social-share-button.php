<?php
/*
Plugin Name: Social Share Buttons
Description: This plugin will add share buttons to social media under each post.
Author: Muhammad Qurban
Author URI: mqurban.com
Version: 1.0
*/


if (!defined('ABSPATH')) {
    exit;
}


function social_share_scripts()
{
    wp_enqueue_style('social_share_css', plugin_dir_url(__FILE__) . '/css/style.css');

    wp_enqueue_script('social_share_js', plugin_dir_url(__FILE__) . '/js/main.js');
}

add_action('wp_enqueue_scripts', 'social_share_scripts');



function custom_social_share_buttons($content)
{
    $post_url = get_permalink();

    $social_buttons = '
    <div class="custom-social_share">
    <a href = "https://www.facebook.com/sharer/sharer.php? u=' . ($post_url) . '" target="_blank">Share to Facebook</a>
    <a href = "https://www.twitter.com/intent/tweet? url=' . ($post_url) . '" target="_blank">Share to Twitter</a>
    <a href = "https://www.linkedin.com/sharing/share-offsite/? url=' . ($post_url) . '" target="_blank">Share to Linkedin</a>
    </dvi>';

    $content .= $social_buttons;

    return $content;
}

add_filter('the_content', 'custom_social_share_buttons');
