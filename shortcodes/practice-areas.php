<?php
function practice_areas(){
    $query = new WP_Query(
        array(
            'post_type' => 'practice-areas',
            'post_status' => 'publish',
            'post_per_page' => -1,
            'order' => 'ASC',
            'orderby' => 'menu_order'
        )
    );
    $i = 1;
    $str = '<div class="elementor-row">';
    while ($query->have_posts()):
        $query->the_post();
        $str .= '
        <div class="elementor-column elementor-col-33 elementor-top-column elementor-element" data-element_type="column">
            <div class="practice-area-box homepage-services">
                <div class="content">
                    <a class="icon" href="'.get_the_permalink().'"><i aria-hidden="true" class="'.do_shortcode('[acf field="icon"]').'"></i></a>
                    <h3 class="title">'.get_the_title().'</h3>
                    <p class="description">'.do_shortcode('[acf field="blurb"]').'</p>
                </div>
            </div>
        </div>
        ';
        if($i % 3 == 0):
            $str .= '</div>';
            $str .= '<div class="elementor-row">';
        endif;
        $i++;
    endwhile;
    
    wp_reset_postdata();
    return $str;
/*

<div class="elementor-column elementor-col-33 elementor-inner-column elementor-element elementor-element-0e6c17c" data-id="0e6c17c" data-element_type="column" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
			<div class="elementor-widget-wrap elementor-element-populated">
								<div class="elementor-element elementor-element-c4fecd5 elementor-view-stacked elementor-shape-circle elementor-mobile-position-top elementor-vertical-align-top elementor-widget elementor-widget-icon-box" data-id="c4fecd5" data-element_type="widget" data-widget_type="icon-box.default">
				<div class="elementor-widget-container">
			<link rel="stylesheet" href="http://localhost:8888/demosite/www/wp-content/plugins/elementor/assets/css/widget-icon-box.min.css">		<div class="elementor-icon-box-wrapper">
						<div class="elementor-icon-box-icon">
				<span class="elementor-icon elementor-animation-">
				<i aria-hidden="true" class="fas fa-users"></i></span>
			</div>
						<div class="elementor-icon-box-content">
				<h3 class="elementor-icon-box-title">
					<span>
						Sapmle text gose here and details your company					</span>
				</h3>
							</div>
		</div>
				</div>
				</div>
					</div>
		</div>
*/


}

add_shortcode('practice_areas', 'practice_areas');


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

add_filter('manage_practice-areas_posts_columns', 'practice_areas_columns');

function practice_areas_columns($columns){
  $columns = array(
    // check books 
     'cb' => 'cb',
     'title' => 'Title',
     'order' => 'Order',
     'date' => 'date'
  );
  return $columns;
}

add_filter('manage_edit-practice-areas_sortable_columns', 'practice_areas_sortable_columns');

function practice_areas_sortable_columns($columns){
  $columns['order'] = 'order';
  return $columns;
}

add_action('manage_practice-areas_posts_custom_column', 'practice_areas_show_columns');

function practice_areas_show_columns($column_name){
  global $post;
  if($column_name == 'order'):
        echo $post -> menu_order;
  endif;
}