<!-- Wordpress will look for search.php for the outputs of search results
if you don't have a search.php it will automaticall use index.php to output
the search results -->
<?php

get_header();

if (have_posts()) : ?>

  <!-- the_search_query() will output what the user searched for -->
  <h2>Search results for: <?php the_search_query();  ?></h2>

  <?php
  while (have_posts()) : the_post();

  get_template_part('content', get_post_format());

  endwhile;

  echo paginate_links();

  else :
    echo '<p>No content found</p>';

  endif;

get_footer();

?>
