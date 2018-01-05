<?php

get_header(); ?>

  <!-- site-content -->
  <div class="site-content clearfix">
    <!-- main-column -->
    <div class="main-column">
      <?php if (have_posts()) :
        while (have_posts()) : the_post();

        /* first parameter is required (the slug), the second parameter
        isn't required but allows you to specify a more particular name
        for example, ('content', 'home') Wordpress will now look for a
        file called content-home. */
        /* The second paramater here references it to get the post-formats
        specified in the functions.php file under post format support.
        in this case since only aside, gallery and link were specified,
        depending on if there is an aside, gallery and/or link that the code
        runs into, get_template_part() will be looking for content-aside.php
        or content-gallery, etc. because aside, gallery, etc. is the parameter
        being dynamically passed through =D */
        get_template_part('content', get_post_format());

      endwhile;

      /* Various ways to go forward and back for posts */
      // previous_posts_link();
      // next_posts_link();
      echo paginate_links();

        else :
          echo '<p>No content found</p>';

        endif; ?>
    </div>
    <!-- /main-column -->

    <!-- secondary-column is in sidebar.php -->
    <?php get_sidebar(); ?>

  </div>
  <!-- /site-content -->

<?php get_footer();

?>
