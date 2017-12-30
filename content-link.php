<article class="post post-link">

  <!-- by using echo get_the_content() instead of the_content() we will get the URL
  pasted in and WordPress will not try to format the text by adding paragraph
  code or something -->
  <a href="<?php echo get_the_content() ?>"><?php the_title(); ?></a>

</article>
