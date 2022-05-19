<form role="search" method="get" id="searchform" class="searchform" action="<?php echo home_url( '/' ); ?>">
<!-- <button type="submit" id="searchbutton" class="searchbutton" id="searchsubmit"><i class="icon-search"></i></button> -->
	<input type="search" id="searchfield" class="searchfield" id="s" name="s" value="<?php if (is_search()) { echo get_search_query(); } ?>" placeholder="Vul uw zoekterm in en druk op enter..." />
</form>