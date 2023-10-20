<?php
	/* ==================================
	TEMPLATE
	================================== */
	if(get_row_layout() == 'template'){
	?>
	<section class="fc-template container-fluid d-flex justify-content-center">

	<div class="content-container d-flex">


	</div>
	</section>
	<?php
	}
?>





<?php
		/* ==================================
		TALL HERO
		================================== */
		if(get_row_layout() == 'tall_hero'){
?>
	<section class="fc-tall-hero container-fluid d-flex justify-content-center">

		<div class="content-container d-flex flex-column flex-sm-row justify-content-start align-items-start align-items-sm-center">
			
			<div class="content">
				<h1 class="text"><?php echo get_sub_field('phrase') ?></h1>

				<div class="ctas d-flex flex-column align-items-start">
				<?php
				for($ctai = 0; $ctai < count( get_sub_field('ctas') ); $ctai++){
					$cta = get_sub_field('ctas')[$ctai];
				?>
					<a class="cta <?php echo $cta['style_class']['value'] . ' ' . $cta['extra_style_classes'] ?>" href="<?php echo $cta['url'] ?>">
						<?php if( $cta['icon_side']['value'] == 'left'){

							if( $cta['icon_type']['value'] != 'none' ){	
						?>
							<div class="icon <?php echo $cta['icon_type']['value'] . ' left' ?>" <?php if( $cta['icon_type']['value'] === 'image'){ echo ' style="background:url(' .  $cta['icon_image'] . ')no-repeat center left; background-size:contain;"'; } ?>></div>
						<?php 
							}
						} 
						?>
						<div class="text-container"><span><?php echo $cta['display_text'] ?></span></div>
						<?php if( $cta['icon_side']['value'] == 'right' || $cta['icon_type']['value'] == 'dash' ){ 
							if( $cta['icon_type']['value'] != 'none' ){	
						?>
							<div class="icon <?php echo $cta['icon_type']['value'] . ' right' ?>" <?php if( $cta['icon_type']['value'] === 'image'){ echo ' style="background:url(' .  $cta['icon_image'] . ')no-repeat center right; background-size:contain;"'; } ?>></div>
						<?php 
							}
						} 
						?>
					</a>
				<?php
				}
				?>
				</div>

			</div>

			<div class="background">
				<?php
				$imgs = get_sub_field('hero_images');


				for($imgi = 0; $imgi < count($imgs); $imgi++){
					$img = $imgs[$imgi];
				?>
				<img src="<?php echo $img['image'] ?>" alt="">
				<?php
				}
				?>
			</div>
		</div>
	</section>
<?php
		}
?>
<?php
		/* ==================================
		HERO 
		================================== */
		if(get_row_layout() == 'hero'){
?>
	<section class="fc-hero container-fluid d-flex justify-content-center">
		<div class="background"  style="background-image:url(<?php echo get_sub_field('background_image'); ?>);background-repeat:no-repeat; background-position: <?php echo get_sub_field('background_origin') ?>; background-size:cover; opacity:<?php echo get_sub_field('opacity'); ?>"></div>
	</section>
<?php
		}
?>
<?php

	/* ==================================
	PAGE INTRO
	================================== */
	if(get_row_layout() == 'page_intro'){
		$custom = false;

		if(get_sub_field('custom_colors') === true){
			$custom = true;
		}
?>
	<section class="fc-page-intro container-fluid d-flex justify-content-center" style="background:<?php if( $custom ){ echo get_sub_field('background_color');} ?>">

		<div class="content-container d-flex flex-column">
			<?php if(get_sub_field('background_decoration')){ ?>
				<div class="background" style="background:url(<?php echo get_sub_field('background_decoration'); ?>)no-repeat; background-size:contain; "></div>	
			<?php }?>
			<?php 
			// If there aren't any other elements below title-container, don't add bottmo margin
			$margin = '';
			if( get_sub_field('excerpt') == '' && get_sub_field('sub_header') == '' && get_sub_field('description') == ''){
				$margin = 'margin-bottom:0';
			}

			if(get_sub_field('use_title_element') === true){
			?>
			<div class='title-container' style='<?php if( $custom ){ echo 'color:' . get_sub_field('title_color') . ';';} ?> <?php echo $margin; ?>'><span><?php echo get_sub_field('title'); ?><div class="dash" style='background:<?php if( $custom ){ echo get_sub_field('title_color');} ?>'></div></span></div>
			<?php 
			}

			// If ANY of excerpt, sub header, nor description are present, don't render info-container. 
			// If there are, only render the necessary elements

			if( get_sub_field('excerpt') || get_sub_field('sub_header') || get_sub_field('description') ){ ?>
			<div class="info-container d-flex flex-column flex-md-row">
				<?php if( get_sub_field('excerpt') ){ ?>

					<div class="excerpt col-md-5" style='<?php if( $custom ){ echo 'color:' . get_sub_field('excerpt_color');} ?>'>
						<?php echo get_sub_field('excerpt'); ?>
					</div>
				<?php } ?>

				<?php if( get_sub_field('sub_header') || get_sub_field('description') ){ ?>
					<div class="info d-flex flex-column col-md-6 offset-md-1">
						<?php if(get_sub_field('sub_header')){ ?>
						<div class="header-text" style='<?php if( $custom ){ echo 'color:' . get_sub_field('sub_header_color');} ?>'><?php echo get_sub_field('sub_header'); ?></div>
						<?php } ?>
						<?php if(get_sub_field('description')){ ?>
						<div class="description wysiwyg" style='<?php if( $custom ){ echo 'color:' . get_sub_field('description_color');} ?>'><?php echo get_sub_field('description'); ?></div>
						<?php } ?>
					</div>
				<?php } ?>
			</div>
			<?php } ?>
		</div>
	</section>
<?php
}
?>

	<?php
		/* ==================================
		IMAGE
		================================== */
		if(get_row_layout() == 'image'){
		?>
		<section class="fc-image container-fluid d-flex justify-content-center <?php if( get_sub_field('full_width') == true){ echo 'full'; } ?>">

		<div class="content-container d-flex" style="background:url(<?php echo get_sub_field('image'); ?>)no-repeat center; background-size:cover;">


		</div>
		</section>
		<?php
		}
	?>
