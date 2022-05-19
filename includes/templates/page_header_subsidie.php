<?php
	$header_image = get_field('header_image');
	$header_title = get_field('header_title');
	$header_text = get_field('header_text');
?>
<div id="page_header"<?php if($header_image) { echo ' style="background-image: url('.$header_image.');"'; } ?> class="subsidie">
	<div class="container">
		<?php if($header_title) { echo '<h1 class="title" itemprop="headline">'.$header_title.'</h1>'; } else { the_title('<h1 class="title" itemprop="headline">', ' subsidie</h1>'); } ?>
		<h2 class="text">Kerncijfers &amp; info</h2>
	</div>
	<div id="page_header_overlay"></div>
</div>