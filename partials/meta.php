<div class="post-info">
    <?php if(get_field('is_native_post') && get_field('publisher')): 
        $publisher = get_publisher(get_field('publisher'));
    ?>
        <div class="author author-native clearfix">
            <img class="publisher-thumb fourcol first" src="<?php echo $publisher['image']; ?>"/>
            <div class="eightcol">
                <p class="publisher-name"><a href="<?php echo $publisher['href']; ?>"><?php echo $publisher['name']; ?></a></p>
                <p style="margin: 0;"><span class="native-label">Native Publisher</span> <span class="spacer">|</span> <span class="date"><?php echo get_the_date(); ?></span></p>
            </div>
        </div>
    <?php else: ?>
        <div class="author">
            <p style="margin: 0;"><span class="author-name"><?php the_author_posts_link(); ?></span> <span class="spacer">|</span> <span class="date"><?php echo get_the_date(); ?></span></p>
        </div>
    <?php endif; ?>

</div>