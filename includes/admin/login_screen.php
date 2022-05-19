<?php function login_styling() {

echo '<style type="text/css">

@font-face {
	font-family: "DINPro";
	src: url("'.esc_url( get_template_directory_uri() ).'/includes/admin/color_scheme/dinpro/DINPro.eot?#iefix") format("embedded-opentype"),  url("'.esc_url( get_template_directory_uri() ).'/includes/admin/color_scheme/dinpro/DINPro.otf")  format("opentype"),
	url("'.esc_url( get_template_directory_uri() ).'/includes/admin/color_scheme/dinpro/DINPro.woff") format("woff"), url("'.esc_url( get_template_directory_uri() ).'/includes/admin/color_scheme/dinpro/DINPro.ttf")  format("truetype"), url("'.esc_url( get_template_directory_uri() ).'/includes/admin/color_scheme/dinpro/DINPro.svg#DINPro") format("svg");
	font-weight: 300;
	font-style: normal;
}

@font-face {
	font-family: "DINPro";
	src: url("'.esc_url( get_template_directory_uri() ).'/includes/admin/color_scheme/dinpro/DINPro-Medium.eot?#iefix") format("embedded-opentype"),  url("'.esc_url( get_template_directory_uri() ).'/includes/admin/color_scheme/dinpro/DINPro-Medium.otf")  format("opentype"),
	url("'.esc_url( get_template_directory_uri() ).'/includes/admin/color_scheme/dinpro/DINPro-Medium.woff") format("woff"), url("'.esc_url( get_template_directory_uri() ).'/includes/admin/color_scheme/dinpro/DINPro-Medium.ttf")  format("truetype"), url("'.esc_url( get_template_directory_uri() ).'/includes/admin/color_scheme/dinpro/DINPro-Medium.svg#DINPro-Medium") format("svg");
	font-weight: 500;
	font-style: normal;
}

@font-face {
	font-family: "DINPro";
	src: url("'.esc_url( get_template_directory_uri() ).'/includes/admin/color_scheme/dinpro/DINPro-Bold.eot?#iefix") format("embedded-opentype"),  url("'.esc_url( get_template_directory_uri() ).'/includes/admin/color_scheme/dinpro/DINPro-Bold.otf")  format("opentype"),
	url("'.esc_url( get_template_directory_uri() ).'/includes/admin/color_scheme/dinpro/DINPro-Bold.woff") format("woff"), url("'.esc_url( get_template_directory_uri() ).'/includes/admin/color_scheme/dinpro/DINPro-Bold.ttf")  format("truetype"), url("'.esc_url( get_template_directory_uri() ).'/includes/admin/color_scheme/dinpro/DINPro-Bold.svg#DINPro-Bold") format("svg");
	font-weight: 700;
	font-style: normal;
}

@font-face {
	font-family: "DINPro";
	src: url("'.esc_url( get_template_directory_uri() ).'/includes/admin/color_scheme/dinpro/DINPro-Black.eot?#iefix") format("embedded-opentype"),  url("'.esc_url( get_template_directory_uri() ).'/includes/admin/color_scheme/dinpro/DINPro-Black.otf")  format("opentype"),
	url("'.esc_url( get_template_directory_uri() ).'/includes/admin/color_scheme/dinpro/DINPro-Black.woff") format("woff"), url("'.esc_url( get_template_directory_uri() ).'/includes/admin/color_scheme/dinpro/DINPro-Black.ttf")  format("truetype"), url("'.esc_url( get_template_directory_uri() ).'/includes/admin/color_scheme/dinpro/DINPro-Black.svg#DINPro-Black") format("svg");
	font-weight: 900;
	font-style: normal;
}

body {
	background: url(http://www.webrandcreative.nl/_resources/maintenance/bg.jpg);
	-webkit-background-size: cover;
	-moz-background-size: cover;
	-o-background-size: cover;
	background-size: cover;
}

#login {
	padding: 15% 0 0 0 !important;
}

.login #login_error, .login .message {
	border-color: #eb0655 !important;
}

