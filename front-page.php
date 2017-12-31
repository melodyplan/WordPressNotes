<!-- Controls Home page -->
<?php

get_header(); ?>

  <!-- site-content -->
  <div class="site-content clearfix">

    <h3>Custom HTML here!</h3>

      <?php if (have_posts()) :
        while (have_posts()) : the_post();

          the_content();

        endwhile;

        else :
          echo '<p>No content found</p>';

        endif;

        ?>

        <!-- home-columns -->
        <div class="home-columns clearfix">

          <!-- one-half -->
          <div class="one-half">
            <?php
            // opinion posts loop begins here
            $opinionPosts = new WP_Query('cat=4&posts_per_page=2');

            if ($opinionPosts -> have_posts()) :

              while ($opinionPosts -> have_posts()) : $opinionPosts->the_post(); ?>
                 <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                 <?php the_excerpt(); ?>
              <?php endwhile;

              else:

            endif;
            /*prevents custom WP_Query routes from disrupting the main natural
            URL-based loops that WordPress runs on its own. So the function below is
            basically saying "okay WordPress we've done the custom loop, we're
            reliquishing control back to you"*/
            wp_reset_postdata();
            ?>
          </div>
          <!-- /one-half -->

          <!-- one-half -->
          <div class="one-half last">
            <?php
            // news posts loop begins here
            $informationalPosts = new WP_Query('cat=5&posts_per_page=2');

            if ($informationalPosts -> have_posts()) :

              while ($informationalPosts -> have_posts()) : $informationalPosts->the_post(); ?>
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <?php the_excerpt(); ?>
              <?php endwhile;

              else:

            endif;
            wp_reset_postdata();
            ?>
          </div>
          <!-- /one-half -->

        </div>
        <!-- /home-columns -->

  </div><!-- /site-content -->

<?php get_footer();

?>
