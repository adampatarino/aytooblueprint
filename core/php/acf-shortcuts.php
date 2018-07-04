<?php

/*
 * ACF SHORTCUTS (v1.2 and up)
 * Feel free to create your own ACF functions, or write your own calls to these
 * in your template files.
 */

function scratch_field($field_name, $tag = null, $classes = null, $option = null) {
  if($tag !== null) {
    $opening_tag = '<' . $tag;
    if($classes !== null) {
      $opening_tag .= ' class="' . $classes . '">';
    } else {
      $opening_tag .= '>';
    }
    $closing_tag = '</' . $tag . '>';
    if($option !== null) {
      if(get_field($field_name, $option)) {
        echo $opening_tag;
        the_field($field_name, $option);
        echo $closing_tag;
      }
    } else {
      if(get_field($field_name)) {
        echo $opening_tag;
        the_field($field_name);
        echo $closing_tag;
      }
    }
  } else {
    if($option !== null) {
      if(get_field($field_name, $option)) {
        the_field($field_name, $option);
      }
    } else {
      if(get_field($field_name)) {
        the_field($field_name);
      }
    }
  }
}

function scratch_raw_field($field_name, $before = null, $after = null, $option = null) {
  if($option !== null) {
    if(get_field($field_name, $option)) {
      if($before !== null) {
        echo $before;
      }
      the_field($field_name, $option);
      if($after !== null) {
        echo $after;
      }
    }
  } else {
    if(get_field($field_name)) {
      if($before !== null) {
        echo $before;
      }
      the_field($field_name);
      if($after !== null) {
        echo $after;
      }
    }
  }
}

function scratch_sub_field($field_name, $tag = null, $classes = null, $option = null) {
  if($tag !== null) {
    $opening_tag = '<' . $tag;
    if($classes !== null) {
      $opening_tag .= ' class="' . $classes . '">';
    } else {
      $opening_tag .= '>';
    }
    $closing_tag = '</' . $tag . '>';
    if($option !== null) {
      if(get_sub_field($field_name, $option)) {
        echo $opening_tag;
        the_sub_field($field_name, $option);
        echo $closing_tag;
      }
    } else {
      if(get_sub_field($field_name)) {
        echo $opening_tag;
        the_sub_field($field_name);
        echo $closing_tag;
      }
    }
  } else {
    if($option !== null) {
      if(get_sub_field($field_name, $option)) {
        the_sub_field($field_name, $option);
      }
    } else {
      if(get_sub_field($field_name)) {
        the_sub_field($field_name);
      }
    }
  }
}

function scratch_raw_sub_field($field_name, $before = null, $after = null, $option = null) {
  if($option !== null) {
    if(get_sub_field($field_name, $option)) {
      if($before !== null) {
        echo $before;
      }
      the_sub_field($field_name, $option);
      if($after !== null) {
        echo $after;
      }
    }
  } else {
    if(get_sub_field($field_name)) {
      if($before !== null) {
        echo $before;
      }
      the_sub_field($field_name);
      if($after !== null) {
        echo $after;
      }
    }
  }
}

function scratch_link_start($href, $title, $classes = null, $option = null) {
  if($option !== null) {
    if(get_field($href, $option)) {
      echo '<a href="' . get_field($href, $option) . '"';
      echo ' title="' . get_field($title, $option) . '"';
      if($classes !== null) {
        echo ' class="' . $classes . '">';
      } else {
        echo '>';
      }
    }
  } else {
    if(get_field($href)) {
      echo '<a href="' . get_field($href) . '"';
      echo ' title="' . get_field($title) . '"';
      if($classes !== null) {
        echo ' class="' . $classes . '">';
      } else {
        echo '>';
      }
    }
  }
}

function scratch_link_end($href, $option = null) {
  if($option !== null) {
    if(get_field($href, $option)) {
      echo '</a>';
    }
  } else {
    if(get_field($href)) {
      echo '</a>';
    }
  }
}

function scratch_sub_link_start($href, $title, $classes = null, $option = null) {
  if($option !== null) {
    if(get_sub_field($href, $option)) {
      echo '<a href="' . get_sub_field($href, $option) . '"';
      echo ' title="' . get_sub_field($title, $option) . '"';
      if($classes !== null) {
        echo ' class="' . $classes . '">';
      } else {
        echo '>';
      }
    }
  } else {
    if(get_sub_field($href)) {
      echo '<a href="' . get_sub_field($href) . '"';
      echo ' title="' . get_sub_field($title) . '"';
      if($classes !== null) {
        echo ' class="' . $classes . '">';
      } else {
        echo '>';
      }
    }
  }
}

function scratch_sub_link_end($href, $option = null) {
  if($option !== null) {
    if(get_sub_field($href, $option)) {
      echo '</a>';
    }
  } else {
    if(get_sub_field($href)) {
      echo '</a>';
    }
  }
}

function scratch_image_start($src, $classes = null, $option = null) {
  if($option !== null) {
    if(get_field($src, $option)) {
      echo '<figure class="scratch-image';
      if($classes !== null) {
        echo ' ' . $classes . '"';
      } else {
        echo '"';
      }
      echo ' style="background-image: url(' . get_field($src, $option) . ');">';
    }
  } else {
    if(get_field($src)) {
      echo '<figure class="scratch-image';
      if($classes !== null) {
        echo ' ' . $classes . '"';
      } else {
        echo '"';
      }
      echo ' style="background-image: url(' . get_field($src) . ');">';
    }
  }
}

