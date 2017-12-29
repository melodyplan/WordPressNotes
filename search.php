<!-- Wordpress will look for search.php for the outputs of search results
if you don't have a search.php it will automaticall use index.php to output
the search results -->
<?php

get_header();

if (have_posts()) : ?>

  <!-- the_search_query() will output what the user searched for -->
  <h2>Search results for: <?php the_search_query();  ?></h2>

  <?php
  while (have_posts()) : the_post(); ?>

  <article class="post <?php if (has_post_thumbnail() ) { ?>has-thumbnail <?php } ?> clearfix">

    <!-- post-thumbnail -->
    <div class="post-thumbnail clearfix">
      <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('small-thumbnail'); ?></a>
    </div>

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

    <!-- &raquo means right facing arrow
    <?php the_content('Continue reading &raquo;'); ?> -->

    <!-- if you don't want to manually insert a read more, use a the_excerpt
    The code below checks if you are on the post page and display the_content instead of the_excerpt
    single.php file handle individual posts .-->

    <?php the_excerpt(); ?>


  </article>

<?php endwhile;

  else :
    echo '<p>No content found</p>';

  endif;

get_footer();

?>
