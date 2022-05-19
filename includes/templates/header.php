<header id="header" class="header" role="banner" itemscope="itemscope" itemtype="http://schema.org/WPHeader">

	<div class="container">
		<a id="logo" href="<?php bloginfo('url'); ?>">
			<img src="<?php bloginfo('template_directory'); ?>/assets/img/logo.png" alt="<?php bloginfo('name'); ?>">
		</a>

		<nav id="header_navigation" class="header_navigation" role="navigation" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
		   <ul>
		      <li<?php if(isset($_COOKIE['keuze']) && $_COOKIE['keuze'] == 'ondernemers') { echo ' class="current-menu-item"'; } ?>><a id="ondernemers" href="<?php echo esc_url( home_url( '/' ) ); ?>">Voor ondernemers</a></li>
		      <li<?php if(isset($_COOKIE['keuze']) && $_COOKIE['keuze'] == 'adviseurs') { echo ' class="current-menu-item"'; } ?>><a id="adviseurs" href="<?php echo esc_url( home_url( '/' ) ); ?>adviseurs">Voor adviseurs</a></li>
		   </ul>
		</nav>

		<span id="navigation_toggle"><i class="fa fa-navicon"></i><span>Menu</span></span>

		<a class="button subsidiescan" href="<?php if(isset($_COOKIE['keuze']) && $_COOKIE['keuze'] == 'ondernemers') { the_field('demo_ondernemers','option'); } elseif(isset($_COOKIE['keuze']) && $_COOKIE['keuze'] == 'adviseurs') { the_field('demo_adviseurs','option'); } ?>"><?php if(isset($_COOKIE['keuze']) && $_COOKIE['keuze'] == 'ondernemers') { the_field('demo_ondernemers_text','option'); } elseif(isset($_COOKIE['keuze']) && $_COOKIE['keuze'] == 'adviseurs') { the_field('demo_adviseurs_text','option'); } ?></a>

		<span id="search_toggle"><i class="fa fa-search"></i></span>

	</div>

	<?php get_search_form(); ?>

	<div id="megamenu">

		<div class="container">
			<div class="row">
				<?php if(isset($_COOKIE['keuze']) && $_COOKIE['keuze'] == 'ondernemers' && is_active_sidebar( 'header_ondernemers' )) { dynamic_sidebar( 'header_ondernemers' ); } ?>
				<?php if(isset($_COOKIE['keuze']) && $_COOKIE['keuze'] == 'adviseurs' && is_active_sidebar( 'header_adviseurs' )) { dynamic_sidebar( 'header_adviseurs' ); } ?>
			</div>
		</div>

	</div>

</header>
<!-- /#header -->