<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package perfection
 */

?>

	<footer class="site-footer d-flex justify-content-center">
		<div class="content-container">
			<div class="row d-flex flex-column flex-md-row">
				<div class="summary d-flex flex-column col-md-6">
					<div class="header-text"></div>
					<p class="subheader"><?php echo get_field('subheader', 28); ?></p>

					<?php if(get_field('contacts', 28)){ ?>
					<div class="contacts d-flex flex-column">
						<?php 
							$contactData = get_field('contacts', 28);

							for($cti = 0; $cti < count($contactData); $cti++ ){
								$contact = $contactData[$cti];
						?>
						<div class="contact col-6 col-sm-12"><?php echo $contact['label'] ?> <a href="<?php echo $contact['url'] ?>"><?php echo $contact['displayed_link_text'] ?></a></div>
						<?php
							}
						?>
					</div>
					<?php } ?>
				</div>
				<div class="categories d-flex col-md-6 flex-wrap">

					<?php  
						for($coli = 0; $coli < count(get_field('columns', 28)); $coli++){
							$column = get_field('columns', 28)[$coli];

							$cat_width = '';
					?>
						<div class="category-column <?php echo $column['style_classes'] ?>">
							<?php 
								for($cati = 0; $cati < count($column['category']); $cati ++){
									$cat = $column['category'][$cati];
							?>
							<div class="category-section <?php echo $cat['style_classes'] ?>">
								<?php if( $cat['title']){ ?>
								<div class="category-title"><p><?php echo $cat['title'] ?></p></div>
								<?php 
									}


									$orientation = 'flex-column';
									if($cat['orientation']['value'] == 'horizontal'){
										$orientation = 'flex-row';
									}
								?>
								<div class="category-items d-flex <?php echo $orientation; ?>">
									<?php  
										for($itemi = 0; $itemi < count($cat['link']); $itemi++){
											$link = $cat['link'][$itemi];

											$classes = '';

											if($link['extra_classes']){
												$classes = $link['extra_classes'];
											}

											$target = '_self';

											if($link['link_type']['value'] == 'new'){
												$target = '_blank';
											}

											if($link['link_type']['value'] == 'none'){
												$background = '';
												if($link['image']){
													$background = $link['image'];
												}
									?>
										<div class="category-item <?php echo $classes ?>" style="background:url(<?php echo $background; ?>)no-repeat center;background-size:contain;"><?php echo $link['link_text'] ?></div>
									<?php
											}else{
									?>
									<a class="category-item <?php echo $classes ?>" href="<?php echo $link['link_url'] ?>" target="<?php echo $target; ?>"><?php echo $link['link_text'] ?></a>
									<?php
											}
										}
									?>
								</div>
							</div>
							<?php
								}
							?>
						</div>
					<?php
						}
					?>
				</div>
			</div>

			<div class="row">
				<div class="legal"><span><?php echo get_field('copyright', 28); ?></span></div>
			</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
