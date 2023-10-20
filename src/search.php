<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package perfection
 */

get_header();
?>

	<main id="primary" class="site-main">
		<div class="content-container">
		<?php if ( have_posts() ) : 
			
			?>

			<header class="page-header">
				<h1 class="page-title">
					<?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Search Results for: %s', 'perfection' ), '<span>' . get_search_query() . '</span>' );
					?>
				</h1>
			</header><!-- .page-header -->

			<div class="list-container">
			<?php
			/* Start the Loop */

			foreach( $posts as $post ){
				setup_postdata( $post );

			?>
				<a class="post-listing" href="<?php if( get_field('use_permalink') === true ){ the_permalink(); }elseif( get_field('use_permalink') === false ){ echo get_field('url'); }else{ the_permalink(); } ?>" >
					<?php 
						$pid = $post->ID;
					?>
					<?php 
					$image = false;
					if(  get_the_post_thumbnail_url($pid) ){?>
						<div class="img"><div class="img-asset" style="background:url(<?php echo get_the_post_thumbnail_url($pid); ?>)no-repeat center; background-size:cover;"></div></div>
					<?php 
					
						$image = true;
					}else{

					// Try and find hero image
						foreach(get_field('content') as $layout){
							if( $layout['acf_fc_layout'] === "hero" ){
					?>
						<div class="img"><div class="img-asset" style="background:url(<?php echo $layout['background_image']; ?>)no-repeat center; background-size:cover;"></div></div>
					<?php
								$image = true;
							}

							
						}
					} 
					
					if(  $image === false){
					?>
						<div class="img default"><div class="img-asset" style="background:url(/wp-content/uploads/2023/09/logo_final.png)no-repeat center #425563; background-size:80%;"></div></div>
					<?php
					}
					?>
					
					<div class="title"><?php if( strlen(get_field('displayed_title')) > 0 ){ echo get_field('displayed_title'); }else{ echo $post->post_title;} ?></div>
					<?php if(get_field('category_tags')){ 
						$tagstr = '';

						$i = 0;

						foreach( get_field('category_tags') as $tag){
							if($i > 0){
								$tagstr .= ' | ';
							}
							$tagstr .= $tag->name;

							$i++;
						}
					?>
						<div class="tags"><?php echo $tagstr; ?></div>
					<?php } ?>

					<?php 
					//var_dump(get_field('content')); 
					?>

					<?php if( strlen( get_field('excerpt') ) > 0){ ?>
						<div class="excerpt"><?php echo get_field('excerpt'); ?></div>
					<?php } ?>
				</a>
			<?php				
			}

			wp_reset_query();
		?>

		</div>

		<?php
		else :
		?>

			<header class="page-header">
				<h1 class="page-title">
					<?php
					echo 'No results found';
					?>
				</h1>
			</header><!-- .page-header -->
<?php
		endif;
		?>
		</div>

	</main><!-- #main -->

<?php
get_footer();
