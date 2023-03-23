<?php
/* Template Name: User Profile */
get_header();
?>
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
	.edit_form{
		display: none;
	}
	.profilePage{
	  margin: 0 50px;
	}
	h3{
		/* color: #085285; */
		font-weight: 700;
	}
	.about{
		margin-bottom: 1em;
	}

	.lists p{
		text-align:	left;
	}
	tr{
		width: 100%;
		height: 150px;
	}
	table td{
    border: 1px black solid;
		vertical-align: middle;
	}
	table th{
		background: #085285;
		color: #fff;
		border: 1px black solid;
		vertical-align: middle;
	}
	.item{
		width: 40%;
	}
	.image{
		width: 20%;
		text-align: center;
	}
	.comment{
		width: 40%;
	}
</style>

<?php $current_user = wp_get_current_user();
	if ( is_user_logged_in() ) { ?>


<!-- <#?php post_class(); ?> -->
<article id="post-<?php the_ID(); ?>" class="profilePage">
	<div class="page_container">
		<?php the_title( '<h1 class="entry-title" style="margin: 1em 0;">', '</h1>' ); ?>
			<!-- <#?php the_content(); ?> -->
		<div class="row">

			<div class="col-12 col-lg-3 about">

				<?php
				$date_string = get_field('birthday');
				$date = DateTime::createFromFormat('Ymd', $date_string);
				 ?>
					<h3>About</h3>
						<p style="text-align:left; margin: 1em 0;" class="about_details">Full Name: <?php the_field('full_name'); ?></p>
						<p style="text-align:left; margin: 1em 0;" class="about_details">Birthday: <?php the_field('birthday'); ?></p>
						<p style="text-align:left; margin: 1em 0;" class="about_details">Shoe size: <?php the_field('shoe_size'); ?></p>
						<p style="text-align:left; margin: 1em 0;" class="about_details">Shirt size: <?php the_field('clothes_size'); ?></p>
						<!-- <p><#?php the_field('charity'); ?></p> -->


					<h3>Favorites</h3>
					<?php
					$favorite = get_field('favorites');
					if( $favorite ): ?>
					    <div id="hero">
								<div class="content">

				           <p style="text-align:left; margin: 1em 0;" class="about_details">Color:  <span class="color"> <?php echo $favorite['color']; ?> </span></p>
									<p style="text-align:left; margin: 1em 0;" class="about_details">Wine:	<?php echo $favorite['wine']; ?></p>
										<p style="text-align:left; margin: 1em 0;" class="about_details">Drink: <?php echo $favorite['adult_beverage']; ?></p>
										<p style="text-align:left; margin: 1em 0;" class="about_details"><?php echo $favorite['other_favs']; ?></p>


		        		</div>
		    			</div>
						<?php endif; ?>

			<?php if( have_rows('favorites') ): ?>
					<?php while( have_rows('favorites') ): the_row();

						// Get sub field values.
						$color = get_sub_field('color');
						$wine = get_sub_field('wine');
						$bevey = get_sub_field('adult_beverage');
						?>
						<!-- <div id="hero">
								<div class="content">
										<#?php the_sub_field('wine'); ?>
										<a href="<#?php echo esc_url( $link['url'] ); ?>"><#?php echo esc_attr( $link['title'] ); ?></a>
								</div>
						</div> -->
						<style type="text/css">
								.color {
										background-color: <?php the_sub_field('color'); ?>;
								}
						</style>
				<?php endwhile; ?>
		<?php endif; ?>




		<?php if( have_rows('charity') ): ?>
			<div class="content">
				<h3>Charities I Support</h3>
		    <?php while( have_rows('charity') ): the_row();

		        // Get sub field values.

		        $clink = get_sub_field('charity_link');
						$cname = get_sub_field('charity_name');

		        ?>



              <?php the_sub_field('caption'); ?>
              <a href="<?php echo esc_url( $clink ); ?>"><?php echo esc_attr( $cname ); ?></a></br>


						<style type="text/css">
								#hero {
										background-color: <?php the_sub_field('color'); ?>;
								}
						</style>
		    <?php endwhile; ?>
				 </div>
		<?php endif; ?>

		<?php
			$significant_others = get_field('significant_other');
				if( $significant_others ): ?>
					<h3 style="margin:0 0 0.5em 0;">Significant Other</h3>
					<?php foreach( $significant_others as $significant_other ):
							$permalink = get_permalink( $significant_other->ID );
							$title = get_the_title( $significant_other->ID );
							?>
								<a href="<?php echo esc_url( $permalink ); ?>"><?php echo esc_html( $title ); ?></a>
							</br>
						<?php endforeach; ?>
				<?php endif; ?>


				<?php if( have_rows('children') ):
					while( have_rows('children') ) : the_row();
						$child = get_sub_field('child');
						$children = get_sub_field('child');
							if( $children ): ?>

										<h3 style="margin:0.5em 0;">Kids</h3>
									<?php foreach( $children as $child ):
											$permalink = get_permalink( $child->ID );
											$title = get_the_title( $child->ID );
											// $custom_field = get_field( 'field_name', $featured_post->ID );
											?>

												<a style="text-align:left; margin: 1em 0;" href="<?php echo esc_url( $permalink ); ?>"><?php echo esc_html( $title ); ?></a>
											</br>

									<?php endforeach; ?>

									<?php endif; ?>
								<?php endwhile; ?>
							<?php endif; ?>



	</div>
	<div class="col-12 col-lg-9 lists">
		<div class="wishlists" style="margin-bottom: 2em;">


		<?php
			if( have_rows('wishlist_sites') ): ?>
			<h3>My Wishlists</h3>
			<ul>
		  <?php  while( have_rows('wishlist_sites') ) : the_row();
        $site = get_sub_field('site');
				$url = get_sub_field('url');
		   ?>
		<li style="margin:1em 0;">
			<a href="<?= $url ?>" target="_blank"><?= $site ?></a>
		</li>
		<?php
		    // End loop.
		    endwhile;
			// No value.
			else :
			    // Do something...
			endif;
		?>
		</ul>
