<?php get_header(); ?>

<?php $current_category = single_cat_title("", false); ?>

<main role="main">
  <div class="headroom container wrap hpad clearfix">

		<?php if (is_category()) { ?>
                  <h1 class="archive-title h2">
                    <?php single_cat_title(); ?>
                  </h1>

                <?php } elseif (is_tag()) { ?>
                  <h1 class="archive-title h2">
                    <?php single_tag_title(); ?>
                  </h1>

                <?php } elseif (is_author()) {
                  global $post;
                  $author_id = $post->post_author;
                ?>
                  <h1 class="archive-title h2">

                    <?php the_author_meta('display_name', $author_id); ?>

                  </h1>
                <?php } elseif (is_day()) { ?>
                  <h1 class="archive-title h2">
                    <?php the_time('l, F j, Y'); ?>
                  </h1>

                <?php } elseif (is_month()) { ?>
                    <h1 class="archive-title h2">
                      <?php the_time('F Y'); ?>
                    </h1>

                <?php } elseif (is_year()) { ?>
                    <h1 class="archive-title h2">
                      <?php the_time('Y'); ?>
                    </h1>
                <?php } ?>

	<section class="posts-list eightcol first">
  <?php if (have_posts()): ?>
    <?php while (have_posts()): the_post(); ?>

    <?php get_template_part('/partials/loop');?>

    <?php endwhile; ?>

   <?php if ( function_exists( 'bones_page_navi' ) ) { ?>
        <?php bones_page_navi(); ?>
    <?php } ?>

  <?php else: ?>

      <p>No posts here.</p>

  <?php endif; ?>

  </section>
  <?php get_sidebar(); ?>
  </div>

</main>

<?php get_footer(); ?>
