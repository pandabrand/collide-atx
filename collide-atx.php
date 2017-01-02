<?php
/*
Plugin Name: Collide ATX Custom Post Types
Description: Custom Post Types for "Culture Collide ATX" website.
Author: Frederick Wells
Author URI: http://www.pandabrand.net
*/

add_action( 'init', 'collide_atx_cpt' );

function collide_atx_cpt() {
  register_post_type( 'chef', array(
    'labels' => array(
      'name' => 'Chefs',
      'singular_name' => 'Chef',
     ),
    'description' => 'Chefs that will be cooking at COLLiDe ATX.',
    'public' => true,
    'menu_position' => 20,
    'supports' => array( 'title', 'editor', 'custom-fields' )
  ));

  register_post_type( 'artist', array(
    'labels' => array(
      'name' => 'Artists',
      'singular_name' => 'Artist',
     ),
    'description' => 'Chefs that will be cooking at COLLiDe ATX.',
    'public' => true,
    'menu_position' => 20,
    'supports' => array( 'title', 'editor', 'custom-fields' )
  ));
}
