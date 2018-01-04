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

get_template_part('content', get_post_format());?>

<div class="about-author clearfix">
  <div class="about-author-image">
    <?php echo get_avatar(get_the_author_meta('ID'), 512) ?>
    <p><?php echo get_the_author_meta('nickname') ?></p>
  </div>

  <?php $otherAuthorPosts = new WP_Query(array(
    'author' => get_the_author_meta('ID'),
    'posts_per_page' => 3,
    // excludes certain posts ID from the results of this search query
    'posts__not_in' => array(get_the_ID())
  )); ?>

  <div class="about-author-text">
    <h3>About the Author</h3>
    <?php echo wpautop(get_the_author_meta('description')) ?>

    <?php if ($otherAuthorPosts->have_posts()) { ?>
    <div class="other-posts-by">
      <h4>Other posts by <?php echo get_the_author_meta('nickname') ?></h4>
      <ul>
        <?php while ($otherAuthorPosts->have_posts()) {
          $otherAuthorPosts->the_post(); ?>
        <li><a href="<?php the_permalink() ?>"><?php the_title() ?></a></li>
        <?php } ?>
      </ul>

    </div>
    <?php } wp_reset_postdata ?>

    <?php if (count_user_posts(get_the_author_meta('ID')) > 3) { ?>
    <a class="btn-a" href="<?php echo get_author_posts_url(get_the_author_meta('ID')) ?>">
      View all posts by <?php echo get_the_author_meta('nickname') ?>
    </a>
    <?php } ?>

  </div>
</div>

</div>

<?php endwhile;

  else :
    echo '<p>No content found</p>';

  endif;

get_footer();

?>