<?php
		/* ==================================
		SELECTABLE CONTENT
		================================== */
		if(get_row_layout() == 'selectable_content'){
?>
<section id="<?php echo get_sub_field('id'); ?>" class="fc-selectable-content container-fluid d-flex justify-content-center">
	<div class="content-container d-flex flex-column flex-md-row justify-content-start align-items-start">
		<div class="background" style="background:url(/wp-content/uploads/2023/09/bg-shape-pattern.jpg)"></div>
		<div class="row">
			<div class="selections d-flex flex-column col-md-6 align-items-start">
				<?php
					$tabs = get_sub_field('tabs');

					for($tabi = 0; $tabi < count($tabs); $tabi++){
				?>
				<div class="tab <?php if($tabi === 0){ echo 'selected'; } ?> d-flex align-items-center justify-content-start" data-id="<?php echo $tabs[$tabi]['code'] ?>"><div class="dash d-none d-md-block col-2"></div><h2 class="text col-md-8 offset-md-1"><?php echo $tabs[$tabi]['tab_text'] ?></h2></div>
				<?php
					}
				?>
			</div>

		<div class="pages col-md-6">
			<?php
				$content = get_sub_field('tabs');

				$tallestIndex = 0;
				$charCount = 0;

				for($conti = 0; $conti < count($content); $conti++){
			?>
			<div class="page <?php if($conti === 0){ echo 'selected'; } ?>" id="<?php echo $content[$conti]['code'] ?>">
					<div class="title"><h4><?php echo $content[$conti]['title'] ?></h4></div>
					<div class="description wysiwyg"><?php echo $content[$conti]['description'] ?></div>

					<div class="cta-container d-flex flex-column align-items-start">
						
					<?php
						$ctas = $content[$conti]['ctas'];

						if($ctas){
							for($ctai = 0; $ctai < count($ctas); $ctai++){
								$cta = $ctas[$ctai];

					?>

						<a class="cta <?php echo $cta['style_class']['value'] . ' ' . $cta['extra_style_classes'] ?>" href="<?php echo $cta['url'] ?>">
							<?php if( $cta['icon_side']['value'] == 'left' ){

								if( $cta['icon_type']['value'] != 'none' ){	
							?>
								<div class="icon <?php echo $cta['icon_type']['value'] . ' left' ?>" <?php if( $cta['icon_type']['value'] === 'image'){ echo ' style="background:url(' .  $cta['icon_image'] . ')no-repeat center right; background-size:contain;"'; } ?>></div>
							<?php 
								}
							} 
							?>
							<div class="text-container"><span><?php echo $cta['display_text'] ?></span></div>
							<?php if( $cta['icon_side']['value'] == 'right' || $cta['icon_type']['value'] == 'dash' ){ 
								if( $cta['icon_type']['value'] != 'none' ){	
							?>
								<div class="icon <?php echo $cta['icon_type']['value'] . ' right' ?>" <?php if( $cta['icon_type']['value'] === 'image'){ echo ' style="background:url(' .  $cta['icon_image'] . ')no-repeat center right; background-size:contain;"'; } ?>></div>
							<?php 
								}
							} 
							?>
						</a>
					<?php 
							}
						}
					?>
					</div>
			</div>
			<?php
					$ctalen = 0;
					if($ctas){
						$ctalen = count($ctas) * 1000;
					}
					
					$charCountTemp = ( strlen($content[$conti]['title']) + strlen($content[$conti]['description']) + $ctalen );


					if($charCountTemp > $charCount){
						$charCount = $charCountTemp;
						$tallestIndex = $conti;
					}

				}

				// Add static version of the tallest page
			?>
			<div class="page static">
					<div class="title"><h4><?php echo $content[$tallestIndex]['title'] ?></h4></div>
					<div class="description wysiwyg"><p><?php echo $content[$tallestIndex]['description'] ?></p></div>

					<div class="cta-container d-flex flex-column align-items-start">
						
					<?php
						$ctas = $content[$tallestIndex]['ctas'];

						for($ctai = 0; $ctai < count($ctas); $ctai++){
							$cta = $ctas[$ctai];

					?>

						<a class="cta <?php echo $cta['style_class']['value'] . ' ' . $cta['extra_style_classes'] ?>" href="<?php echo $cta['url'] ?>">
							<?php if( $cta['icon_side']['value'] == 'left' ){

								if( $cta['icon_type']['value'] != 'none' ){	
							?>
								<div class="icon <?php echo $cta['icon_type']['value'] . ' left' ?>" <?php if( $cta['icon_type']['value'] === 'image'){ echo ' style="background:url(' .  $cta['icon_image'] . ')no-repeat center right; background-size:contain;"'; } ?>></div>
							<?php 
								}
							} 
							?>
							<div class="text-container"><span><?php echo $cta['display_text'] ?></span></div>
							<?php if( $cta['icon_side']['value'] == 'right' || $cta['icon_type']['value'] == 'dash' ){ 
								if( $cta['icon_type']['value'] != 'none' ){	
							?>
								<div class="icon <?php echo $cta['icon_type']['value'] . ' right' ?>" <?php if( $cta['icon_type']['value'] === 'image'){ echo ' style="background:url(' .  $cta['icon_image'] . ')no-repeat center right; background-size:contain;"'; } ?>></div>
							<?php 
								}
							} 
							?>
						</a>
					<?php
						}
					?>
					</div>
			</div>
		</div>

		</div>

	</div>
</section>
<?php
	}
?>

<?php
	/* ==================================
	HALF SLIDES
	================================== */
	if(get_row_layout() == 'half_slides'){

?>
	<section id="<?php echo get_sub_field('id'); ?>" class="fc-half-slides container-fluid d-flex justify-content-center p-0 thick-margins">

		<div class="content-container d-flex align-items-center">
			<div class="content d-flex flex-column flex-md-row">
				<?php $imgs = get_sub_field('slide'); ?>
				<div class="view-container col-md-6">
					<div class="viewer">
					<?php
						for($sli = 0; $sli < count($imgs); $sli++){
							$img = $imgs[$sli]['image'];
					?>
					<div id='sl-<?php echo $sli; ?>' class="slide <?php if($sli == 0){ echo 'selected'; } ?>">
						<div class="background" style="background:url(<?php echo $img ?>)no-repeat center;background-size:cover;"></div>
						<div class="caption"><p><?php echo $imgs[$sli]['caption'] ?></p></div>
					</div>
					<?php
						}
					?>
					</div>

					<div class="nav">
						<div class="items">
						<?php
							for($navi = 0; $navi < count($imgs); $navi++){
						?>
							<div class="item <?php if($navi === 0){ echo 'selected';}else if($navi === 1){ echo 'next';} ?>" data-id="<?php echo $navi ?>">
								<div class="number"><?php echo $navi + 1 ?></div>
								<div class="line"></div>
							</div>
						<?php
							}
						?>
						</div>
					</div>
				</div>
				<div class="pages col-md-6">
					<?php
						$tallestIndex = 0;
						$longestcount = 0;

						for($infoi = 0; $infoi < count($imgs); $infoi++){
							$info = $imgs[$infoi];
							$ctas = $info['ctas'];

							$ctalen = 0;
							if($ctas){
								$ctalen = count($ctas) * 1000;
							}
							$tempcount = strlen($info['label']) + strlen($info['title']) + strlen($info['description']) + $ctalen;

							if($tempcount > $longestcount){
								$longestcount = $tempcount;
								$tallestIndex = $infoi;
							}


					?>
						<div id="page-<?php echo $infoi ?>" class="page d-flex align-items-end justify-content-start <?php if($infoi == 0){ echo 'selected'; } ?>">
							<div class="content">
								<div class="label"><p><small><?php echo $info['label'] ?></small></p></div>
								<div class="title"><h2><?php echo $info['title'] ?></h2></div>
								<div class="description wysiwyg"><?php echo $info['description'] ?></div>

								<?php
									

									if($ctas){
										for($ctai = 0; $ctai < count($ctas); $ctai++){
											$cta = $ctas[$ctai];

								?>
								<a class="cta <?php echo $cta['style_class']['value'] . ' ' . $cta['extra_style_classes'] ?>" href="<?php echo $cta['url'] ?>">
									<?php if( $cta['icon_side']['value'] == 'left' ){

										if( $cta['icon_type']['value'] != 'none' ){	
									?>
										<div class="icon <?php echo $cta['icon_type']['value'] . ' left' ?>" <?php if( $cta['icon_type']['value'] === 'image'){ echo ' style="background:url(' .  $cta['icon_image'] . ')no-repeat center right; background-size:contain;"'; } ?>></div>
									<?php 
										}
									} 
									?>
									<div class="text-container"><span><?php echo $cta['display_text'] ?></span></div>
									<?php if( $cta['icon_side']['value'] == 'right' || $cta['icon_type']['value'] == 'dash' ){ 
										if( $cta['icon_type']['value'] != 'none' ){	
									?>
										<div class="icon <?php echo $cta['icon_type']['value'] . ' right' ?>" <?php if( $cta['icon_type']['value'] === 'image'){ echo ' style="background:url(' .  $cta['icon_image'] . ')no-repeat center right; background-size:contain;"'; } ?>></div>
									<?php 
											}
										}
									} 
									?>
								</a>
								<?php
									}
								?>
								
							</div>
						</div>	
					<?php } 

					
						// Generate static page (to reserve visual space)
						$tallestdata = $imgs[$tallestIndex];
					?>

						<div class="page static d-flex align-items-end justify-content-start">
							<div class="content">
								<div class="label"><p><small><?php echo $tallestdata['label'] ?></small></p></div>
								<div class="title"><h2><?php echo $tallestdata['title'] ?></h2></div>
								<div class="description wysiwyg"><?php echo $tallestdata['description'] ?></div>

								<?php
									$ctas = $tallestdata['ctas'];


									for($ctai = 0; $ctai < count($ctas); $ctai++){
										$cta = $ctas[$ctai];

								?>
								<a class="cta <?php echo $cta['style_class']['value'] . ' ' . $cta['extra_style_classes'] ?>"><div class="text-container"><span><?php echo $cta['display_text'] ?></span></div></a>
								<?php
									}
								?>
								
							</div>
						</div>	

						<div class="prevnext">
							<div class="arrow prev">PREV</div>
							<div class="progress-bar">
								<div class="total bar"></div>
								<div class="progress bar"></div>
							</div>
							<div class="arrow next">NEXT</div>
						</div>
				</div>
			</div>

		</div>
	</section>
<?php
}
?>

