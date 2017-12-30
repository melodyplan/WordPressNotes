<?php

get_header();

if (have_posts()) :
  while (have_posts()) : the_post();

  /* <article class="post">
    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

    <p class="post-info">

      <?php the_time('F jS, Y g:i a'); ?> | by <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author() ?></a> | Posted in
      <?php
        $categories = get_the_category();
        $separator = ", ";
        $output = '';

        if ($categories) {

          foreach ($categories as $category) {

            // ```.=``` adds on to a variable instead of overwriting it, so in this case it adds on another category instead of replaces the first one it finds.
            $output .= '<a href="' . get_category_link($category->term_id) . '">' . $category->cat_name . '</a>' . $separator;

          }

          //this tells it to remove the comma after the final category
          echo trim($output, $separator);

        }
      ?>
    </p>

    <?php the_post_thumbnail('banner-image'); ?>

    <?php the_content('Continue reading &raquo;'); ?>

  </article> */

get_template_part('content', get_post_format());

endwhile;

  else :
    echo '<p>No content found</p>';

  endif;

get_footer();

?>
