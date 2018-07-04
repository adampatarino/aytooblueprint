<?php get_header();?>

<main role="main ">

  <section class="container wrap hpad clearfix">

    <article class="row clearfix" id="post-<?php the_ID(); ?>"
             <?php post_class(); ?>
             role="article">

      <section class="col-md-8 first">
      	<?php the_content(); ?>
      </section>

	 <?php get_sidebar(); ?>

    </article>

  </section>

</main>

<?php get_footer(); ?>