<?php

	/* ==================================
	HALF SLIDES SELECTION
	================================== */
	if(get_row_layout() == 'half_slides_selection'){

?>
	<section id="<?php echo get_sub_field('id'); ?>" class="fc-half-slides-selection container-fluid d-flex justify-content-center p-0">

		<div class="content-container d-flex align-items-center">
			<div class="content d-flex flex-column flex-md-row">
				<?php $imgs = get_sub_field('slide'); ?>
				<div class="view-container col-md-6">
					<div class="viewer">
					<?php
						for($sli = 0; $sli < count($imgs); $sli++){
							$img = $imgs[$sli]['image'];
					?>
					<div id='sl-<?php echo $sli; ?>' class="slide <?php if($sli == 0){ echo 'selected'; } ?>" style="background:url(<?php echo $img ?>)no-repeat center;background-size:cover;">
							<div class="caption"><p><?php echo $imgs[$sli]['caption'] ?></p></div>
					</div>
					<?php
						}
					?>
					</div>

					<div class="nav d-none d-md-flex justify-content-center">
						<div class="content">
							<h2><?php echo get_sub_field('cta_display_text'); ?></h2>
							<a class="textlink" href="<?php echo get_sub_field('cta_url') ?>" target="_self"><?php echo get_sub_field('cta_link_text'); ?></a>
						</div>
					</div>
				</div>
				<div class="pages col-md-6 d-flex flex-column">
					<div class="content-box d-flex flex-column justify-content-end align-items-end col-10 offset-1">
						<div class="title"><?php echo get_sub_field('nav_title') ?></div>
					<?php 
						for($infoi = 0; $infoi < count($imgs); $infoi++){
							$info = $imgs[$infoi]
					?>
						<div id="page-<?php echo $infoi ?>" class="page d-flex justify-content-end <?php if($infoi == 0){ echo 'selected in'; } ?>" data-id="<?php echo $infoi ?>">
							<div class="content">
								<div class="title"><h2><?php echo $info['title'] ?></h2></div>

								<?php
									$ctas = $info['ctas'];


									for($ctai = 0; $ctai < count($ctas); $ctai++){
										$cta = $ctas[$ctai];

								?>

								<a class="cta <?php echo $cta['style_class']['value'] . ' ' . $cta['extra_style_classes'] ?>" href="<?php echo $cta['url'] ?>">
									<?php if( $cta['icon_side']['value'] == 'left' ){

										if( $cta['icon_type']['value'] != 'none' ){	
									?>
										<div class="icon <?php echo $cta['icon_type']['value'] . ' left' ?>" <?php if( $cta['icon_type']['value'] === 'image'){ echo ' style="background:url(' .  $cta['icon_image'] . ')no-repeat center right; background-size:contain;"'; } ?>></div>
									<?php 
										}
									} 
									?>
									<div class="text-container"><span><?php echo $cta['display_text'] ?></span></div>
									<?php if( $cta['icon_side']['value'] == 'right' || $cta['icon_type']['value'] == 'dash' ){ 
										if( $cta['icon_type']['value'] != 'none' ){	
									?>
										<div class="icon <?php echo $cta['icon_type']['value'] . ' right' ?>" <?php if( $cta['icon_type']['value'] === 'image'){ echo ' style="background:url(' .  $cta['icon_image'] . ')no-repeat center right; background-size:contain;"'; } ?>></div>
									<?php 
										}
									} 
									?>
								</a>
								<?php
									}
								?>
								
							</div>
						</div>	
					<?php } ?>
					</div>

					<a class="nav mobile justify-content-center" href="<?php echo get_sub_field('cta_url') ?>" target="_self">
						<div class="content d-flex flex-column align-items-start">
							<h2><?php echo get_sub_field('cta_display_text'); ?></h2>
							<div class="textlink"><?php echo get_sub_field('cta_link_text'); ?></div>
						</div>
					</a>
				</div>
			</div>

		</div>
	</section>
<?php
}
?>


<?php

/* ==================================
ABOUT PIE CHART
================================== */
if(get_row_layout() == 'about_pie_chart'){

?>
<section id="<?php echo get_sub_field('id'); ?>" class="fc-pie_chart container-fluid d-flex justify-content-center p-0">

	<div class="content-container d-flex align-items-center">
		<div class="content d-flex flex-column flex-md-row">
			<div class="mobile-title d-flex flex-column d-md-none">
				<div class="title"><h2><?php echo get_sub_field('nav_title') ?></h2></div>
				<div class="description"><?php echo get_sub_field('description') ?></div>
			</div>
			<div class="view-container col-md-6">
				<div class="viewer">
					<div class="img-container d-lg-flex">
						<div class="desktop chart-graphic d-none d-lg-flex align-items-lg">
							<?php get_template_part( 'inc/about-process-desktop', 'none' ); ?>
						</div>
						<div class="mobile chart-graphic d-lg-none">
							<?php get_template_part( 'inc/about-process-mobile', 'none' ); ?>
						</div>
					
					</div>
				</div>

			</div>
			<div class="pages col-md-6 d-flex flex-column">
				<div class="content-box d-flex flex-column justify-content-end justify-content-md-start align-items-end col-10 offset-1">
					<div class="title d-none d-md-block"><?php echo get_sub_field('nav_title') ?></div>
					<div class="description d-none d-md-block"><?php echo get_sub_field('description') ?></div>

					<div class="page-container">
				<?php 
					$imgs = get_sub_field('slide');

					$charCount = 0;
					$tallestIndex = 0;

					for($infoi = 0; $infoi < count($imgs); $infoi++){
						$info = $imgs[$infoi]
				?>
						<div id="page-<?php echo $infoi ?>" class="page d-flex justify-content-end <?php if($infoi == 0){ echo 'selected in'; } ?>" data-id="<?php echo $infoi ?>">
							<div class="content">
								<div class="title"><h2><?php echo $info['title'] ?></h2></div>
								<div class="description"><?php echo $info['description'] ?></div>

								<?php
									$ctas = $info['ctas'];
					

									if($ctas){
										
									for($ctai = 0; $ctai < count($ctas); $ctai++){
										$cta = $ctas[$ctai];

								?>

								<a class="cta <?php echo $cta['style_class']['value'] . ' ' . $cta['extra_style_classes'] ?>" href="<?php echo $cta['url'] ?>">
									<?php if( $cta['icon_side']['value'] == 'left' ){

										if( $cta['icon_type']['value'] != 'none' ){	
									?>
										<div class="icon <?php echo $cta['icon_type']['value'] . ' left' ?>" <?php if( $cta['icon_type']['value'] === 'image'){ echo ' style="background:url(' .  $cta['icon_image'] . ')no-repeat center right; background-size:contain;"'; } ?>></div>
									<?php 
										}
									} 
									?>
									<div class="text-container"><span><?php echo $cta['display_text'] ?></span></div>
									<?php if( $cta['icon_side']['value'] == 'right' || $cta['icon_type']['value'] == 'dash' ){ 
										if( $cta['icon_type']['value'] != 'none' ){	
									?>
										<div class="icon <?php echo $cta['icon_type']['value'] . ' right' ?>" <?php if( $cta['icon_type']['value'] === 'image'){ echo ' style="background:url(' .  $cta['icon_image'] . ')no-repeat center right; background-size:contain;"'; } ?>></div>
									<?php 
										}
									} 
									?>
								</a>
								<?php
									}
										
									}
								?>
								
							</div>
						</div>	
					<?php 
							$charCountTemp = ( strlen($info['title']) + strlen($info['description']) );

							if($charCountTemp > $charCount){
								$charCount = $charCountTemp;
								$tallestIndex = $infoi;

							}
						}


						// Next build STATIC version of tallest page (to use as spaceer)
					?>
						<div class="page static d-flex justify-content-end" data-id="<?php echo $infoi ?>">
							<div class="content">
								<div class="title"><h2><?php echo $imgs[$tallestIndex]['title'] ?></h2></div>
								<div class="description"><?php echo  $imgs[$tallestIndex]['description'] ?></div>

								<?php
									$ctas =  $imgs[$tallestIndex]['ctas'];

									if($ctas){
									for($ctai = 0; $ctai < count($ctas); $ctai++){
										$cta = $ctas[$ctai];

								?>

								<a class="cta <?php echo $cta['style_class']['value'] . ' ' . $cta['extra_style_classes'] ?>" href="<?php echo $cta['url'] ?>">
									<?php if( $cta['icon_side']['value'] == 'left' ){

										if( $cta['icon_type']['value'] != 'none' ){	
									?>
										<div class="icon <?php echo $cta['icon_type']['value'] . ' left' ?>" <?php if( $cta['icon_type']['value'] === 'image'){ echo ' style="background:url(' .  $cta['icon_image'] . ')no-repeat center right; background-size:contain;"'; } ?>></div>
									<?php 
										}
									} 
									?>
									<div class="text-container"><span><?php echo $cta['display_text'] ?></span></div>
									<?php if( $cta['icon_side']['value'] == 'right' || $cta['icon_type']['value'] == 'dash' ){ 
										if( $cta['icon_type']['value'] != 'none' ){	
									?>
										<div class="icon <?php echo $cta['icon_type']['value'] . ' right' ?>" <?php if( $cta['icon_type']['value'] === 'image'){ echo ' style="background:url(' .  $cta['icon_image'] . ')no-repeat center right; background-size:contain;"'; } ?>></div>
									<?php 
										}
									} 
									?>
								</a>
								<?php
									}
								}
								?>
								
							</div>
						</div>

					</div>
				</div>



				<div class="prevnext">
					<div class="arrow prev">PREV</div>
					<div class="progress-bar">
						<div class="total bar"></div>
						<div class="progress bar"></div>
					</div>
					<div class="arrow next">NEXT</div>
				</div>


			</div>
		</div>

	</div>
</section>
<?php
}
?>

