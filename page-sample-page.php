<?php

get_header();

if (have_posts()) :
  while (have_posts()) : the_post(); ?>

<!-- divs are messing up, check on this later / footer is ignoring divs-->
<article class="post page">

  <div class="column-container clearfix">
    <div class="title-column">
      <h2><?php the_title(); ?></h2>
    </div>
    <div class="text-column">
      <?php the_content(); ?>
    </div>
  </div>

</article>

  <!-- <article class="post page">
    <h2><?php the_title(); ?></a></h2>
    <?php the_content(); ?>
  </article> -->


<?php endwhile;

  else :
    echo '<p>No content found</p>';

  endif;

get_footer();

?>
