<?php
    /**
    * Template Name: Case Studies
    */

get_header();
?>

	<main id="primary" class="site-main">
		<div class="flexible-content d-flex flex-column">
		<?php
		if( have_rows('content') ){
			while( have_rows('content') ): the_row();

			get_template_part( 'template-parts/flexible-content', 'page' );
			
			endwhile;
		}
		?>
		</div>
	</main><!-- #main -->

<?php
get_footer();