<?php

	/* ==================================
	HALVES
	================================== */
	if(get_row_layout() == 'halves'){

		if(get_sub_field('background_image')){
			$backgroundStyle = 'background:url(' . get_sub_field('background_image') . ')no-repeat center; background-size:cover;';
		}else{
			$backgroundStyle = 'background:' . get_sub_field('background_color');
		}

?>
<section class="fc-halves container-fluid d-flex justify-content-center <?php echo get_sub_field('extra_classes') ?>" style="<?php echo $backgroundStyle ?>">

<div class="content-container d-flex flex-md-row">
	<?php
		for($hi = 0; $hi < count(get_sub_field('half')); $hi++){
			$halfdata = get_sub_field('half')[$hi];

			$side = 'left';

			if($hi === 1){
				$side = 'right';
			}

	?>
	<div class="col-md-6 <?php echo $side ?> <?php echo $halfdata['type']['value'] ?> <?php echo $halfdata['extra_classes'] ?> <?php if($halfdata['type']['value'] == 'overview'){?> d-flex align-items-center<?php } ?>">
		<?php  if($halfdata['type']['value'] == 'overview'){ ?>
		<div class="content">

			<?php if( $halfdata['label_icon'] == true ){ ?>
				<div class="label icon" style="background:url(<?php echo $halfdata['label_icon_image'] ?>)no-repeat center;background-size:contain;"></div>
			<?php }else{
				if($halfdata['label']){?>
			<div class="label"><p><?php echo $halfdata['label'] ?></p></div>
			<?php 
				}
			} 
			?>
			
			<div class="title"><h1><?php echo $halfdata['title'] ?></h1></div>

			<?php if($halfdata['description']){ ?>
			<div class="description wysiwyg"><?php echo $halfdata['description'] ?></div>
			<?php }  ?>

			<?php if( $halfdata['ctas']){ ?>
			<div class="cta-container d-flex flex-column justify-content-start align-items-start">
				<?php for($ctai = 0; $ctai < count($halfdata['ctas']); $ctai++){
					$cta = $halfdata['ctas'][$ctai];
				?>

				<a class="cta <?php echo $cta['style_class']['value'] . ' ' . $cta['extra_style_classes'] ?>" href="<?php echo $cta['url'] ?>">
					<?php if( $cta['icon_side']['value'] == 'left' ){

						if( $cta['icon_type']['value'] != 'none' ){	
					?>
						<div class="icon <?php echo $cta['icon_type']['value'] . ' left' ?>" <?php if( $cta['icon_type']['value'] === 'image'){ echo ' style="background:url(' .  $cta['icon_image'] . ')no-repeat center right; background-size:contain;"'; } ?>></div>
					<?php 
						}
					} 
					?>
					<div class="text-container"><span><?php echo $cta['display_text'] ?></span></div>
					<?php if( $cta['icon_side']['value'] == 'right' || $cta['icon_type']['value'] == 'dash' ){ 
						if( $cta['icon_type']['value'] != 'none' ){	
					?>
						<div class="icon <?php echo $cta['icon_type']['value'] . ' right' ?>" <?php if( $cta['icon_type']['value'] === 'image'){ echo ' style="background:url(' .  $cta['icon_image'] . ')no-repeat center right; background-size:contain;"'; } ?>></div>
					<?php 
						}
					} 
					?>
				</a>
				<?php
				} 
				?>
			</div>
			<?php } ?>
		</div>
		<?php }elseif($halfdata['type']['value'] == 'bullets'){ ?>
		<div class="content d-flex flex-wrap">
			<?php
			for($bi = 0; $bi < count($halfdata['bullet']); $bi++){
				$bullet = $halfdata['bullet'][$bi];
			?>
			<div class="bullet col-md-6 d-flex flex-column justify-content-start align-items-start">
				<div class="icon" style="background:url(<?php echo $bullet['icon_image'] ?>)no-repeat center;background-size:contain;"></div>
				<div class="header-text"><?php echo $bullet['header'] ?></div>
				<div class="description"><p><?php echo $bullet['description'] ?></p></div>

				<?php if( $bullet['cta_url']){ ?>
				<a href="<?php echo $bullet['cta_url'] ?>" class="cta <?php echo $bullet['cta_style']['value'] ?>" <?php if($bullet['cta_window']['value'] == "new"){ echo 'target="_blank"';} ?>><div class="text-container"><span><?php echo $bullet['cta_text'] ?></span></div></a>
				<?php } ?>
			</div>
			<?php
			}
			?>
		</div>

		<?php }elseif($halfdata['type']['value'] == 'photo'){ ?>
		<div class="image" style="background:url(<?php echo $halfdata['main_image'] ?>)no-repeat center; background-size:cover;"></div>
		<?php }elseif($halfdata['type']['value'] == 'wysiwyg'){ ?>
		<div class="content">
			<?php if($halfdata['title']){ ?>
			<div class="title"><?php echo $halfdata['title'] ?></div>
			<?php } ?>
			<div class="custom-content wysiwyg"><?php echo $halfdata['wysiwyg'] ?></div>
		</div>

		<?php }elseif($halfdata['type']['value'] == 'photolink'){ ?>
			<div class="content <?php echo $halfdata['photo_topbottom'] ?>">
				<div class="img" style="background:url(<?php echo $halfdata['main_image'] ?>)no-repeat center; background-size:cover;"></div>
				<div class="link-container">
					<div class="label"><?php echo $halfdata['label'] ?></div>
					<a href="<?php echo $halfdata['url'] ?>"><?php echo $halfdata['title'] ?></a>
				</div>
			</div>
		<?php } ?>
	</div>
	<?php } ?>

</div>
</section>
<?php
}
?>

<?php

/* ==================================
BULLET LIST
================================== */
if(get_row_layout() == 'bullet_list'){
?>
<section class="fc-bullet-list container-fluid d-flex justify-content-center" <?php if( get_sub_field('background_color')){ echo 'style="background-color:' . get_sub_field('background_color') . ';"'; } ?>>

	<div class="content-container d-flex flex-column justify-content-start align-items-center">
		<div class="title"><h1><?php echo get_sub_field('title'); ?></h1></div>

		<div class="items row d-flex flex-wrap justify-content-center">
			<?php  
			for($itemi = 0; $itemi < count(get_sub_field('bullets')); $itemi++){
				$item = get_sub_field('bullets')[$itemi];
			?>
			<div class="item d-flex flex-column align-items-center col-sm-6 col-md-4">
				<div class="number"><?php echo ($itemi + 1); ?></div>
				<div class="text"><p><?php echo $item['text'] ?></p></div>
			</div>
			<?php
			}
			?>
		</div>

	</div>
</section>
<?php
}
?>

<?php

/* ==================================
3 Block
================================== */
if(get_row_layout() == '3_block'){
?>
<section class="fc-3-blocks num-blocks container-fluid d-flex justify-content-center <?php echo get_sub_field('extra_classes') ?>" style="background-color:<?php echo get_sub_field('background_color'); ?>">

<div class="content-container d-flex flex-column justify-content-start align-items-center">
	<?php if( get_sub_field('title') ){?>
	<div class="title"><h1><?php echo get_sub_field('title'); ?></h1></div>
	<?php } ?>
	<div class="blocks">
		<?php
			for($blki = 0; $blki < count(get_sub_field('blocks')); $blki++){
				$block = get_sub_field('blocks')[$blki];
			?>
			<div class="block">
				<div class="background" style="background:url(<?php echo $block['image'] ?>)no-repeat center; background-size:cover;"></div>
				<div class="info d-flex flex-column">
					<div class="title"><h2><?php echo $block['title'] ?></h2></div>
					<?php if( $block['description']){?>
					<div class="description"><div class="d-container"><?php echo $block['description'] ?></div></div>
					<?php } ?>

					<?php if( $block['url']){?>
					<a href="<?php echo $block['url'] ?>" class="cta textlink"><p><?php echo $block['cta_text'] ?></p></a>
					<?php } ?>
				</div>
			</div>
			<?php
			}
		?>
	</div>

</div>
</section>
<?php
}
?>

