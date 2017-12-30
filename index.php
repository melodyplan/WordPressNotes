<?php

get_header();

if (have_posts()) :
  while (have_posts()) : the_post();

  /* first parameter is required (the slug), the second parameter
  isn't required but allows you to specify a more particular name
  for example, ('content', 'home') Wordpress will now look for a
  file called content-home. */
  get_template_part('content');

endwhile;

  else :
    echo '<p>No content found</p>';

  endif;

get_footer();

?>
