<?php
/*
 * Plugin Name: Bird Tree Page
 * Plugin URI: https://twitter.com/jitendra_popat
 * Description: all right recived by Jitendra
 * Version: 2.1
 * Author: Jiten IT - Jitendra
 * Author URI: https://twitter.com/jitendra_popat
 */


}

// use [show_your_business] short code in page to print data
// for developer modify your page and output as per your requirments

function show_your_business_shortcut($atts) {

    //print_r($atts); die();
    $_SESSION['path'] = ABSPATH;

    extract(shortcode_atts(array(
        "limit" => '',
        "category" => '',
        "order"=> '',
        ), $atts));

   // Define limit
    if (!empty($limit)) {
        $posts_per_page = $limit;
    } else {
        $posts_per_page = '-1';
    }
    // Define category
     if (!empty($category)) {
        $cat = $category;
    } else {
        $cat = '';
    }

     if (!empty($order)) {
        $ord = $order;
    } else {
        $ord = 'DESC';
    }

     if (!empty($faqcategory)) {
        $faqcat = $faqcategory;
    } else {
        $faqcat = '';
    }

    $args = array(
        'post_type' => 'product',
        'order'             => 'DESC',
        'post_status' => 'publish',
        );

    $output='<section class="myteamhome">';

    global $post;
    include('buisness.php');
    $the_query = new WP_Query($args);
    $i = 1;
    while ($the_query->have_posts()):
        $the_query->the_post();


    $output.= '<div class="postmeta">
        <div class="figure-cont">
        '.get_the_post_thumbnail(get_the_ID()).'
      </div>
      <div class="desc_txt">
         <div class="t_title"> 
             ' . get_the_title() . '
        </div>
        <div class="descroptions">
        ' .wp_trim_words( get_the_content(), 10, '...' ). '
        </div>
        </div>
    </div>';
        $i++;
        endwhile;
        wp_reset_postdata();
        $output .= '</section>';

        echo $output;
} 
add_shortcode('show_your_business', 'show_your_business_shortcut');


// show bird tree using [bird_tree] shortcode

function show_bird_tree_shortcut($atts) {

    //print_r($atts); die();
    $_SESSION['path'] = ABSPATH;

    extract(shortcode_atts(array(
        "limit" => '',
        "category" => '',
        "order"=> '',
        ), $atts));

   // Define limit
    if (!empty($limit)) {
        $posts_per_page = $limit;
    } else {
        $posts_per_page = '-1';
    }
    // Define category
     if (!empty($category)) {
        $cat = $category;
    } else {
        $cat = '';
    }

     if (!empty($order)) {
        $ord = $order;
    } else {
        $ord = 'DESC';
    }

     if (!empty($faqcategory)) {
        $faqcat = $faqcategory;
    } else {
        $faqcat = '';
    }

    $args = array(
        'post_type' => 'product',
        'order'             => 'DESC',
        'post_status' => 'publish',
        );

    $output='<section class="myteamhome">';

    global $post;
    include('tree.php');
    $the_query = new WP_Query($args);
    $i = 1;
    while ($the_query->have_posts()):
        $the_query->the_post();


    $output.= '<div class="all_post">
        <div class="figure-cont">
        '.get_the_post_thumbnail(get_the_ID()).'
      </div>
      <div class="desc_txt">
         <div class="t_title"> 
             ' . get_the_title() . '
        </div>
        <div class="descroptions">
        ' .wp_trim_words( get_the_content(), 10, '...' ). '
        </div>
        </div>
    </div>';
        $i++;
        endwhile;
        wp_reset_postdata();
        $output .= '</section>';

        echo $output;
} 
add_shortcode('bird_tree', 'show_bird_tree_shortcut');