<?php

/* ==================================
4 Block
================================== */
if(get_row_layout() == '4_block'){
?>
<section class="fc-4-blocks num-blocks container-fluid d-flex justify-content-center <?php echo get_sub_field('extra_classes') ?>"  style="background-color:<?php echo get_sub_field('background_color'); ?>">

<div class="content-container d-flex flex-column justify-content-start align-items-center">
	<?php if( get_sub_field('title') ){?>
	<div class="title"><h1><?php echo get_sub_field('title'); ?></h1></div>
	<?php } ?>
	<div class="blocks">
		<?php
			for($blki = 0; $blki < count(get_sub_field('blocks')); $blki++){
				$block = get_sub_field('blocks')[$blki];
			?>
			<div class="block">
				<div class="background" style="background:url(<?php echo $block['image'] ?>)no-repeat center; background-size:cover;"></div>
				<div class="info d-flex flex-column">
					<div class="title"><h2><?php echo $block['title'] ?></h2></div>

					<?php if( $block['description']){?>
					<div class="description wysiwyg"><div class="d-container"><?php echo $block['description'] ?></div></div>
					<?php } ?>

					<?php if( $block['url']){?>
					<a href="<?php echo $block['url'] ?>" class="cta textlink"><p><?php echo $block['cta_text'] ?></p></a>
					<?php } ?>
					
				</div>
			</div>
			<?php
			}
		?>
	</div>

</div>
</section>
<?php
}
?>

<?php

/* ==================================
CONTENT SORTER
================================== */
if(get_row_layout() == 'content_sorter'){
?>
<section id="<?php echo get_sub_field('id'); ?>" class="fc-content-sorter container-fluid d-flex justify-content-center" data-type="<?php echo get_sub_field('content_type')['value'] ?>">

<?php
	$type = get_sub_field('content_type')['value'];
?>
<div class="content-container d-flex  flex-column flex-md-row <?php echo $type; ?>">
	<div class="subnav col-12 col-md-4">
		<?php
		for($sni = 0; $sni < count( get_sub_field('nav')); $sni++){
			$cat = get_sub_field('nav')[$sni];
		?>

		<div class="category-container">
			<div class="header-container d-flex align-items-center justify-content-between">
				<h2 class="category-header"><?php echo $cat['category_header'] ?></h2>
				<div class="icon d-md-none"></div>
			</div>

			<div class="category-items">
				<?php
					for($ci = 0; $ci < count($cat['category_items']); $ci++){
						$item = $cat['category_items'][$ci];
				?>
				<div class="item <?php if($item['item_id'] === 'all'){ echo 'all'; } ?> <?php if($ci === 0){ echo 'selected'; } ?>" >
					<div class="label" data-id="<?php echo $item['item_id'] ?>"><?php echo $item['item_label'] ?></div>
					<?php if( $item['child_items']){?>
						<div class="children-items">
							<?php
							$subnav_items = $item['child_items'];

							for($si = 0; $si < count($subnav_items); $si++){ ?>
								<div class="sub-item" data-id="<?php echo $subnav_items[$si]['child_id'] ?>"><?php echo $subnav_items[$si]['display_text'] ?></div>
							<?php } ?>
						</div>
					<?php } ?>
				</div>
				<?php
					}
				?>
			</div>

			<?php if( $cat['links'] ){ ?>
			<div class="links">
				<?php for($li = 0; $li < count($cat['links']); $li++){ ?>
					<a href="<?php echo $cat['links'][$li]['url'] ?>" class="link"><?php echo $cat['links'][$li]['display_text'] ?></a>
				<?php } ?>
			</div>
		<?php } ?>
		</div>
		<?php
		}
		?>
	</div>

	<div class="content col-12 col-md-8">
		<?php
		if($type === 'sort'){
		?>
		<?php 
		// Query
		$posts = get_posts(array(
			'posts_per_page'	=> -1,
			'post_type'			=> get_sub_field('post_type')->slug,
			'orderby'          => 'date',
			'order'            => 'DESC'
		));

		?>

		<div class="sort-container <?php echo get_sub_field('post_type')->slug; ?>">
			
			<?php foreach( $posts as $post ): 
				
				setup_postdata( $post );

				$classStr = '';
				$displayStr = '';

				foreach( get_field('category_tags') as $key ){

					$parent_slug = '';

					if($key->parent){
						$parent_cat = $key->parent;
						$parent_slug = strtolower( get_the_category_by_ID( $parent_cat ) );
					}else{
						$parent_slug->slug;
					}


					$classStr .= $key->slug;
					$classStr .= ' ';

					$displayStr .= '<a class="cta textlink" href="/' . $parent_slug . '/' . $key->slug . '" style="color:#8E99A1;white-space:nowrap;">' . $key->name . '</a>';
					$displayStr .= ' | ';
				}

				?>
				<div  class="carousel-object <?php echo $classStr; ?> show in" >
					<?php if(get_the_post_thumbnail_url($post->ID)){ ?>
						<div class="img">
							<div class="img-container" style="background:url(<?php echo get_the_post_thumbnail_url($post->ID) ?>)no-repeat center;background-size:cover;"></div>
						</div>
					<?php } ?>

					<div class="label"><?php echo substr_replace($displayStr ,"",-3); ?></div>
					<?php if(get_field('displayed_title')){ ?>
					<div class="title"><?php echo get_field('displayed_title'); ?></div>
					<?php } ?>
					<?php if(get_field('excerpt')){ ?>
					<div class="excerpt"><?php echo get_field('excerpt'); ?></div>
					<?php } ?>
					<a href="<?php if(get_field('use_permalink') === false){ echo get_field('url'); }else{ the_permalink(); }  ?>" <?php if( get_field('external_link')){ echo 'target="_blank"';} ?> class="cta textlink">Read More</a>
				</div>
			
			<?php endforeach; ?>

			<?php wp_reset_query();   // Restore global post data stomped by the_post(). ?>
		</div>

		<?php
		}elseif($type === 'pages'){
			$largest_content = '';
			$largest_amt = 0;

			/* 
			Create all pages. 
			Then, generate a static version of the largest page. 
			Static page will be used to "reserve" vertical space to avoid "height popping" from page-to-page
			*/
			for($navi = 0; $navi < count(get_sub_field('nav')); $navi++){
				$cat = get_sub_field('nav')[$navi];
				for($ci = 0; $ci < count($cat['category_items']); $ci++){
					$item = $cat['category_items'][$ci];

					if( strlen($item['item_content']) > $largest_amt){
						$largest_amt = strlen($item['item_content']);
						$largest_content = $item['item_content'];
					}
		?>

		<div class="page wysiwyg <?php if($ci === 0){ echo 'selected'; } ?>" id="<?php echo $item['item_id'] ?>">
			<?php echo $item['item_content'] ?>
		</div>

		<?php
				}
			}
		?>

		<div class="page static">
			<?php echo $largest_content; ?>
		</div>
		<?php }elseif($type === 'chapters'){ 

			$chapters = get_sub_field('chapters');

			for($chi = 0; $chi < count($chapters); $chi++){
				$ch = $chapters[$chi]['flexible_chapters'];


				for($ci = 0; $ci < count($ch); $ci++){
					$ch_item = $ch[$ci];

					
					if($ch_item['acf_fc_layout'] == 'chapter_bullets'){ ?>
					<div class="chapter-bullets" id="<?php echo $ch_item['scroll_to_id'] ?>" style="background:<?php echo $ch_item['background'] ?>">
						<?php for($bi = 0; $bi < count($ch_item['bullets']); $bi++){ 
							$bullet = $ch_item['bullets'][$bi];
						?>
						<div class="bullet">
							<div class="title"><?php  echo $bullet['title']; ?></div>
							<div class="description"><?php  echo $bullet['description']; ?></div>
						</div>
							
						<?php } ?>
					</div>
					<?php }elseif($ch_item['acf_fc_layout'] == 'wysiwyg_editor'){  ?>
					<div class="chapter-wysiwyg wysiwyg" id="<?php echo $ch_item['scroll_to_id']; ?>">
					<?php echo $ch_item['editor']; ?>
					</div>
					<?php } 
				}
			}
			?>
			
		<?php } ?>
	</div>
</div>
</section>
<?php
}
?>

