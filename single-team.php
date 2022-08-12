<?php get_header(); ?>
<?php while(have_posts()) : the_post(); ?>
<section class="elementor-section elementor-top-section elementor-element elementor-section-boxed" data-element_type="section">
    <div class="elementor-container elementor-column-gap-default">
    <div class="elementor-column elementor-col-30 elementor-top-column elementor-element" data-element_type="column">
        <div class="elementor-widget-wrap elementor-element-populated">
          
        </div>
      </div>
      <div class="elementor-column elementor-col-70 elementor-top-column elementor-element" data-element_type="column">
        <div class="elementor-widget-wrap elementor-element-populated">
          <h1><?php echo get_the_title(); ?></h1>
          <h2><?php echo do_shortcode('[acf field="blurb"]'); ?></h2>
          <?php echo the_content(); ?>
        </div>
      </div>
    </div>
  </section>
<?php endwhile; ?>
<?php get_footer();?>