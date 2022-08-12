<?php get_header(); ?>
<?php while (have_posts()) : the_post(); ?>
  <section class="elementor-section elementor-top-section elementor-element elementor-section-boxed content" data-element_type="section">
    <div class="elementor-container elementor-column-gap-default">
      <div class="elementor-column elementor-col-75 elementor-top-column elementor-element" data-element_type="column">
        <div class="elementor-widget-wrap elementor-element-populated">
          <h1><?php echo get_the_title(); ?></h1>
          <h2><?php echo do_shortcode('[acf field="blurb"]'); ?></h2>
          <?php echo the_content(); ?>
          <h3 class="text-center">Request A Consultation</h3>
          <p class="text-center">You can complete the following form to request a consultation</p>
          <?php echo do_shortcode('[fluentform id="3"]') ?>
        </div>
      </div>
      <div class="elementor-column elementor-col-25 elementor-top-column elementor-element" data-element_type="column">
        <div class="elementor-widget-wrap elementor-element-populated">
          <h3>All Practice Areas</h3>
          <?php echo do_shortcode('[practice_areas_link]'); ?>
        </div>
      </div>
    </div>
  </section>
<?php endwhile; ?>
<?php get_footer(); ?>