<?php

/* ==================================
VIDEO BLOCK
================================== */
if(get_row_layout() == 'video_block'){
?>
<section class="fc-video-block container-fluid d-flex justify-content-center">
	<div class="background" style="background:url(<?php echo get_sub_field('background_image'); ?>)no-repeat center; background-size:cover;"></div>
<div class="content-container d-flex flex-column-reverse flex-md-row">
	<div class="info col-12 col-md-6 d-flex flex-column justify-content-end">
		<div class="box">
			<div class="title"><h2><?php echo get_sub_field('title'); ?></h2></div>
			<div class="description"><?php echo get_sub_field('description'); ?></div>
		</div>
	</div>

	<div class="video col-12 col-md-6 <?php echo get_sub_field('vendor')['value'] ?>-link d-flex justify-content-center align-items-center" data-videoid='<?php echo get_sub_field('video_id');  ?>'>
		<div class="play-icon"></div>
	</div>

	<div class="viewer">
		<?php 
		if(get_sub_field('vendor')['value'] == 'youtube'){
		?>
		<iframe width="100%" height="100%" src="https://www.youtube.com/embed/<?php echo get_sub_field('video_id'); ?>?"></iframe>
		<?php
		}else{
			?>
			<iframe src="https://player.vimeo.com/video/<?php echo get_sub_field('video_id'); ?>a&autoplay=0&title=0&byline=0&portrait=0" style="position:absolute;top:0;left:0;width:100%;height:100%;" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe><script src="https://player.vimeo.com/api/player.js"></script>
			<?php
		} ?>

		<div class="close-btn"></div>
	</div>
</div>
</section>
<?php
}
?>

<?php
	/* ==================================
	POST CAROUSEL
	================================== */
	if(get_row_layout() == 'post_carousel'){
		// Query before section. Hide section if no posts are eligible
		$posts = get_posts(array(
			'posts_per_page'	=> -1,
			'post_type'			=> get_sub_field('post_type'),
			'orderby'          => 'date',
			'order'            => 'DESC'
		));
		
		$location_selected = '';
		$type_priority = get_sub_field('type_priority');

		if($type_priority == "location"){
			$location_selected = get_sub_field('location');
		}

		$filter = get_sub_field('filter_keys');

		$displayed_posts = [];
		
		$maxCount = 2;
		$indexCount = 0;
		foreach( $posts as $post ): 
			
			setup_postdata( $post );
			$include = false;
			$cats = '';

			if($type_priority == "location"){
				$location = get_field('locations')['value'];

				if($location == $location_selected['value']){
					$cats = $location_selected['label'];

					
					$include = true;
				}

			}else{

				$categories = get_field('category_tags');


				for($ci = 0; $ci < count($categories); $ci++){
					if($filter === $categories[$ci]->slug){
						$include = true;
					}

					if($ci === 0){
						$cats = $categories[$ci]->name;
					}else{
						$cats = $cats . ' | ' . $categories[$ci]->name;
					}
				}
			}


			if($indexCount >= 2){
				$include = false;
			}


			if($include === true){
				$indexCount++;

				$displayed_posts[] = $post;
			} ?>
		<?php endforeach; ?>

		<?php wp_reset_query();   // Restore global post data stomped by the_post(). ?>

	<section class="fc-post-carousel container-fluid d-flex justify-content-center <?php if( count($displayed_posts) === 0 ){ echo 'hide-section'; } ?>" style="background:<?php echo get_sub_field('background_color') ?>">

	<div class="content-container d-flex flex-column flex-md-row">
		<div class="info col-md-4">
			<div class="label"><?php echo get_sub_field('label')?></div>
			<div class="title"><?php echo get_sub_field('title')?></div>

			<div class="cta-container d-flex flex-column align-items-start">
				
			<?php
				$ctas = get_sub_field('ctas');

				if($ctas){
				for($ctai = 0; $ctai < count($ctas); $ctai++){
					$cta = $ctas[$ctai];

			?>

				<a class="cta <?php echo $cta['style_class']['value'] . ' ' . $cta['extra_style_classes'] ?>" href="<?php echo $cta['url'] ?>">
					<?php if( $cta['icon_side']['value'] == 'left' ){

						if( $cta['icon_type']['value'] != 'none' ){	
					?>
						<div class="icon <?php echo $cta['icon_type']['value'] . ' left' ?>" <?php if( $cta['icon_type']['value'] === 'image'){ echo ' style="background:url(' .  $cta['icon_image'] . ')no-repeat center right; background-size:contain;"'; } ?>></div>
					<?php 
						}
					} 
					?>
					<div class="text-container"><span><?php echo $cta['display_text'] ?></span></div>
					<?php if( $cta['icon_side']['value'] == 'right' || $cta['icon_type']['value'] == 'dash' ){ 
						if( $cta['icon_type']['value'] != 'none' ){	
					?>
						<div class="icon <?php echo $cta['icon_type']['value'] . ' right' ?>" <?php if( $cta['icon_type']['value'] === 'image'){ echo ' style="background:url(' .  $cta['icon_image'] . ')no-repeat center right; background-size:contain;"'; } ?>></div>
					<?php 
						}
					} 
					?>
				</a>
			<?php
				}
			}
			?>
			</div>
		</div>

		<div class="carousel col-md-8">

			<div class="box-container">
				
				<?php 

				foreach( $displayed_posts as $post ){ 
					
					setup_postdata( $post );
					$cats = '';

					if($type_priority == "location"){
						$location = get_field('locations')['value'];

						if($location == $location_selected['value']){
							$cats = $location_selected['label'];
						}

					}

					$categories = get_field('category_tags');


					for($ci = 0; $ci < count($categories); $ci++){

						if($ci === 0){
							$cats = $categories[$ci]->name;
						}else{
							$cats = $cats . ' | ' . $categories[$ci]->name;
						}
					}
				?>
					<a href="<?php the_permalink(); ?>" class="carousel-object d-flex flex-column align-items-start">
						<div class="img"style="background:url(<?php echo get_the_post_thumbnail_url($post->ID) ?>)no-repeat center; background-size:cover;"></div>
						<div class="label"><?php echo $cats; ?></div>
						<div class="title"><?php the_title(); ?></div>
						<div class="cta textlink">Read More</div>
					</a>
				<?php } ?>

				<?php wp_reset_query();   // Restore global post data stomped by the_post(). ?>
			</div>
		</div>

	</div>
	</section>
	<?php
	}
?>

<?php
	/* ==================================
	QUOTES
	================================== */
	if(get_row_layout() == 'quotes'){
	?>
	<section class="fc-quotes container-fluid d-flex justify-content-center">
		<div class="background" style="background:url(/wp-content/uploads/2023/09/bg-shape-pattern.jpg);"></div>
		<div class="content-container d-flex">
			<?php 
			$countClass = '';
			if(count(get_sub_field('collection')) == 1){
				$countClass = 'single';
			}elseif(count(get_sub_field('collection')) == 2){
				$countClass = 'double';
			}
			?>
			<div class="quote-collection <?php echo $countClass; ?>" >
				<?php
					for($qi = 0; $qi < count(get_sub_field('collection')); $qi++){
						$item = get_sub_field('collection')[$qi];
					?>
					<div class="quote">
						<div class="icon"></div>

						<div class="content">
							<div class="text"><?php echo $item['text'] ?></div>
							<?php if($item['company']){ ?>
							<div class="quoter"><p><?php echo $item['company']  ?></p></div>
							<?php } ?>
							<?php if($item['business_type']){ ?>
							<div class="business"><p><?php echo $item['business_type']  ?></p></div>
							<?php } ?>
							<?php if($item['location']){ ?>
							<div class="location"><p><?php echo $item['location']  ?></p></div>
							<?php } ?>
						</div>
					</div>
					<?php
					}
				?>
			</div>

		</div>
	</section>
	<?php
	}
?>