a {
	color: #999 !important;
	-webkit-transition: all 0.2s ease 0s;
	-moz-transition: all 0.2s ease 0s;
	-o-transition: all 0.2s ease 0s;
	transition: all 0.2s ease 0s;
}

a:hover,
a:active,
a:focus {
	color: #eb0655 !important;
	box-shadow: none !important;
}

.login label {
	font-family: "DINPro";
	color: #444;
}

.wp-core-ui .button-primary {
	width: 100%;
	height: 39px !important;
	margin: 16px 0 0 0;
	background: #eb0655;
	border-color: #eb0655;
	border-width: 2px;
	color: #fff;
	-webkit-box-shadow: none !important;
	box-shadow: none !important;
	font-family: "DINPro";
	text-shadow: none !important;
	font-size: 16px;
	-webkit-transition: all 0.2s ease 0s;
	-moz-transition: all 0.2s ease 0s;
	-o-transition: all 0.2s ease 0s;
	transition: all 0.2s ease 0s;
}

.wp-core-ui .button-primary:hover,
.wp-core-ui .button-primary:focus {
	background: #f47a47;
	border-color: #f47a47;
	-webkit-box-shadow: none !important;
	box-shadow: none;
	-webkit-transition: all 0.2s ease 0s;
	-moz-transition: all 0.2s ease 0s;
	-o-transition: all 0.2s ease 0s;
	transition: all 0.2s ease 0s;
}

.wp-core-ui .button-primary:focus {
	-webkit-box-shadow: none !important;
	box-shadow: none !important;
}

.wp-core-ui .button-primary:active {
	background: none;
	border-color: #eb0655;
	color: #eb0655;
	-webkit-box-shadow: none !important;
	box-shadow: none !important;
}

.wp-core-ui .button-primary[disabled],
.wp-core-ui .button-primary:disabled,
.wp-core-ui .button-primary.button-primary-disabled,
.wp-core-ui .button-primary.disabled {
	color: #ffa6c5 !important;
	background: none !important;
	border-color: #ffa6c5 !important;
	text-shadow: none !important;
}

/* Forms */
input[type=checkbox]:checked:before {
	color: #eb0655;
}

input[type=radio]:checked:before {
	background: #eb0655;
}

input[type=text],input[type=password] {
	font-weight: 300 !important;
}

input[type=text]:focus, input[type=search]:focus, input[type=radio]:focus, input[type=tel]:focus, input[type=time]:focus, input[type=url]:focus, input[type=week]:focus, input[type=password]:focus, input[type=checkbox]:focus, input[type=color]:focus, input[type=date]:focus, input[type=datetime]:focus, input[type=datetime-local]:focus, input[type=email]:focus, input[type=month]:focus, input[type=number]:focus, select:focus, textarea:focus {
	box-shadow: none !important;
	border-color: #eb0655 !important;
}

h1 a {
	height: 60px !important;
	width: 60px !important;
	background-image:url(http://www.webrandcreative.nl/wp-content/themes/wbrnd/img/logo.png) !important;
	background-size: 60px 60px !important;
}

.login form {
	padding: 30px !important;
	box-shadow: none !important;
	-webkit-box-shadow: none !important;
	border-radius: 6px !important;
}

.login #backtoblog {
	width: 55%;
	margin: 20px 0 !important;
	float: left;
	padding: 0 !important;
	font-size: 12px !important;
	font-family: "DINPro";
}

.login #nav {
	width: 45%;
	margin: 20px 0 !important;
	float: right;
	padding: 0 !important;
	font-size: 12px !important;
	text-align: right;
	font-family: "DINPro";
}

</style>';

} add_action('login_head', 'login_styling');

function login_logo_url() {
	return site_url();
} add_filter( 'login_headerurl', 'login_logo_url', 10, 4 );
?>