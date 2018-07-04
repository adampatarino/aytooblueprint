<?php get_header(); ?>

<main role="main" itemscope itemtype="http://schema.org/SearchResultsPage">

  <div class="container headroom wrap hpad clearfix">
		<h1 class="center">Search results for: <em><?php echo esc_attr(get_search_query()); ?></em></h1>

  <section class="posts-list row">
  <?php if (have_posts()): ?>
    <?php while (have_posts()): the_post(); ?>

        <?php get_template_part('/partials/loop');?>

    <?php endwhile; else: ?>

      <p>No posts here.</p>

  <?php endif; ?>

  </section>
  <?php get_sidebar(); ?>

  </div>

</main>

<?php get_footer(); ?>