<?php
	/* ==================================
	GRID ITEMS
	================================== */
	if(get_row_layout() == 'grid_items'){
	?>
	<section class="fc-grid-items container-fluid d-flex justify-content-center <?php if( get_sub_field('top_padding') == true){ echo 'padding-top';} ?> <?php if( get_sub_field('bottom_padding') == true){ echo 'padding-bottom'; } ?>" style="<?php if(get_sub_field('background')){ echo 'background:' . get_sub_field('background'); } ?>">

	<div class="content-container d-flex flex-column align-items-md-start">
		<?php if( get_sub_field('title') ){ ?>
		<div class="title"><?php echo get_sub_field('title'); ?></div>
		<?php }?>
		<div class="content  d-grid <?php echo get_sub_field('column_amount') ?>">
		<?php for( $itemi = 0; $itemi < count(get_sub_field('items')); $itemi++){
			$items = get_sub_field('items');	
		?>
			<div class="item">
				<div class="title"><?php echo $items[$itemi]['title']; ?></div>
				<div class="description"><?php echo $items[$itemi]['description']; ?></div>
				
				<?php
				if($items[$itemi]['ctas']){
					for($ctai = 0; $ctai < count( $items[$itemi]['ctas'] ); $ctai++){
						$cta = $items[$itemi]['ctas'][$ctai];
				?>
						<a class="cta <?php echo $cta['style_class'] . ' ' . $cta['extra_style_classes'] ?>" href="<?php echo $cta['url'] ?>">
							
							<div class="text-container"><span><?php echo $cta['display_text'] ?></span></div>
							
						</a>
				<?php
					}
				}
				?>
			</div>	
		<?php } ?>
		</div>
	</div>
	</section>
	<?php
	}
?>

<?php
	/* ==================================
	GRID INFO BLOCKS
	================================== */
	if(get_row_layout() == 'grid_info_blocks'){
	?>
	<section class="fc-grid-info-blocks container-fluid d-flex justify-content-center">

	<div class="content-container d-flex">
		<div class="content d-grid">
			<?php for($infoi = 0; $infoi < count(get_sub_field('blocks')); $infoi++){ 
				$block = get_sub_field('blocks')[$infoi];
			?>
				<a href="<?php echo $block['url'] ?>" class="block d-flex flex-between">
					<div class="info-box d-flex flex-column">
						<div class="title"><?php echo $block['title'] ?></div>
						<div class="info"><?php echo $block['info'] ?></div>
					</div>

					<div class="cta textlink"><?php echo $block['cta_text'] ?></div>
				</a>
				
			<?php } ?>
		</div>
	</div>
	</section>
	<?php
	}
?>


<?php
/* ==================================
CONTACT US
================================== */
if(get_row_layout() == 'contact_us'){
?>
<section class="fc-contact-us container-fluid d-flex justify-content-center">

	<div class="content-container d-flex flex-column flex-md-row justify-content-md-start align-items-md-center">
		<div class="dash-container d-none d-md-block col-md-1"></div>
		<div class="text col-md-8 offset-md-1">
			<h1><?php echo get_sub_field('message'); ?></h1>
		</div>
		<div class="link col-md-2">
			<a class="cta textlink" href="/contact-us">Contact us</a>
		</div>

	</div>
</section>
<?php
}
?>

<?php
	/* ==================================
	IMAGE GRID
	================================== */
	if(get_row_layout() == 'image_grid'){
	?>
	<section class="fc-image-grid container-fluid d-flex justify-content-center" style="background:<?php echo get_sub_field('background'); ?>">

	<div class="content-container d-flex d-md-grid flex-column flex-md-row <?php echo get_sub_field('image_mode') ?> <?php if(get_sub_field('show_title') ){echo 'show-title'; } ?> <?php if( get_sub_field('white_out')){ echo 'white-out';} ?>">
	
	<?php 
	$images = get_sub_field('images');
	for($imi = 0; $imi < count($images); $imi++){ 
		$img = $images[$imi];
	?>
		<div class="image-container <?php if($imi == 0){ echo 'selected'; } ?>">
			<div class="image" style="background:url(<?php echo $img['image'] ?>)no-repeat center; background-size:cover;"></div>
			
			<?php if($img['title']){ ?>
			<div class="title"><span><?php echo $img['title'] ?></span></div>
			<?php } ?>

			<?php if($img['subheader']){ ?>
			<div class="subheader"><span><?php echo $img['subheader'] ?></span></div>
			<?php } ?>

			<?php if($img['caption']){ ?>
			<div class="caption"><span><?php echo $img['caption'] ?></span></div>
			<?php } ?>
		</div>
	<?php } ?>

	</div>
	</section>
	<?php
	}
?>

<?php
/* ==================================
CONTENT FEET
================================== */
if(get_row_layout() == 'content_feet'){
?>
<section class="fc-contentfeet container-fluid d-flex justify-content-center <?php echo get_sub_field('extra_classes') ?>">

	<div class="content-container d-flex flex-column flex-md-row justify-content-start align-items-center">
		<?php
		$feet = get_sub_field('feet');

		for($fti = 0; $fti < count($feet); $fti++){
			$side = 'right';

			if($fti === 0){
				$side = 'left';
			}
		?>
		<a class="col-12 col-md-6 d-flex <?php echo $side ?>" href="<?php echo $feet[$fti]['url'] ?>">
			<div class="info d-flex flex-column flex-lg-row align-items-start justify-content-lg-between align-items-lg-end">

				<div class="title"><?php echo $feet[$fti]['display_text'] ?></div>

				<div class="link"><?php echo $feet[$fti]['cta_text'] ?></div>
			</div>
		</a>
		<?php
		}
		?>
	</div>
</section>
<?php
}
?>

<?php
	/* ==================================
	FEATURED BULLETS
	================================== */
	if(get_row_layout() == 'featured_bullets'){
	?>
	<section class="fc-featured-bullets container-fluid d-flex justify-content-center">

	<div class="content-container d-flex flex-column flex-md-row">
		<div class="title col-lg-6">
			<h2><?php echo get_sub_field('title'); ?></h2>
		</div>
		<div class="content col-lg-6">
			<ul class="bullets">
				<?php for($bi = 0; $bi < count(get_sub_field('bulletpoints')); $bi++){ 
					$bp = 	get_sub_field('bulletpoints')[$bi];
				?>
				<li class="text"><?php echo $bp['text'] ?></li>
				<?php } ?>
			</ul>
		</div>

	</div>
	</section>
	<?php
	}
?>

<?php
	/* ==================================
	BUSINESS CARDS
	================================== */
	if(get_row_layout() == 'business_cards'){
	?>
	<section class="fc-business-cards container-fluid d-flex justify-content-center">

	<div class="content-container d-flex flex-column">
		<div class="info d-flex flex-column">
		<?php if(get_sub_field('label')){ ?>
			<div class="label"><p><?php echo get_sub_field('label'); ?></p></div>
		<?php }  ?>
		<?php if(get_sub_field('title')){ ?>
			<div class="title"><h2><?php echo get_sub_field('title'); ?></h2></div>
		<?php }  ?>
		</div>

		<div class="content d-grid d-md-flex d-xl-grid">
			<?php
				for($cdi = 0; $cdi < count(get_sub_field('cards')); $cdi++){
					$card = get_sub_field('cards')[$cdi];
			?>
			<a href="<?php echo $card['link'] ?>" target="_blank" class="bus-card">
				<?php if($card['logo']){ ?>
				<div class="img"><img src="<?php echo $card['logo']; ?>" alt="" class="logo-img"></div>
				<?php } ?>

				<div class="name"><p><?php echo $card['name'] ?></p></div>

				<div class="cta textlink"><span><?php echo $card['cta_text']; ?></span></div>
			</a>
			<?php
				}
			?>
		</div>

	</div>
	</section>
	<?php
	}
?>

<?php
	/* ==================================
	1:3 WYSIWYG
	================================== */
	if(get_row_layout() == '1_to_3_wysiwyg'){
	?>
	<section class="fc-1-to-3-wysiwyg container-fluid d-flex justify-content-center <?php if( get_sub_field('top_padding') == true){ echo 'padding-top';} ?> <?php if( get_sub_field('bottom_padding') == true){ echo 'padding-bottom'; } ?>"  style="background-color:<?php echo get_sub_field('background_color'); ?>">

	<div class="content-container d-flex flex-column flex-md-row">
		<div class="left wysiwyg col-12 col-md-6 col-lg-4">
			<?php echo get_sub_field('column_1'); ?>
		</div>

		<div class="right wysiwyg col-12 col-md-6 col-lg-8">
			<?php echo get_sub_field('column_2'); ?>
		</div>

	</div>
	</section>
	<?php
	}
?>

