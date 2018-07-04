<?php get_header(); ?>

<main role="main">
    
    <section class="headroom wrap container hpad clearfix">
        
        <div class="post row clearfix" id="single-post" <?php post_class(); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
            
            <?php get_template_part('/partials/loop');?>
            
            <?php  get_sidebar(); ?>
            
        </div>
        
    </section>
    
</main>

<?php get_footer(); ?>
