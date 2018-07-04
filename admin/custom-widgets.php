<?php

global $post;

add_action( 'widgets_init', 'a2_widgets' );


function a2_widgets() {
    register_widget( 'Recent_Categories_Widget' );
    register_widget( 'Link_Fest_Widget' );
    register_widget( 'A2_Networks_Widget' );
}

class Recent_Categories_Widget extends WP_Widget {
    function Recent_Categories_Widget() {
        $widget_ops = array( 'classname' => 'Recent_Categories widget', 'description' => __('Display the categories and tags', 'recent_categories') );
        $control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'recent_categories-widget' );
        parent::__construct( 'recent_categories-widget', __('Recent Categories Widget', 'custom'), $widget_ops, $control_ops );
    }

    function widget( $args, $instance ) {
        extract( $args );
        //Our variables from the widget settings.
        $title = $instance['title'];
        $max_count = $instance['max_count'];
        $cat_counter = 0;
        $tag_counter = 0;

        $args = array(
        'numberposts' => 100,
        'offset' => 0,
        'orderby' => 'post_date',
        'order' => 'DESC',
        'post_type' => 'post',
        'post_status' => 'publish',
        'suppress_filters' => true );

        $recent_posts = get_posts( $args );



        $listed_categories = array();
        $listed_tags = array();
        foreach ($recent_posts as $apost) {
            $categories = get_the_category($apost->ID);
            $tags = get_the_tags($apost->ID);

            if($categories) {
                foreach ($categories as $acategory) {
                    if(!array_key_exists($acategory->cat_ID, $listed_categories)){
                        $listed_categories[$acategory->cat_ID] = array("name" => $acategory->cat_name, "count" => 1, "date" => $apost->ID);
                    } else {
                        $listed_categories[$acategory->cat_ID]["count"] = $listed_categories[$acategory->cat_ID]["count"] + 1;
                    }
                }
            }
            if($tags) {
                foreach ($tags as $atag) {
                    if(!array_key_exists($atag->term_id , $listed_categories)){
                        $listed_tags[$atag->term_id] = $atag->name;
                    }
                }
            }
        }

        if($listed_categories || $listed_tags) {
            echo $before_widget;
            echo '<div class="inner-recent-categories-widget clearfix">';
            echo '<h2 class="widgettitle">'.$title.'</h2>';

            if($listed_categories) {
                echo '<div class="recent-cats-widget recent-cats sixcol first">';
                // echo '<h4 class="recent-categories-title">Categories</h4>';
                echo '<ul>';

                foreach($listed_categories as $key => $value) {
                    echo '<li class="cat-item cat-item-'.$key.'">';
                    echo '<a href="'.get_category_link($key).'">';
                    echo $value["name"].'</a>';
                    echo "</li>";
                    $cat_counter++;
                    if($cat_counter >= $max_count) {
                        break;
                    }
                }

                echo '</ul>';
                echo '</div>';
            }

            if($listed_tags) {
                echo '<div class="recent-cats-widget recent-tags sixcol last">';
                // echo '<h4 class="recent-categories-title">Tags</h4>';
                echo '<ul>';

                foreach($listed_tags as $key => $value) {
                    echo '<li class="cat-item cat-item-'.$key.'">';
                    echo '<a href="'.get_tag_link($key).'">';
                    echo $value .'</a>';
                    echo "</li>";
                    $tag_counter++;
                    if($tag_counter >= $max_count) {
                        break;
                    }
                }

                echo '</ul>';
                echo '</div>';
            }

            echo "</div>";
            echo $after_widget;
        }
    }

    //Update the widget
    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;

        $instance['title'] = strip_tags( $new_instance['title'] );
        $instance['max_count'] = strip_tags( $new_instance['max_count'] );

        return $instance;
    }

    function form( $instance ) {
        $defaults = array( 'title' => __("Recent Categories", 'example'), 'max_count' => '5');
        $instance = wp_parse_args( (array) $instance, $defaults );

        ?>

        <!-- Title -->
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'example'); ?></label>
            <input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:100%;" />
        </p>

        <!-- Max Count -->
        <p>
            <label for="<?php echo $this->get_field_id( 'max_count' ); ?>"><?php _e( 'Max number of categories to show:' ); ?>
                <input id="<?php echo $this->get_field_id( 'max_count' ); ?>" name="<?php echo $this->get_field_name( 'max_count' ); ?>" type="number" value="<?php echo $instance['max_count'] ?>" size="3" />
            </label>
        </p>


        <?php
    }
} // End Widget


