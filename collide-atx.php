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
      'menu_name' => 'Chef',
      'name_admin_bar' => 'Chef',
      'add_new' => 'Add New',
      'add_new_item' => 'Add New Chef',
      'edit_item' => 'Edit Chef',
      'new_item' => 'New Chef',
      'view_item' => 'View Chef',
      'search_items' => 'Search Chefs',
      'not_found' => 'No Chefs in the kitchen',
      'not_found_in_trash' => 'No Chefs by the dumpster(trash).',
      'all_items' => 'Chefs',
     ),
    'description' => 'Chefs that will be cooking at COLLiDe ATX.',
    'public' => true,
    'menu_position' => 20,
    'supports' => array( 'title', 'editor', 'custom-fields' ),
    'has_archive' => true
  ));

  register_post_type( 'artist', array(
    'labels' => array(
      'name' => 'Artists',
      'singular_name' => 'Artist',
      'menu_name' => 'Artist',
      'name_admin_bar' => 'Artist',
      'add_new' => 'Add New',
      'add_new_item' => 'Add New Artist',
      'edit_item' => 'Edit Artist',
      'new_item' => 'New Artist',
      'view_item' => 'View Artist',
      'search_items' => 'Search Artists',
      'not_found' => 'No Artists in the studio',
      'not_found_in_trash' => 'No Artists by the dumpster(trash).',
      'all_items' => 'Artists',
     ),
    'description' => 'Artists that will be showing work at COLLiDe ATX.',
    'public' => true,
    'menu_position' => 20,
    'supports' => array( 'title', 'editor', 'custom-fields' ),
    'has_archive' => true
  ));
}

add_action('pre_get_posts', 'atx_post_type_queries');
function atx_post_type_queries($query) {
  //No query mods in admin
  if(is_admin() || is_single()) {
    return $query;
  }

  $today = date('Ymd');
  //Chef and Artist post type query modification
  if(isset($query->query_vars['post_type']) && ($query->query_vars['post_type'] =='chef' || $query->query_vars['post_type'] =='artist')) {
    $query->set('meta_query', array(
      array(
        'key'=> 'start_date',
        'value'=> $today,
        'compare'=> '<=',
      ),
    ));
    $query->set('orderby', 'meta_value');
    $query->set('meta_key', 'start_date');
    $query->set('order', 'DESC');
  }
  return $query;
}
