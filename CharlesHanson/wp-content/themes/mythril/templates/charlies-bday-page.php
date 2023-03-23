<?php
/* Template Name: Charles 100th Birthday */
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
<?php
$user = wp_get_current_user();
if ( in_array( 'editor', $user->roles ) || in_array( 'administrator', $user->roles ) ) {
		$edit_class = 'editable';
		$show_edit = true;
} else {
	$show_edit = false;
}
 ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="titleArea">
<?php the_content(); ?>
	</div>
	<section id="intro">
		<div class="container">
			<p><strong>Charles Hanson, a WWII veteran, is turning 100 years young April 12, 2020.</p></strong>
			<p>His birthday party has been canceled due to the COVID-19 pandemic. We want to show as much love to Charles on his birthday even though we can't be with him.</p> <p><strong>Please share a birthday message to Charles!</strong></p>

			<p>You can add a birthday message picture, video or text that will be shared with the birthday boy!</p>
			<p class="showForm button large" ><span>Send Your Birthday Message Here »</span></p>
			<!-- <p><a class="button large" href="/general"><span>Add Your Photo Here »</span></a></p>
			<p><a class="button large" href="/general"><span>Add Your Video Here »</span></a></p> -->
		</div>
	</section>

	<section id="formSection" class="toggleForm">
		<!-- <h1 class="sectionTitle">

		</h1> -->
			<div class="formBorder">
				<div class="supportForm">

						<form id="bdayMessageForm" action="#" method="POST" class="form-container" autocomplete="off" enctype="multipart/form-data">

							<div class="form-message"></div>
							<div class="form-content">

							<div class="form-group">
								<label class="form-label" for="name">Name</label>
								<input type="text" name="name" id="name" class="form-input required" />
							</div>

							<div class="form-group">
								<label class="form-label" for="email">Email</label>
								<input type="text" name="email" id="email" class="form-input required" /><input type="text" autocomplete="off" name="email_doublecheck" value="" class="email_doublecheck" tabindex="-1" />
							</div>

							<div class="form-group">
								<label class="form-label" for="relationship">Relationship</label>
								<input type="text" name="relationship" id="relationship" class="form-input" />
							</div>

							<div class="form-group">
								<label class="form-label" for="message">Message</label>
								<textarea  name="message" id="message" class="form-input"></textarea>
							</div>

							<div class="form-actions">

								<!-- <#?php
									$nonce = wp_create_nonce( 'mythrilSignup' );

									?><input type="hidden" name="birthday_signup_check" value="<#?=$nonce?>" /> -->
								<!-- <input type="hidden" name="nonce" value="<#?php $nonce = wp_create_nonce('mythrilSignup'); echo $nonce; ?>" /> -->
								<!-- <input type="hidden" name="page" value="<#?php echo $postSlug; ?>" /> -->



												<!-- <button type="submit" id="signup" class="submit"><span>Send your Message&nbsp;&raquo;</span></button>
												<p class="required">*Required Field</p> -->
							<!-- </div>

						</div>
 </div> -->





							 <?php
								$nonce = wp_create_nonce( 'mythrilSignup' );

                ?>
			                 <input type="hidden" id="suconfirm" name="suconfirm" value="" />
			                <input type="hidden" name="birthday_signup_check" value="<?=$nonce?>" />
		                	<button type="submit" id="signup" class="submit"><span>Send your Message</span></button>
		                	<!-- <p class="required">*Required Field</p> -->
											<div class="halfButtons">
												<!-- <a class="button" href="https://drive.google.com/drive/folders/142eN6iFObhmI7NEPdaiE4hhCAMT_HDUC?usp=sharing" target="_blank"><span>Add a Picture Message</span></a> -->
												<!-- <a class="button" href="https://drive.google.com/drive/folders/1WSpEeIAqmkLBaqr7udRGprJzzCXu3XQy?usp=sharing" target="_blank"><span>Add a Video Message</span></a> -->
<?php if (function_exists('user_submitted_posts')) user_submitted_posts(); ?>
											</div>
											</div>
						</form>

						<div id="ty-msg" class="center marg0">
						</div>


					</div>
				</div>
</div>
	</section>

	<section id="about">
		<div class="container">
				<!-- <img class="alignnone size-full wp-image-37" src="https://charleswhanson.com/wp-content/uploads/2020/04/image1.jpg" alt="" width="272" height="317" style="padding: 0 30px 20px 0;" /> -->
				<?php
