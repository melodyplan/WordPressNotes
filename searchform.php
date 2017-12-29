<!-- if we do not have this file, wordpress will just use it's default get_search_form() function with no html styling -->

<!-- deflault get_word_search() code -->
<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
    <div>
      <label class="screen-reader-text" for="s">Search for:</label>
      <input type="text" name="s" value="" id="s" placeholder="<?php the_search_query(); ?>"/>
      <input type="submit" id="searchsubmit" value="Search" />
    </div>
</form>
<!-- /default get_word_search() code -->