</div>


<!-- <#?php if( $note ): ?> -->
	<div class="notes">
		<h3 style="margin:1em 0; text-align: left;">Notes</h3>
			<?php the_field('notes');  ?>
	</div>
<!-- <#?php endif; ?> -->


<?php
	if( have_rows('xmas_list') ): ?>

	<h3 style="margin-bottom: 1em;">All I want for Christmas</h3>
	<table>
		<thead>
			<tr style="height: 50px;">
				<th class="item">Item</th>
				<th	class="image">Image</th>
				<th	class="comment">Comment</th>
			</tr>
		</thead>
		<tbody>
	  <?php  while( have_rows('xmas_list') ) : the_row();
	    $item= get_sub_field('item');
			$link = get_sub_field('link');
			$image = get_sub_field('image');
			$comment = get_sub_field('comment');
	  ?>

				<tr class="<?= $item ?>">
					<td class="item">
						<?php if( $link ): ?>
							<a href="<?= $link ?>" target="_blank"><?= $item ?></a>
						<?php else: ?>
							<?= $item ?>
						<?php endif; ?>
					</td>
					<td class="image">
						<a href="<?= $link ?>" target="_blank">
							<img style="width:auto; height:150px;" src="<?php echo esc_url($image); ?>"  />
						</a>
					</td>
					<td class="comment"><?= $comment ?></td>
				</tr>


		    <?php
			    endwhile;
					// // No value.
					// else :
					//     // Do something...
					endif;
				?>
			</tbody>
		</table>
	</div>
</div>

<button type="button" class="show"><span>Edit Page</span></button>
	<div class="row">
		<?php acf_form_head(); ?>
		<div class="edit_form toggle">
			<?php acf_form(); ?>
		</div>
	</div>
</div>
</article>
    <?php
			} else { ?>
      	<h1 class="center">Please <a href="/login">LOGIN</a> to view site :)</h1>
  	<?php  }
get_footer();
