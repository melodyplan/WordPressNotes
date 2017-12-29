<?php

/*
Template Name: Special Layout
*/

get_header();

if (have_posts()) :
  while (have_posts()) : the_post(); ?>

  <article class="post page">
    <h2><?php the_title(); ?></a></h2>

    <!-- info box -->
    <div class="info-box">
      <h4>Disclaimer Title</h4>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed turpis
        odio, consectetur et ante nec, accumsan condimentum turpis. In hac
        habitasse platea dictumst. Pr</p>
    </div>
    <!-- /info box -->

    <?php the_content(); ?>
  </article>

<?php endwhile;

  else :
    echo '<p>No content found</p>';

  endif;

get_footer();

?>
