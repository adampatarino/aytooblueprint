<?php get_header(); ?>

<main role="main">

  <section class="headroom wrap hpad clearfix">
	
  <?php if (have_posts()): ?>
    <?php while (have_posts()): the_post(); ?>

    <?php get_template_part('/partials/loop');?>

    <?php endwhile; ?>

    <?php if ( function_exists( 'bones_page_navi' ) ) { ?>
        <?php bones_page_navi(); ?>
    <?php } ?>
    
    
     <?php endif; ?>

  
  <?php get_sidebar(); ?>
  </section>

</main>

<?php get_footer(); ?>
