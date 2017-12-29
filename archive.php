<?php

get_header();

if (have_posts()) :

  ?>

  <h2><?php

    if ( is_category() ) {
      //grabs the category clicked on
      single_cat_title();
    } elseif ( is_tag() ) {
      single_tag_title();
    } elseif ( is_author() ) {
      //in some cases the_post() is not needed, but if there are multiple authors just include the_post() for 100% certainty
      the_post();
      echo 'Author Archives: ' . get_the_author();
      //rewind_posts() allow the loop to go on unaffected
      rewind_posts();
    } elseif ( is_day() ) {
      echo 'Daily Archives: ' . get_the_date();
    } elseif ( is_month() ) {
      echo 'Monthly Archives: ' . get_the_date('F Y');
    } elseif ( is_year() ) {
      echo 'Yearly Archives: ' . get_the_date('Y');
    } else {
      echo 'Archives:';
    }

  ?></h2>

  <?php
  while (have_posts()) : the_post(); ?>

  <article class="post">
    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

    <p class="post-info">
      <!-- google php date strings for how you want to format the time/date -->
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

    <!-- if you change the_post() to the_excerpt() it will only show the first paragraph or the excerpt of the post and when you click the post it will then show the entire post, which makes for cleaner archiving. -->
    <?php the_post(); ?>
  </article>

<?php endwhile;

  else :
    echo '<p>No content found</p>';

  endif;

get_footer();

?>
