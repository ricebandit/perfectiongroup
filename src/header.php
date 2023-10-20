<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package perfection
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> >
<?php wp_body_open(); ?>
<div id="page" class="site">
	
	<header class="site-header container-fluid d-flex flex-column">

		<div class="secondary-navigation d-flex justify-content-center">
			<div class="content-container">
				<div class="row">
					<div class="spacer-logo"></div>
					<?php 
					$filler_classes = '';
					if(get_field('header_visible',28)){ 
					?>
					<div class="message col-12 col-lg-4 offset-lg-4"><?php echo get_field('header_message', 28 ) ?></div>
					<?php }else{
						$filler_classes = 'offset-lg-8';
					} ?>
					<div id="sections" class="d-none d-lg-flex col-4 justify-content-end <?php echo $filler_classes ?>">
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'secondary-navigation',
								'menu_id'        => 'top-secondary-menu',
							)
						);
						?>
					</div>
				</div>

			</div>
		</div>

		<div class="mobile-navigation d-flex d-lg-none justify-content-start">
				<div class="content container-fluid d-flex justify-content-start">
					<div class="logo"></div>
					<div class="menu-toggle" data-bs-toggle="offcanvas" role="button" aria-controls="mobile-menu">
						<div class="bar top"></div>
						<div class="bar middle"></div>
						<div class="bar bottom"></div>
					</div>
				</div>
		</div>

		<div class="main-navigation d-none d-lg-flex  justify-content-center">
				<div class="content-container">
					<div class="row">
						<div class="content container d-flex">
							<a class="logo" href="/"></a>
							<div class="navbar navbar-expand-md">

								<?php
								wp_nav_menu(
									array(
										'container_class' => 'menu-main-nav-container collapse navbar-collapse justify-content-center',
										'theme_location' => 'main-navigation',
										'menu_id'        => 'primary-menu',
										'menu_class'				=> 'navbar-nav'
									)
								);
								?>
							</div>
							<div class="cta-container">
								<?php if( count(get_field('nav_ctas', 28 )) > 0 ){ 
									for($i = 0; $i < count(get_field('nav_ctas', 28 )); $i++ ){
										$cta = get_field('nav_ctas', 28 )[$i];
								?>
								<a class="cta <?php echo $cta['style_class']['value']  ?>" href="<?php echo $cta['url'] ?>"><span><?php echo $cta['display_text'] ?></span></a>
								<?php 
										}
									} 
								?>
							</div>
						</div>
					</div>
				</div>
		</div>
	</header><!-- #masthead -->


	<div class="offcanvas offcanvas-end" tab-index="-1" id="mobilemenu" aria-labelledby="mobilemenu-label">
		<div class="container-fluid mt-0 p-0">
			<div class="row justify-content-end">
				<div class="close-btn"></div>
			</div>
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'main-navigation'
				)
			);
			?>

			<form id='searchbar' onsubmit="return onMobileSearch()">
				<input id="search-field" type="text" placeholder="Search"></input>
				<input type="submit" value="Submit">
			</form>
		</div>
	</div>
