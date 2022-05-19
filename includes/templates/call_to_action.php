<?php
$cta = get_field('cta');

$cta_class = get_field('cta_class');
$cta_layout = get_field('cta_layout');
$cta_align = get_field('cta_align');
$cta_height = get_field('cta_height');
$cta_bg = get_field('cta_bg');
$cta_heading = get_field('cta_heading');
$cta_text = get_field('cta_text');
$cta_btn_text = get_field('cta_btn_text');
$cta_btn_link_to = get_field('cta_btn_link_to');
$cta_btn_link_to_page = get_field('cta_btn_link_to_page');
$cta_btn_link_to_post = get_field('cta_btn_link_to_post');
$cta_btn_link_to_url = get_field('cta_btn_link_to_url');

$cta_a = get_field('cta_a');

$cta_class_a = get_field('cta_class_a');
$cta_layout_a = get_field('cta_layout_a');
$cta_align_a = get_field('cta_align_a');
$cta_height_a = get_field('cta_height_a');
$cta_bg_a = get_field('cta_bg_a');
$cta_heading_a = get_field('cta_heading_a');
$cta_text_a = get_field('cta_text_a');
$cta_btn_text_a = get_field('cta_btn_text_a');
$cta_btn_link_to_a = get_field('cta_btn_link_to_a');
$cta_btn_link_to_page_a = get_field('cta_btn_link_to_page_a');
$cta_btn_link_to_post_a = get_field('cta_btn_link_to_post_a');
$cta_btn_link_to_url_a = get_field('cta_btn_link_to_url_a');


if(isset($_COOKIE['keuze']) && $_COOKIE['keuze'] == 'ondernemers') { ?>

<?php if($cta) { ?>

<div id="call_to_action" class="<?php echo $cta_layout; if($cta_align) { echo ' align_center'; } if($cta_class) { echo ' '. $cta_class; } ?>"<?php if($cta_bg || $cta_height) { ?> style="background-image: url(<?php echo $cta_bg; ?>); min-height: <?php echo $cta_height; ?>px;"<?php } ?>>
	<div class="container">
		<h2><?php echo $cta_heading; ?></h2>
		<?php echo $cta_text; ?>
		<?php if($cta_btn_text) { ?><a href="<?php if($cta_btn_link_to == 'page') { echo get_permalink($cta_btn_link_to_page); } elseif($cta_btn_link_to == 'post') { echo get_permalink($cta_btn_link_to_post); } elseif($cta_btn_link_to == 'url') { echo $cta_btn_link_to_url; } ?>" class="button" <?php if($cta_btn_link_to == 'url') { echo 'target="_blank"'; } ?>><?php echo $cta_btn_text; ?></a><?php } ?>
	</div>
	<div class="overlay"></div>
</div>

<?php } } else {

if($cta_a) { ?>

<div id="call_to_action" class="<?php echo $cta_layout_a; if($cta_align_a) { echo ' align_center'; } if($cta_class_a) { echo ' '. $cta_class_a; } ?>"<?php if($cta_bg_a || $cta_height_a) { ?> style="background-image: url(<?php echo $cta_bg_a; ?>); min-height: <?php echo $cta_height_a; ?>px;"<?php } ?>>
	<div class="container">
		<h2><?php echo $cta_heading_a; ?></h2>
		<?php echo $cta_text_a; ?>
		<?php if($cta_btn_text_a) { ?><a href="<?php if($cta_btn_link_to_a == 'page') { echo get_permalink($cta_btn_link_to_page_a); } elseif($cta_btn_link_to_a == 'post') { echo get_permalink($cta_btn_link_to_post_a); } elseif($cta_btn_link_to_a == 'url') { echo $cta_btn_link_to_url_a; } ?>" class="button" <?php if($cta_btn_link_to_a == 'url') { echo 'target="_blank"'; } ?>><?php echo $cta_btn_text_a; ?></a><?php } ?>
	</div>
	<div class="overlay"></div>
</div>

<?php } } ?>