function scratch_image_end($src, $option = null) {
  if($option !== null) {
    if(get_field($src, $option)) {
      echo '</figure>';
    }
  } else {
    if(get_field($src)) {
      echo '</figure>';
    }
  }
}

function scratch_sub_image_start($src, $classes = null, $option = null) {
  if($option !== null) {
    if(get_sub_field($src, $option)) {
      echo '<figure class="scratch-image';
      if($classes !== null) {
        echo ' ' . $classes . '"';
      } else {
        echo '"';
      }
      echo ' style="background-image: url(' . get_sub_field($src, $option) . ');">';
    }
  } else {
    if(get_sub_field($src)) {
      echo '<figure class="scratch-image';
      if($classes !== null) {
        echo ' ' . $classes . '"';
      } else {
        echo '"';
      }
      echo ' style="background-image: url(' . get_sub_field($src) . ');">';
    }
  }
}

function scratch_sub_image_end($src, $option = null) {
  if($option !== null) {
    if(get_sub_field($src, $option)) {
      echo '</figure>';
    }
  } else {
    if(get_sub_field($src)) {
      echo '</figure>';
    }
  }
}

function scratch_icon($field_name, $classes = null, $option = null) {
  if($option !== null) {
    if(get_field($field_name, $option)) {
      if($classes !== null) {
        echo '<i class="' . get_field($field_name, $option) . ' ' . $classes . '"></i>';
      } else {
        echo '<i class="' . get_field($field_name, $option) . '"></i>';
      }
    }
  } else {
    if(get_field($field_name)) {
      if($classes !== null) {
        echo '<i class="' . get_field($field_name) . ' ' . $classes . '"></i>';
      } else {
        echo '<i class="' . get_field($field_name) . '"></i>';
      }
    }
  }
}

function scratch_sub_icon($field_name, $classes = null, $option = null) {
  if($option !== null) {
    if(get_sub_field($field_name, $option)) {
      if($classes !== null) {
        echo '<i class="' . get_sub_field($field_name, $option) . ' ' . $classes . '"></i>';
      } else {
        echo '<i class="' . get_sub_field($field_name, $option) . '"></i>';
      }
    }
  } else {
    if(get_sub_field($field_name)) {
      if($classes !== null) {
        echo '<i class="' . get_sub_field($field_name) . ' ' . $classes . '"></i>';
      } else {
        echo '<i class="' . get_sub_field($field_name) . '"></i>';
      }
    }
  }
}

function scratch_icon_circle($field_name, $option = null) {
  if($option !== null) {
    if(get_field($field_name, $option)) {
      echo '<div class="circle center">';
      echo '<i class="' . get_field($field_name, $option) . ' valign-always"></i>';
      echo '</div>';
    }
  } else {
    if(get_field($field_name)) {
      echo '<div class="circle center">';
      echo '<i class="' . get_field($field_name) . ' valign-always"></i>';
      echo '</div>';
    }
  }
}

function scratch_sub_icon_circle($field_name, $option = null) {
  if($option !== null) {
    if(get_sub_field($field_name, $option)) {
      echo '<div class="circle center">';
      echo '<i class="' . get_sub_field($field_name, $option) . ' valign-always"></i>';
      echo '</div>';
    }
  } else {
    if(get_sub_field($field_name)) {
      echo '<div class="circle center">';
      echo '<i class="' . get_sub_field($field_name) . ' valign-always"></i>';
      echo '</div>';
    }
  }
}

function scratch_button($href, $title, $classes = null, $option = null) { ?>

<?php if($option !== null) { ?>

<?php if(get_field($title, $option)) { ?>

<p>
  <a class="button<?php if($classes !== null) { echo ' ' . $classes; } ?>"
   href="<?php the_field($href, $option); ?>"
   title="<?php the_field($title, $option); ?>">
   <?php the_field($title, $option); ?>
 </a>
</p>

<?php } ?>

<?php } else { ?>

<?php if(get_field($title)) { ?>

<p>
  <a class="button<?php if($classes !== null) { echo ' ' . $classes; } ?>"
   href="<?php the_field($href); ?>"
   title="<?php the_field($title); ?>">
   <?php the_field($title); ?>
 </a>
</p>

<?php } ?>

<?php }

}

function scratch_sub_button($href, $title, $classes = null, $option = null) { ?>

<?php if($option !== null) { ?>

<?php if(get_sub_field($title, $option)) { ?>

<p>
  <a class="button<?php if($classes !== null) { echo ' ' . $classes; } ?>"
   href="<?php the_sub_field($href, $option); ?>"
   title="<?php the_sub_field($title, $option); ?>">
   <?php the_sub_field($title, $option); ?>
 </a>
</p>

<?php } ?>

<?php } else { ?>

<?php if(get_sub_field($title)) { ?>

<p>
  <a class="button<?php if($classes !== null) { echo ' ' . $classes; } ?>"
   href="<?php the_sub_field($href); ?>"
   title="<?php the_sub_field($title); ?>">
   <?php the_sub_field($title); ?>
 </a>
</p>

<?php } ?>

<?php }

}

?>
