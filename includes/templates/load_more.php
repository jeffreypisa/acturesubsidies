<div id="paging">
	<?php $next_link = get_next_posts_link(); if($next_link) { ?>
	<span class="hidden_paging"><?php next_posts_link(); ?></span>
	<?php } ?>
</div>