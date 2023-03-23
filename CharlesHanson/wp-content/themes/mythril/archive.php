<?php
/**
 * Archive Page Template
 */

get_header();
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php
			the_archive_title( '<h1 class="page-title">', '</h1>' );
			the_archive_description( '<div class="taxonomy-description">', '</div>' );
			
			if ( have_posts() ) :			
				while ( have_posts() ) : the_post();		
					/*
						* Include the Post-Format-specific template for the content.
						* If you want to override this in a child theme, then include a file
						* called content-___.php (where ___ is the Post Format name) and that will be used instead.
						*/
					get_template_part( 'template-parts/post/content', 'page' );
		
				endwhile;
		
				the_posts_pagination( array(
					'prev_text' => '<span class="screen-reader-text">' . __( 'Previous page', 'mythril' ) . '</span>',
					'next_text' => '<span class="screen-reader-text">' . __( 'Next page', 'mythril' ) . '</span>',
					'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'mythril' ) . ' </span>',
				) );
		
			else :
		
				get_template_part( 'template-parts/post/content', 'page' );
		
			endif; 
		?>
	</article>

<?php get_footer();
