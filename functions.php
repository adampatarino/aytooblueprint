<?php

/* Wp Admin */
require_once('core/scratch.php');
require_once('admin/custom-widgets.php');
require_once('admin/custom-post-types.php');
require_once('admin/sidebars.php');
require_once('admin/nav.php');
require_once('admin/acf.php');

/** Front End **/
require_once('assets/assets.php');


/* Make the "Read More" link to the post */
function new_excerpt_more( $more ) {
	return '';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );

/**
 * AYTOO FUNCTIONS
 */

function bones_page_navi() {
  global $wp_query;
  $bignum = 999999999;
  if ( $wp_query->max_num_pages <= 1 )
  return;

  echo '<nav class="pagination">';

    echo paginate_links( array(
      'base'      => str_replace( $bignum, '%#%', esc_url( get_pagenum_link($bignum) ) ),
      'format'    => '',
      'current'     => max( 1, get_query_var('paged') ),
      'total'     => $wp_query->max_num_pages,
      'prev_text'   => '<i class="icon ion-arrow-left-c"></i>',
      'next_text'   => '<i class="icon ion-arrow-right-c"></i>',
      'type'      => 'list',
      'end_size'    => 0,
      'mid_size'    => 2
    ) );

  echo '</nav>';
} /* end page navi */

function a2_src($url) {
  return str_replace('www.', '', parse_url($url)['host']);
}

function a2_social_share($pid) {
  $email_href = urlencode('https://twitter.com/thebasispoint');
  $urlString = addslashes( get_the_title() . ' by @thebasispoint ' . get_permalink() );
  return '
    <div class="social-links clearfix">
      <div class="meta-box post-twitter-share">
        <a href="http://twitter.com/intent/tweet?text='. $urlString .'" target="_blank" class="popup">
          <i class="icon ion-social-twitter"></i>
        </a>
      </div>
      <div class="meta-box post-facebook-share">
        <a href="https://www.facebook.com/sharer.php?u='. get_the_permalink($pid) .'" target="_blank" class="popup">
          <i class="icon ion-social-facebook"></i>
        </a>
      </div>
      <div class="meta-box post-linkedin-share">
        <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url='. get_the_permalink($pid) .'&amp;title='. get_the_title($pid) .'" target="_blank" class="popup">
          <i class="icon ion-social-linkedin"></i>
        </a>
      </div>
      <div class="meta-box post-email-share">
        <a href="mailto:someone@example.com?subject='. get_the_title() .'&body='. urlencode(get_the_permalink()) .'%0A %0A'. get_the_excerpt() .'%0A %0A Follow @thebasispoint %0A'. $email_href .'" target="_blank">
          <i class="icon ion-email"></i>
        </a>
      </div>
    </div>';
}

function a2_article_share() {
  global $post, $posts;

  $urlString = addslashes( get_the_title() . ' by @thebasispoint ' . get_permalink() );
  $linkString = htmlentities("url=" . urlencode(get_permalink()) . "&title=" . urlencode(get_the_title()));

  ob_start(); ?>
  <ul class="rrssb-buttons clearfix">
    <li class="twitter">
      <a href="http://twitter.com/intent/tweet?text=<?php echo $urlString; ?>" target="_blank" class="popup">
        <span class="icon">
          <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
               width="28px" height="28px" viewBox="0 0 28 28" enable-background="new 0 0 28 28" xml:space="preserve">
          <path d="M24.253,8.756C24.689,17.08,18.297,24.182,9.97,24.62c-3.122,0.162-6.219-0.646-8.861-2.32
              c2.703,0.179,5.376-0.648,7.508-2.321c-2.072-0.247-3.818-1.661-4.489-3.638c0.801,0.128,1.62,0.076,2.399-0.155
              C4.045,15.72,2.215,13.6,2.115,11.077c0.688,0.275,1.426,0.407,2.168,0.386c-2.135-1.65-2.729-4.621-1.394-6.965
              C5.575,7.816,9.54,9.84,13.803,10.071c-0.842-2.739,0.694-5.64,3.434-6.482c2.018-0.623,4.212,0.044,5.546,1.683
              c1.186-0.213,2.318-0.662,3.329-1.317c-0.385,1.256-1.247,2.312-2.399,2.942c1.048-0.106,2.069-0.394,3.019-0.851
              C26.275,7.229,25.39,8.196,24.253,8.756z"/>
          </svg>
        </span>
        <span class="text">twitter</span>
      </a>
    </li>

    <li class="facebook">
      <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank" class="popup">
        <span class="icon">
          <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="28px" height="28px" viewBox="0 0 28 28" enable-background="new 0 0 28 28" xml:space="preserve">
            <path d="M27.825,4.783c0-2.427-2.182-4.608-4.608-4.608H4.783c-2.422,0-4.608,2.182-4.608,4.608v18.434
                c0,2.427,2.181,4.608,4.608,4.608H14V17.379h-3.379v-4.608H14v-1.795c0-3.089,2.335-5.885,5.192-5.885h3.718v4.608h-3.726
                c-0.408,0-0.884,0.492-0.884,1.236v1.836h4.609v4.608h-4.609v10.446h4.916c2.422,0,4.608-2.188,4.608-4.608V4.783z"/>
          </svg>
        </span>
        <span class="text">facebook</span>
      </a>
    </li>

     <li class="linkedin">
        <a href="http://www.linkedin.com/shareArticle?mini=true&amp;<?php echo $linkString; ?>" target="_blank" class="popup">
            <span class="icon">
                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="28px" height="28px" viewBox="0 0 28 28" enable-background="new 0 0 28 28" xml:space="preserve">
                    <path d="M25.424,15.887v8.447h-4.896v-7.882c0-1.979-0.709-3.331-2.48-3.331c-1.354,0-2.158,0.911-2.514,1.803
                        c-0.129,0.315-0.162,0.753-0.162,1.194v8.216h-4.899c0,0,0.066-13.349,0-14.731h4.899v2.088c-0.01,0.016-0.023,0.032-0.033,0.048
                        h0.033V11.69c0.65-1.002,1.812-2.435,4.414-2.435C23.008,9.254,25.424,11.361,25.424,15.887z M5.348,2.501
                        c-1.676,0-2.772,1.092-2.772,2.539c0,1.421,1.066,2.538,2.717,2.546h0.032c1.709,0,2.771-1.132,2.771-2.546
                        C8.054,3.593,7.019,2.501,5.343,2.501H5.348z M2.867,24.334h4.897V9.603H2.867V24.334z"/>
                </svg>
            </span>
            <span class="text">linkedin</span>
        </a>
    </li>

    <li class="email">
      <a href="mailto:someone@example.com?subject=<?php echo get_the_title(); ?>&body=<?php echo urlencode(get_the_permalink()); ?>%0A %0A<?php echo get_the_excerpt(); ?>%0A %0A Follow @thebasispoint %0A https://twitter.com/thebasispoint" target="_blank">
        <span class="icon">
          <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 512 512">
            <path d="M50,103.407v305.186h412V103.407H50z M440.687,385.894L315.635,262.476l-59.144,59.053l-58.667-59.759 L72.101,385.894l98.943-146.842L72.101,125.028l184.408,138.541l184.178-138.041l-98.819,113.684L440.687,385.894z"/>
          </svg>
        </span>
        <span class="text">email</span>
      </a>
    </li>

  </ul>
  <?php
  ob_end_flush();
}

/* Don't delete this closing tag. */
?>
