<?php
function practice_areas_link(){
  // WP_Query is a class defined in WordPress.
  //  It allows developers to write custom queries and display posts using different parameters. 
  // It is possible for developers to directly query WordPress database.
  $query = new WP_Query(
    array(
      'post_type' => 'practice-areas',
       // That is we called post type
      'post_status' => 'publish',
      // grab all publish practice-areas
      'post_per_page' => -1,
      // -1 shows every posts
      // Number of displays per page
      'order'=> 'ASC',
      'orderby' => 'menu_order'
    )
  );
  $links = '';
  while($query->have_posts()):
      $query->the_post();
      // basic wordpress query
      // concatenating assignment operator
      $links .= '<a href='.get_the_permalink().'" title="'.get_the_title().' ">'.get_the_title().'</a><br>';
  endwhile;
  wp_reset_postdata();
  return $links;
}

add_shortcode('practice_areas_link', 'practice_areas_link');