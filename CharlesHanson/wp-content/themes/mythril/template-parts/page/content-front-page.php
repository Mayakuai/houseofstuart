<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Mythril
 * @subpackage Mythril
 * @since 1.0
 * @version 1.0
 */

?>
<style media="screen">
		#home{

		}
		#home .row{
			flex-wrap: nowrap;
		}
		#home .row a{
			height: 100px;
			background: #085285;
			margin: 10px;
			color:white;
			padding: 35px 0;
			text-align: center;
			font-size: 1.5em;
			font-weight: 200;
	    letter-spacing: 1px;
			-webkit-transition: all 0.3s ease-out;
			-moz-transition: all 0.3s ease-out;
			-o-transition: all 0.3s ease-out;
			transition: all 0.3s ease-out;
		}
		#home .row a:hover{
		 background: #4585b1;
		}

</style>

<?php $current_user = wp_get_current_user();
	if ( is_user_logged_in() ) { ?>


<article id="home" <?php post_class(); ?>>
	<div class="container">
		<?php the_content(); ?>
		<div class="row">
			<a class="col-6" href="/lurae">Lurae</a>
			<a class="col-6" href="/harry">Harry</a>
		</div>
		<div class="row">
			<a class="col-6" href="/joshua">Joshua</a>
			<a class="col-6" href="/farishta">Farishta</a>
		</div>
		<div class="row">
			<a class="col-6" href="/ammery">Ammery</a>
			<a class="col-6" href="/matt">Matt</a>
		</div>
		<div class="row">
			<a class="col-6" href="/ashley">Ashley</a>
			<a class="col-6" href="/ben">Ben</a>
		</div>
		<div class="row">
			<a class="col-6" href="/kayt">Kayt</a>
			<a class="col-6" href="/silas">Silas</a>
		</div>
		<div class="row">
			<a class="col-6" href="/carla">Carla</a>
			<a class="col-6" href="/cliff">Cliff</a>
		</div>
		<div class="row">
			<a class="col-6" href="/elise">Elise</a>
			<a class="col-6" href="/ty">Ty</a>
		</div>
		<div class="row">
			<a class="col-6" href="/maia">Maia</a>
			<a class="col-6" href="/nico">Nico</a>
		</div>
		<div class="row">
			<a class="col-6" href="/charlie">Charlie</a>
			<!-- <a class="col-6" href="/nico">Nico</a> -->
		</div>
	</div>

</article>
<?php

} else { ?>
	<h1 class="center">Please <a href="/login">LOGIN</a> to view site :)</h1>
	<?php
} ?>
