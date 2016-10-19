<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6 oldie"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7 oldie"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8 oldie"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9> <![endif]-->
<!--[if !IE]><!--> <html <?php language_attributes(); ?> class="no-js">  	<!--<![endif]-->
<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php if (is_search()) { ?>
	   <meta name="robots" content="noindex, nofollow" />
	<?php } ?>

	<?php
	$GLOBALS[ 'homepage' ] = is_front_page();
	$GLOBALS[ 'temp_uri' ] = get_template_directory_uri();
	?>

	<title>
		   <?php
		      if (function_exists('is_tag') && is_tag()) {
		         single_tag_title("Tag Archive for &quot;"); echo '&quot; - '; }
		      elseif (is_archive()) {
		         wp_title(''); echo ' Archive - '; }
		      elseif (is_search()) {
		         echo 'Search for &quot;'.wp_specialchars($s).'&quot; - '; }
		      elseif (!(is_404()) && (is_single()) || (is_page())) {
		         wp_title(''); echo ' - '; }
		      elseif (is_404()) {
		         echo 'Not Found - '; }
		      if (is_home()) {
		         bloginfo('name'); echo ' - '; bloginfo('description'); }
		      else {
		          bloginfo('name'); }
		      if ($paged>1) {
		         echo ' - page '. $paged; }
		   ?>
	</title>

	<script src="<?php echo $GLOBALS[ 'temp_uri' ]; ?>/js/modernizr.custom.02.03.15.js" type='text/javascript'></script>
	<script src="<?php echo $GLOBALS[ 'temp_uri' ]; ?>/js/jquery-1.11.2.min.js" type='text/javascript'></script>

	<link rel="shortcut icon" href="/favicon.ico">

	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

	<?php if ( is_singular() ) wp_enqueue_script('comment-reply'); ?>

	<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

	<!-- Web Fonts -->
	<link href='http://fonts.googleapis.com/css?family=Cabin:400,500,600,700,400italic,500italic,600italic,700italic' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Cabin+Condensed:400,500,600,700' rel='stylesheet' type='text/css'>
	<?php wp_head(); ?>
    <style>
        @media only screen and (min-width: 320px){
            header .navbar {
                margin: 55px 0 15px 0;
            }
            .desktop-only,
            .owl-buttons {
                display: none;
            }
            header .mobile-only .navbar-brand,
            .mobile-menu-btn {
                float: none;
                width: 100%;
                display: block;
                height: auto;
            }
            header .mobile-only .navbar-brand img,
            .mobile-menu-btn button {
                margin: 0 auto;
                padding-left: 0;
                display: block;
            }
            .mobile-menu-btn button {
                width: 80%;
                background-color: #ffffff;
            }

            .copyright p {
                text-align: center;
            }

        }
        @media only screen and (min-width: 320px) and (max-width: 991px) {
            footer .footer-flag {
                width: 133%;
                margin-left: auto;
                margin-right: auto;
            }
            footer .footer-flag img {
                max-height: 150px;
            }
            footer .footer-content {
                margin: 0;
            }
            #wrapper .thumbnail {
                float: none;
            }
            #wrapper .thumbnail img {
                margin: 0 auto;
            }
            #licensedareas .states p {
                font-size: 1.2em;
            }
            #association_wrapper #owlCarousel .background_carousel {
                height: 133px;
            }
            #association_wrapper #owl-association {
                width: 95%;
                margin: -113px 0 50px 33px;
            }
            #association_wrapper .customNavigation .left, #association_wrapper .customNavigation .right {
                margin-top: -124px;
                font-size: 1.2em;
            }
        }
        @media only screen and (min-width: 768px) {
            header .mobile-only {
                display: none !important;
            }

            .desktop-only,
            .owl-buttons {
                display: block;
            }

            header .navbar {
                margin: 60px 0 60px 25px;
            }
            .copyright p {
                text-align: left;
            }

        }
        @media only screen and (min-width: 992px) {
            footer .footer-flag {
                width: 84%;
                margin-left: auto;
                margin-right: auto;
            }
            footer .footer-flag img {
                width: 100%;
            }
            footer .footer-widget {
                padding: 20px 0 0 10px;
            }
            footer .footer-content {
                margin: -260px 0 0 20px;
                position: relative;
            }
        }
    </style>
</head>

<?php $body_id = ($GLOBALS[ 'homepage' ]) ? 'homePage' : 'contentPage'; ?>
<body id="<?php echo $body_id; ?>" <?php body_class(); ?>>

	<header>
		<nav class="navbar">
            <div class="container">
                <div class="mobile-only">
                    <a class="navbar-brand" href="/">
                        <img src="<?php get_site_url(); ?>/wp-content/themes/Pinnacle Construction/images/logo.png" alt="<?php get_site_url(); ?>">
                    </a>
                </div>
                <div class="mobile-menu-btn mobile-only">
                    <button type="button" class="collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        Menu
                    </button>
                </div>
                <div class="navbar-header desktop-only">
    <!--				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">-->
    <!--					<span class="sr-only">Toggle navigation</span>-->
    <!--			        <span class="icon-bar"></span>-->
    <!--			        <span class="icon-bar"></span>-->
    <!--			        <span class="icon-bar"></span>-->
    <!--			    </button>-->
                    <a class="navbar-brand" href="/">
                        <img src="<?php get_site_url(); ?>/wp-content/themes/Pinnacle Construction/images/logo.png" alt="<?php get_site_url(); ?>">
                    </a>
                </div>
                   <?php
                            wp_nav_menu( array(
                                'menu'              => 'primary',
                                'theme_location'    => 'primary',
                                'depth'             => 2,
                                'container'         => 'div',
                                'container_class'   => 'collapse navbar-collapse',
                                'container_id'      => 'bs-example-navbar-collapse-1',
                                'menu_class'        => 'nav navbar-nav',
                                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                                'walker'            => new wp_bootstrap_navwalker())
                            );
                        ?>
		</div>
	</nav>
</header>

	<!-- <section
	<?php
	/*
	* Example of the dynamic html element based on if the page is the homepage.
	*
	echo ($GLOBALS[ 'homepage' ]) ? 'id="banner" class="relative hidden-xs"' : 'id="contentWrapper" class="container-fluid white-ebebeb-bg"';
	*/
	?>
	> -->