class Link_Fest_Widget extends WP_Widget {
    function Link_Fest_Widget() {
        $widget_ops = array( 'classname' => 'link_fest widget', 'description' => __('Display the most recent link fest group', 'link_fest') );
        $control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'link_fest-widget' );
        parent::__construct( 'link_fest-widget', __('Link Fest Widget', 'custom'), $widget_ops, $control_ops );
    }

    function widget( $args, $instance ) {
        extract( $args );
        //Our variables from the widget settings.
        $title = $instance['title'];
        $max_count = $instance['max_count'];


        $args = array(
            'posts_per_page' => 1,
            'category_name' => 'linkage',
            'orderby' => 'date',
            'order' => 'DESC'
            );
        $links_query = new WP_Query( $args );

        if ( $links_query->have_posts() ) {

            echo $before_widget;

            while ( $links_query->have_posts() ) {
                $links_query->the_post();
                $groups = get_field('link_group');
                $links_arr = array();

                foreach($groups as $group) {
                    if($group) {
                        foreach($group['links'] as $link) {
                            array_push($links_arr, $link);
                        }
                    }
                }
                if($links_arr) {
                    $links = array_slice($links_arr, 0, $max_count, true);
                }

                if($links) {

                    $host_list = array();
                    $count = 0;
                    foreach($links as $link) {
                        array_push($host_list, str_replace('www.', '', parse_url($link['source'])['host']) );
                    }
                    $faviconBG = 'http://favicon.yandex.net/favicon/'. implode('/',$host_list);

                    echo "<div class='inner-widget'>";
                     echo '<h2 class="widgettitle">'.$title.'</h2>';
                        // echo '<h3 class="widget-title"><a href="'. get_the_permalink() .'">'. $title .'</a></h3>';

                            echo "<ul class='links'>";
                            foreach($links as $link) {
                                echo '<li class="link">';
                                echo '<span class="link-favicon" style="background-image:url('. $faviconBG .'); background-position: 0px -'. 16 * $count .'px;"></span>';
                                echo '<a href="'. $link['source'] .'" target="_blank">'. $link['description'] .'</a> <span class="link-source">('. a2_src($link['source']) .')</span>';
                                $count++;
                            }
                            echo "</ul>";

                            echo "<a class='read-more' href='". get_the_permalink() ."'>Read More</a>";
                    echo "</div>";

                }
            }

            echo $after_widget;
        }
    }

    //Update the widget
    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;

        $instance['title'] = strip_tags( $new_instance['title'] );
        $instance['max_count'] = strip_tags( $new_instance['max_count'] );

        return $instance;
    }

    function form( $instance ) {
        $defaults = array( 'title' => __("Recent Categories", 'example'), 'max_count' => '5');
        $instance = wp_parse_args( (array) $instance, $defaults );

        ?>

        <!-- Title -->
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'example'); ?></label>
            <input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:100%;" />
        </p>

        <!-- Max Count -->
        <p>
            <label for="<?php echo $this->get_field_id( 'max_count' ); ?>"><?php _e( 'Max number of categories to show:' ); ?>
                <input id="<?php echo $this->get_field_id( 'max_count' ); ?>" name="<?php echo $this->get_field_name( 'max_count' ); ?>" type="number" value="<?php echo $instance['max_count'] ?>" size="3" />
            </label>
        </p>


        <?php
    }
} // End Widget

class A2_Networks_Widget extends WP_Widget {
    function A2_Networks_Widget() {
        $widget_ops = array( 'classname' => 'a2_networks widget', 'description' => __('Display As Seen On Networks', 'a2_networks') );
        $control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'a2_networks-widget' );
        parent::__construct( 'a2_networks-widget', __('Aytoo Networks', 'custom'), $widget_ops, $control_ops );
    }

    function widget( $args, $instance ) {
        extract( $args );
        //Our variables from the widget settings.
        $title = $instance['title'];
        $networks = get_field('networks', 'option');
        if($networks) {
            echo $before_widget;
            echo '<h2 class="widgettitle">'.$title.'</h2>';
                echo '<div class="network-box clearfix">';
                    echo '<div class="as-seen-on">
                            <div class="networks slick">';
                                foreach($networks as $network) {
                                    echo '<div class="network"><img src="'. $network["logo"] .'"/></div>';
                                }
                            echo '</div>
                        </div>
                    </div>';
            echo $after_widget;
        }
    }

    //Update the widget
    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;

        $instance['title'] = strip_tags( $new_instance['title'] );

        return $instance;
    }

    function form( $instance ) {
        $defaults = array( 'title' => __("As Seen On", 'example'));
        $instance = wp_parse_args( (array) $instance, $defaults );

        ?>

        <!-- Title -->
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'example'); ?></label>
            <input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:100%;" />
        </p>
        <p>
            <a href="/wp-admin/admin.php?page=acf-options-sidebar">Manage Networks Here</a>
        </p>


        <?php
    }
} // End Widg
