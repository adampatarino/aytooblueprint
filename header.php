<!DOCTYPE html>

<head <?php do_action( 'add_head_attributes' ); ?>>
<meta charset="utf-8">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png" />
<!--[if IE]>
  <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
<![endif]-->
<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

    <header class="header">
        <div class="container">
            <nav class="navbar navbar-expand-md">
                <div class="navbar-brand">
                    <a class="brand" href="<?php get_home_url();?>">
                        <img src=""/>
                    </a>
                </div>
                
                <button class="navbar-toggler align-middle" type="button" data-toggle="collapse" data-target="#primary_navigation" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 6h-24v-3h24v4zm0 5h-24v3h24v-4zm0 8h-24v3h24v-4z"/></svg>
                  </button>
                  
                <div class="collapse navbar-collapse justify-content-end" id="primary_navigation">
                    <?php if(has_nav_menu('primary_navigation')) {
                        wp_nav_menu( array(
                            'theme_location'	=> 'primary_navigation',
                            'depth'				=> 2,
                        	'container'			=> false,
                        	'menu_class'		=> 'navbar-nav justify-content-end',
                            'fallback_cb'		=> 'WP_Bootstrap_Navwalker::fallback',
                            'walker'			=> new WP_Bootstrap_Navwalker()
                        ) );
                    } ?>
                </div>
            </div>
        </div>
    </header>