$imageGals = get_field('gallery');
// $size = 'full'; // (thumbnail, medium, large, full or custom size)
if( $imageGals ): ?>
    <div id="slider">
        <div class="slides">
            <?php foreach( $imageGals as $imageGal ): ?>
                <div>
                    <img src="<?php echo esc_url($imageGal['url']); ?>" alt="<?php echo esc_attr($imageGal['title']); ?>" />
                    <p><?php echo esc_html($imageGal['caption']); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>
			<h1 class="sectionTitle">
				About Charles
			</h1>
			<div class="bio">
				<?php the_field('bio'); ?>
			</div>
		</div>

	</section>


	<!-- <a class="popup-modal" href="#test-modal">Open modal</a>

	<div id="test-modal" class="mfp-hide white-popup-block">
		<h1>Modal dialog</h1>
		<p>You won't be able to dismiss this by usual means (escape or
			click button), but you can close it programatically based on
			user choices or actions.</p>
		<p><a class="popup-modal-dismiss" href="#">Dismiss</a></p>
	</div> -->




	<section id="messageGallery">
		<h1 class="sectionTitle">
			To Charles,
		</h1>
		<div class="wrapper">
			<div class="row justify-content-center">
			<?php
				global $wpdb;
				$count = $wpdb->get_var("SELECT COUNT(id) FROM `cwh_birthday_messages`");
		    $result = $wpdb->get_results( "SELECT * FROM `cwh_birthday_messages` ORDER BY `id`");
		    foreach ( $result as $result ) {
			?>
					<!-- <a class="popup-modal" href="<#?php echo $result->name; ?>"></a> -->
					<div id="<?php echo $result->name; ?>" class="popup-modal msgCol col-12 col-lg-3">
						<div class="msgBorder">


				    	<p class="name">
								From: <?php echo $result->name; ?>
								<!-- - <em><#?php echo $result->relationship;?></em> -->
				    	</p>

							<!-- <p class="location">
								<#?php echo $result->video;?>
							</p>
							<p class="location">
								<#?php echo $result->image;?>
							</p>
							<p class="location">
								<#?php echo $result->caption;?>
							</p> -->
						<p class="message">
							<?php echo $result->message;?>
						</p>
						<p class="">
							Love,</br>
							 <?php echo $result->name; ?>
							 	<?php if( $result->relationship){ ?>
								</br><?php echo $result->relationship;?>
							<?php	} ?>
						</p>
					</div>
				</div>
				<?php } ?>
			</div>
	</section>


	<section id="photoGallery">
		<h1 class="sectionTitle">
			Photo Gallery
		</h1>
			<div class="container">
				<div class="img-gallery-magnific">
				<?php
				$images = get_field('gallery');
				$size = 'full'; // (thumbnail, medium, large, full or custom size)
				if( $images ): ?>
				<?php foreach( $images as $image ): ?>
					<div class="magnific-img">
						<a class="image-popup-vertical-fit" href="<?php echo esc_url($image['url']); ?>" title="<?php echo esc_html($image['caption']); ?>">
							<img src="<?php echo esc_url($image['sizes']['thumbnail']); ?>" >
							<i class="fa fa-search-plus" aria-hidden="true"></i>
						</a>
					</div>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>


					 <!-- <div class="magnific-img">
						<a class="image-popup-vertical-fit" href="https://unsplash.it/900/?random" title="10.jpg">
							<img src="https://unsplash.it/900/?random" alt="10.jpg" />
							<i class="fa fa-search-plus" aria-hidden="true"></i>
						</a>
					</div> -->

				<!-- </div>


		</div>
</div> -->
		<!-- <p>COMING SOON</p> -->
		<!-- <#?php
			 $paged = 1;
			$Args = array(
				"post_type" => 'posts',
				"post_status" => 'publish',
				'order'	=> 'ASC',
				"posts_per_page" => -1,
			);
			$argsQ = new WP_Query( $Args);
		?>
<#?php if( $argsQ->have_posts() ):
			 while($argsQ->have_posts()): $argsQ->the_post();  ?>
			 <img src="<#?php the_post_thumbnail(); ?>" alt="">

			 <#?php echo get_the_post_thumbnail( $post->ID, 'thumbnail' ); ?>
		 <#?php endwhile; ?>
							<#?php endif; ?> -->
	<div class="clear"></div>

</div>





	</section>
	<!-- <section id="videoGallery">
		<h1 class="sectionTitle">
			Video Gallery
		</h1>
		<p>COMING SOON</p>

		<p><a class="button large" href="https://drive.google.com/drive/folders/1WSpEeIAqmkLBaqr7udRGprJzzCXu3XQy?usp=sharing" target="_blank"><span>Add Your Video Here</span></a></p>
	</section> -->

</article>

<?php
get_footer();
