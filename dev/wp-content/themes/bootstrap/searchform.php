<?php
/*
Template Name: Custom Search Form
*/
?>
<?php get_search_form(); ?>

<form role="search" method="get" id="searchform" action="http://www.test.dev/">
<div>
<label for="s">Search for:</label>
<input type="text" value="" name="s" id="s" />
<input type="hidden" value="1" name="sentence" />
<input type="submit" id="searchsubmit" value="Search" />
</div>
</form>