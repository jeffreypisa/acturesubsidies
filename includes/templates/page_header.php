<?php
	$header_image = get_field('header_image');
	$header_title = get_field('header_title');
	$header_text = get_field('header_text');
?>
<div id="page_header"<?php if($header_image) { echo ' style="background-image: url('.$header_image.');"'; } ?>>
	<div class="container">
		<?php if($header_title) { echo '<h1 class="title" itemprop="headline">'.$header_title.'</h1>'; } else { the_title('<h1 class="title" itemprop="headline">', '</h1>'); } ?>
		<?php if($header_text) { echo '<h2 class="text">'.$header_text.'</h2>'; } ?>
		<?php if(is_singular('post')) { ?>
		<div class="single_post_meta"><?php the_time('d F Y'); ?>&nbsp;&nbsp;|&nbsp;&nbsp;<i class="fa fa-clock-o"></i> <?php the_time('H:i'); ?></div>
		<?php } ?>
	</div>
	<div id="page_header_overlay"></div>
</div>