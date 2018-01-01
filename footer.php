  <footer class="site-footer">

    <?php if (get_theme_mod('lwp-footer-callout-display') == 'Yes') { ?>
      <div class="footer-callout clearfix">
        <div class="footer-callout-image">
          <img src="<?php echo wp_get_attachment_url(get_theme_mod('lwp-footer-callout-image')) ?>">
        </div>

        <div class="footer-callout-text">
          <h2><a href="<?php echo get_permalink(get_theme_mod('lwp-footer-callout-link')) ?>"><?php echo get_theme_mod('lwp-footer-callout-headline') ?></a></h2>
          <!-- wpautop wraps a built in WordPress function and parses plain text
          and return it as html that uses paragraph tags. -->
          <?php echo wpautop(get_theme_mod('lwp-footer-callout-text')) ?>
        </div>
      </div>
    <?php } ?>


    <!-- footer-widgets -->
    <div class="footer-widgets clearfix">

      <!-- Conditional statement saying only if there is an active sidebar do we
      output the code within the conditional. so for example, if there is no
      widget in footer2, it won't run that sidebar so there is no additional and
      unnecessary mark up -->
      <?php if (is_active_sidebar('footer1')) : ?>
        <div class="footer-widget-area footer-one">
          <!-- pulling from functions.php -->
          <?php dynamic_sidebar('footer1') ?>
        </div>
      <?php endif; ?>

      <?php if (is_active_sidebar('footer2')) : ?>
        <div class="footer-widget-area">
          <?php dynamic_sidebar('footer2') ?>
        </div>
      <?php endif; ?>

      <?php if (is_active_sidebar('footer3')) : ?>
        <div class="footer-widget-area">
          <?php dynamic_sidebar('footer3') ?>
        </div>
      <?php endif; ?>

      <?php if (is_active_sidebar('footer4')) : ?>
        <div class="footer-widget-area">
          <?php dynamic_sidebar('footer4') ?>
        </div>
      <?php endif; ?>

    </div>
    <!-- /footer-widgets -->

    <nav class="site-nav">

      <?php

        $args = array(
          'theme_location' => 'footer'
        );

      ?>

      <?php wp_nav_menu(); ?>

    </nav>

    <p><?php bloginfo('name'); ?> - &copy; <?php echo date('Y'); ?></p>

  </footer>

</div><!-- container -->

<?php wp_footer(); ?>
</body>
</html>
