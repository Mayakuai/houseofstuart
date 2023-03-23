<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>

<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
<link rel="profile" href="http://gmpg.org/xfn/11">

<link rel="shortcut icon" href="/favicon.ico">
<link rel="icon" href="/favicon.png">
<link rel="apple-touch-icon" href="/apple-touch-icon.png">
<meta name="msapplication-TileColor" content="#FFFFFF">
<meta name="msapplication-TileImage" content="/favicon-144x144.png">
    <script src="https://use.typekit.net/ukr8lbp.js"></script>


    <meta property="og:url"           content="https://charleswhanson.com/" />
    <meta property="og:locale" 		  content="en_US" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="House of Stuart-Saporta" />
    <meta property="og:description"   content="The House of Stuart-Saporta Family Website" />
    <meta property="og:image"         content="../assets/images/social.png" />
    <meta property="og:site_name" content="The House of Stuart-Saporta Family Website" />

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<?php
	global $post;
	$slug=$post->post_name;
  $user = wp_get_current_user();
?>
<div id="page" class="site">

	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'mythril' ); ?></a>

	<header id="header" class="clearfix">
      <?php if(is_home() || is_front_page()): ?>
        	<!-- <div class="container">
		<div class="row">
			<div class="col-12 text-left">
				<a id="logo" href="/"><img src="<#?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/logo.png" alt="<#?php bloginfo( 'name' ); ?>" /></a>
			</div>
		</div>
</div> -->
  <?php else : ?>



		<!-- <div class="row">
			<div class="col-12 text-left"> -->
				<nav id="navigation" class="main-navigation" role="navigation">
					<!-- <#?php
						wp_nav_menu([
							'theme_location' => 'main',
							'menu_id'        => 'main-menu',
							'menu_class'     => 'sf-menu',
							//'walker' 		 => new Dropdown_Walker_Nav_Menu()
						]);
					?> -->
          <ul style="background: white;">
            <li><a href="/">Home</a></li>
            <li><a href="/lurae">Lurae</a></li>
            <li><a href="/harry">Harry</a></li>
            <li><a href="/joshua">Joshua</a></li>
            <li><a href="/farishta">Farishta</a></li>
            <li><a href="/charlie">Charlie</a></li>
            <li><a href="/ammery">Ammery</a></li>
            <li><a href="/matt">Matt</a></li>
            <li><a href="/ashley">Ashley</a></li>
            <li><a href="/ben">Ben</a></li>
            <li><a href="/kayt">Kayt</a></li>
            <li><a href="/carla">Carla</a></li>
            <li><a href="/cliff">Cliff</a></li>
            <li><a href="/maia">Maia</a></li>
            <li><a href="/nico">Nico</a></li>
            <li><a href="/elise">Elise</a></li>
            <li><a href="/ty">Ty</a></li>
            <li><a href="/silas">Silas</a></li>
          </ul>
				</nav>




				<!-- <button id="mobile-menu-button" class="menu-toggle" aria-controls="main-menu" aria-label="Toggle Menu" aria-expanded="false">
					<span></span>
					<span></span>
					<span></span>
					<span></span>
					<span></span>
					<span></span>
					<strong class="text">Menu</strong>
				</button> -->
			<!-- </div>
		</div> -->
		<!-- </div> -->
    <?php endif; ?>
	</header>

	<main id="content" class="site-content">
<style media="screen">
  .media-router .media-menu-item{
    color: #646464;
  }
</style>