<?php
	/* ==================================
	1:3 INFO & CONTENT
	================================== */
	if(get_row_layout() == '1_to_3_info_content'){
	?>
	<section class="fc-1-to-3-info-content container-fluid d-flex justify-content-center <?php if( get_sub_field('top_padding') == true){ echo 'padding-top'; }?> <?php if( get_sub_field('bottom_padding') == true){ echo 'padding-bottom';} ?>"   style="background-color:<?php echo get_sub_field('background_color'); ?>">

	<div class="content-container d-flex flex-column flex-md-row">
		<div class="left wysiwyg col-12 col-md-4">
			<?php 
				$items = get_sub_field('column_1');

				foreach($items as $item){

					if($item['content_type'] == 'textblock'){
			?>
			<div class="textblock"><?php echo $item['text_block']; ?></div>
			<?php
					}elseif($item['content_type'] == 'icongroup'){
			?>
			<div class="icongroup">
				<div class="subheader"><?php echo $item['icon_subheader'] ?></div>

				<ul class='icons'>
				<?php 
				$icons = $item['icon_group'];

				foreach($icons as $icon){
				?>
				<li><a href="<?php echo $icon['url'] ?>" target="_blank" class="icon <?php echo $icon['extra_classes'] ?>"><div class="background" style="background:url(<?php echo $icon['image'] ?>)no-repeat center;background-size:contain;"></div></a></li>
				<?php
				}
				?>
				</ul>
			</div>
			<?php
					}elseif($item['content_type'] == 'link'){
			?>
			<div class="link">
				<a href="<?php echo $item['link_url']; ?>" target="<?php if($item['open_in_new_window'] === true){ echo '_blank'; }else{ echo '_self'; } ?>"><?php echo $item['link_text']; ?></a>
			</div>
			<?php
					}
				}

			?>
		</div>

		<div class="right wysiwyg col-12 col-md-8">
			<?php 
			$rightdata = get_sub_field('column_2');

			foreach($rightdata as $data){
				if($data['wysiwyg']){
			?>

			<div class="wysiwyg-container">
				<?php echo $data['wysiwyg']; ?>
			</div>
			<?php
				}
			}
			?>
		</div>

	</div>
	</section>
	<?php
	}
?>

<?php
	/* ==================================
	CONTENT WIDTH PHOTO & INFO
	================================== */
	if(get_row_layout() == 'content_width_photo_&_info'){
	?>
	<section class="fc-content-width-photo-info container-fluid d-flex justify-content-center" style="background:<?php echo get_sub_field('section_background_color') ?>">

	<div class="content-container d-flex flex-column flex-md-row">
		<?php for($bli = 0; $bli < count( get_sub_field('blocks') ); $bli++ ){
			$block = get_sub_field('blocks')[$bli];
		?>
		<div class="half col-md-6 d-flex <?php if($bli == 0){ echo 'left'; }else{ echo 'right'; } ?> <?php echo $block['type']; ?>">
			<?php if($block['type'] == 'photo'){ ?>
				<div class="background" style="background:url(<?php echo $block['photo'] ?>)center no-repeat;background-size:cover;"></div>
			<?php }else{ ?>
				<div class="background" style="background:<?php echo $block['background_color'] ?>;"></div>
				<div class="label"><?php echo $block['label'] ?></div>
				<div class="title"><?php echo $block['title'] ?></div>
				<div class="description"><?php echo $block['description'] ?></div>

			<?php } ?>
		</div>
		<?php } ?>

	</div>
	</section>
	<?php
	}
?>
		
<?php
	/* ==================================
	EXPANDABLE
	================================== */
	if(get_row_layout() == 'expandable'){
	?>
	<section class="fc-expandable container-fluid d-flex justify-content-center" style="background:<?php echo get_sub_field('background_color'); ?>">

	<div class="content-container d-flex flex-column justify-content-center">
		<div class="header">
			<div class="label"><?php echo get_sub_field('label'); ?></div>
			<div class="title"><?php echo get_sub_field('title'); ?></div>
		</div>

		<div class="content">
			<?php 
				$info = get_sub_field('q_a');
				$index = 1;

				foreach($info as $item){
				?>
				<div class="item">
					<div class="question">
						<div class="number"><?php echo $index ?></div>
						<div class="text"><?php echo $item['question'] ?></div>
						<div class="toggle"></div>
					</div>
					<div class="answer">
						<div class="answer-text"><?php echo $item['answer'] ?></div>
					</div>
				</div>
				<?php
					$index++;
				}
			?>
		</div>

	</div>
	</section>
	<?php
	}
?>

<?php
	/* ==================================
	IFRAME
	================================== */
	if(get_row_layout() == 'iframe'){
	?>
	<section class="fc-iframe container-fluid d-flex justify-content-center">

	<div class="content-container d-flex">

	<iframe allowtransparency="true" frameborder="0" id="gnewtonIframe" scrolling="no" src="https://recruitingbypaycor.com/career/CareerHome.action?clientId=8a7883c673b552290173dedf10960e34&amp;parentUrl=https%3A%2F%2Fperfectiongroup.com%2Fcareers%2F&amp;gns=" width="100%" style="overflow: hidden; height: 722px;"></iframe>
	</div>
	</section>
	<?php
	}
?>

<?php
	/* ==================================
	ITEM SHOWCASE
	================================== */
	if(get_row_layout() == 'item_showcase'){
	?>
	<section class="fc-item-showcase container-fluid d-flex justify-content-center">

	<div class="content-container d-flex flex-column align-items-center">
		<div class="title">
			<h1><?php echo get_sub_field('title'); ?></h1>
		</div>

		<div class="case d-flex justify-content-center">
			<?php
				foreach( get_sub_field('items') as $item){
			?>
			<div class="item col-6 col-sm-4 col-md-3">
				<div class="label"><p><?php echo $item['label'] ?></p></div>
				<div class="img" style="background:url(<?php echo $item['image'] ?>)no-repeat center; background-size:contain;"></div>
			</div>
			<?php
				}
			?>
		</div>
	</div>
	</section>
	<?php
	}
?>

<?php
	/* ==================================
	BIOGRAPHIES
	================================== */
	if(get_row_layout() == 'biographies'){
	?>
	<section class="fc-biographies container-fluid d-flex justify-content-center">

	<div class="content-container d-flex flex-column align-items-center">

		<div class="case d-flex justify-content-center">
			<?php
				foreach( get_sub_field('partner') as $item){
			?>
			<div class="item col-12 col-md-6">
				<div class="img"><img src="<?php echo $item['logo'] ?>" alt=""></div>
				<div class="title"><p><?php echo $item['name'] ?></p></div>

				<div class="description wysiwyg">
					<?php echo $item['description'] ?>
				</div>
			</div>
			<?php
				}
			?>
		</div>
	</div>
	</section>
	<?php
	}
?>

<?php
	/* ==================================
	NEWS INTRO & BODY
	================================== */
	if(get_row_layout() == 'news_intro_body'){
	?>
	<section class="fc-news-intro-body container-fluid d-flex justify-content-center <?php if(get_sub_field('padding_top')){echo 'padding-top'; } ?> <?php if(get_sub_field('padding_bottom')){echo 'padding-bottom';} ?>">

	<div class="content-container d-flex">
		<?php if( get_sub_field('show_title')){ ?>
		<div class="title"><?php echo get_sub_field('title'); ?></div>	
		<?php } ?>

		<div class="wysiwyg"><?php echo get_sub_field('body_text'); ?></div>

	</div>
	</section>
	<?php
	}
?>

<?php
	/* ==================================
	RELATED POSTS
	================================== */
	if(get_row_layout() == 'related_posts'){
	?>
	<section class="fc-related-posts container-fluid d-flex justify-content-center">

	<div class="content-container d-flex">

		<div class="title"><?php echo get_sub_field('title'); ?></div>

		<div class="posts-container">
		<?php 
		if( get_sub_field('posts') ){ 
			//curated
			
			foreach( get_sub_field('posts') as $post){
				$pid = $post['post']->ID;
		?>
		<a href="<?php the_permalink($pid); ?>" class="post-item">
			<div class="title"><?php echo get_field('displayed_title', $pid); ?></div>
			<div class="cta textlink"><span>Read More</span></div>
		</a>
		<?php
			}
		?>
			
		<?php }else{ 
			//auto-populate	

			// Query before section. Hide section if no posts are eligible
			$posts = get_posts(array(
				'posts_per_page'	=> -1,
				'post_type'			=> 'news-article',
				'orderby'          => 'date',
				'order'            => 'DESC'
			));
			
			$index = 0;
			foreach( $posts as $post ): 
				
				setup_postdata( $post );

				if($index < 3){
				?>
				<a href="<?php the_permalink(); ?>" class="post-item">
					<div class="title"><?php echo $post->post_title; ?></div>
					<div class="cta textlink"><span>Read More</span></div>
				</a>
				
			<?php 
				}
				$index++;
			endforeach; ?>

			<?php wp_reset_query();   // Restore global post data stomped by the_post(). ?>
			
		<?php } ?>
		</div>
	</div>
	</section>
	<?php
	}
?>