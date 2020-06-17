<!DOCTYPE HTML>
<html class="js" lang="en">
<head>
	<title><?php wp_title( '|' ); ?></title>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=0"/>
	<meta name="description" content="We are Atlas"/>
	<meta name="keywords" content="data,atlas"/>
	<meta name="author" content="Atlas"/>
	<meta name="robots" content="all"/>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>"/>
	<link rel="shortcut icon" type="image/png" href="<?php bloginfo('template_directory') ?>/img/favicon.ico"/>
	<link rel="apple-touch-icon" sizes="180x180" href="<?php bloginfo('template_directory') ?>/img/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php bloginfo('template_directory') ?>/img/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php bloginfo('template_directory') ?>/img/favicon-16x16.png">
	<link rel="manifest" href="<?php bloginfo('template_directory') ?>/site.webmanifest">
	<link rel="stylesheet" href="https://use.typekit.net/ljs0hpj.css">
	<link href="https://fonts.googleapis.com/css2?family=Roboto+Mono&family=Roboto:ital,wght@0,400;0,500;1,400&display=swap" rel="stylesheet">
	<?php wp_head(); ?>
	<?php echo get_template_part('parts/analytics'); ?>
</head>

<div id="preloader" class="preloader">
	<img src="<?php bloginfo('template_directory') ?>/img/oval.svg" alt="Loading" class="loading-img">
</div>

<body <?php body_class(); ?>>

	<?php

	$navMain = array(
		'theme_location'  => 'main',
		'menu'            => 'main',
		'container'       => 'div',
		'menu_class'      => 'menu',
		'echo'            => true,
		'fallback_cb'     => 'wp_page_menu',
		'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
		'depth'           => 0,
		'walker'          => ''
	);

	$navMobile = array(
		'theme_location'  => 'mobile',
		'menu'            => 'mobile',
		'container'       => 'div',
		'menu_class'      => 'menu',
		'echo'            => true,
		'fallback_cb'     => 'wp_page_menu',
		'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
		'depth'           => 0,
		'walker'          => ''
	);

	?>

	<header class="nav" id="nav">
		<!-- mobile nav -->
		<nav class="page-nav mobile">
			<div class="inner">
				<a class="nav-logo" href="<?php echo bloginfo('url'); ?>/">
					<svg width="133" height="57" viewBox="0 0 133 57" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M50.2253 11.9023H42.8791L30.2211 45.9881H36.6179L39.8502 36.9412H52.4404L55.6275 45.9881H62.4538L52.011 16.9741L50.2253 11.9023ZM41.7263 31.5496L46.2696 18.9617L49.7732 28.9681L50.6773 31.5496H41.7263Z" fill="white"/>
						<path d="M84.6958 11.9023H78.3668V45.9881H84.6958V11.9023Z" fill="white"/>
						<path d="M99.5237 21.3838C99.4559 21.3838 99.3881 21.3838 99.3203 21.3838C92.6974 21.4523 88.5384 25.0619 88.3349 30.4764H94.5509V30.1108C94.6866 28.169 95.9298 26.6611 98.5292 26.387C98.8456 26.3413 99.1395 26.3413 99.4559 26.3413C102.688 26.3413 103.954 27.6664 103.954 29.1056V29.3569C103.818 30.5449 102.01 30.8419 98.5066 31.5044C98.0771 31.5958 97.6476 31.6644 97.173 31.7557C91.8159 32.9437 87.8151 34.1545 87.8151 39.5918C87.8151 43.7954 91.0022 46.6054 96.1106 46.6054C98.5744 46.6054 100.631 45.9429 102.191 44.6864C102.869 44.1381 103.457 43.4756 103.909 42.7217L103.954 46.6054L109.921 43.0872V30.7962C109.967 24.2395 106.011 21.3838 99.5237 21.3838ZM103.977 36.005C103.886 38.9064 102.485 40.5742 100.722 41.3966C99.7272 41.8307 98.6648 42.0591 97.6024 42.0363C95.4325 42.0363 94.1667 40.9169 94.1667 39.272C94.1667 37.1245 95.9976 36.302 98.4162 35.6852C98.6196 35.6395 98.823 35.571 99.0491 35.5253C100.857 35.0912 102.756 34.68 103.999 33.9489L103.977 36.005Z" fill="white"/>
						<path d="M124.026 31.3436C119.867 30.5212 118.511 30.2698 118.511 28.625C118.511 27.1857 119.935 26.2262 122.15 26.2262C124.456 26.1576 126.603 27.2999 127.869 29.2418L132.819 26.5917C130.31 23.1648 126.309 21.1773 122.082 21.2686C119.867 21.223 117.674 21.8855 115.821 23.142C113.809 24.5584 112.566 26.6831 112.566 29.0819C112.566 31.8462 113.945 33.5596 115.889 34.6791C117.448 35.5015 119.121 36.0727 120.862 36.3925C124.365 37.1692 126.987 37.4662 126.987 39.1568C126.987 40.7332 125.631 41.7155 123.393 41.7155C121.02 41.7612 118.759 40.6418 117.358 38.6999L114.42 40.3905L112.408 41.5556C112.724 41.9897 113.086 42.4009 113.47 42.8121C115.731 45.1424 119.031 46.6731 123.235 46.6731C128.863 46.6731 133 43.2462 133 38.6999C133.045 33.8109 128.343 32.166 124.026 31.3436Z" fill="white"/>
						<path d="M70.4781 29.0366V24.6731H75.2475V19.5557H70.5233V11.9023L64.3977 15.4434V19.5328H61.0072V24.6731H64.3977V29.0366V29.9504V39.5913C64.4656 41.9901 64.8498 43.7264 66.1608 44.7773C67.0198 45.4627 68.2856 45.8739 70.1165 45.9881H71.9473H74.9762V40.7108H72.196C71.0206 40.6651 70.4781 40.1396 70.4781 38.9745V29.9504V29.0366Z" fill="white"/>
						<path d="M12.8162 57C15.0508 57 16.8622 55.1692 16.8622 52.9107C16.8622 50.6522 15.0508 48.8213 12.8162 48.8213C10.5816 48.8213 8.77014 50.6522 8.77014 52.9107C8.77014 55.1692 10.5816 57 12.8162 57Z" fill="white"/>
						<path d="M12.8163 43.7261C16.3741 43.7261 19.2583 40.8111 19.2583 37.2151C19.2583 33.6192 16.3741 30.7041 12.8163 30.7041C9.25846 30.7041 6.37427 33.6192 6.37427 37.2151C6.37427 40.8111 9.25846 43.7261 12.8163 43.7261Z" fill="white"/>
						<path class="green-circle" d="M12.8162 0C5.74132 0 0 5.80281 0 12.9535C0 20.1042 5.74132 25.907 12.8162 25.907C19.8912 25.907 25.6325 20.1042 25.6325 12.9535C25.6325 5.80281 19.8912 0 12.8162 0ZM20.7501 12.9535C20.7501 17.3856 17.2013 20.9723 12.8162 20.9723C8.43115 20.9723 4.88238 17.3856 4.88238 12.9535C4.88238 8.52144 8.43115 4.93467 12.8162 4.93467C17.2013 4.95752 20.7501 8.54429 20.7501 12.9535Z" fill="#ACF43B"/>
					</svg>
				</a>

				<div class="nav-top-links">

					<a class="enterprise" href="<?php echo bloginfo('url'); ?>/enterprise/" title="Enterprise">Enterprise</a>

					<a class="try-now" href="#" title="Try now">Try now
						<svg class="try-now-btn-border" viewBox="0 0 129 50" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
							<rect x="1" y="1" width="127" height="48" rx="24" stroke="url(#try-now-border-mobile)" stroke-width="2"/>
							<defs>
								<linearGradient id="try-now-border-mobile" x1="63.4882" y1="-6.99803" x2="52.606" y2="55.059" gradientUnits="userSpaceOnUse">
									<stop stop-color="#76D3B6"/>
									<stop offset="1" stop-color="#ACF438"/>
								</linearGradient>
							</defs>
						</svg>

						<svg class="try-now-btn-background" viewBox="0 0 129 50" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
							<rect x="1" y="1" width="127" height="48" rx="24" fill="url(#try-now-background-mobile)"/>
							<defs>
								<linearGradient id="try-now-background-mobile" x1="0.148276" y1="49.9426" x2="128.852" y2="49.9428" gradientUnits="userSpaceOnUse">
									<stop stop-color="#ACF438"/>
									<stop offset="1" stop-color="#76D3B6"/>
								</linearGradient>
							</defs>
						</svg>
					</a>

					<!-- Added button to trigger MOBILE menu -->
					<!-- Added button to trigger MOBILE menu -->
					<!-- Added button to trigger MOBILE menu -->
					<button aria-label="menu" class="menu-toggler" title="Menu" id="mb-menu-toggler">
					<span class="menu-toggler-bg mb"></span> 
					<span class="menu-toggler-expand mb"></span>
						<svg viewBox="0 0 70 70" width="48" height="48" class="menu-toggler-wrap mb">
							<circle r="34" cx="35" cy="35"></circle>
						</svg>
						<div class="burger mb">
							<span class="burger-slice top mb"></span>
							<span class="burger-slice middle mb"></span>
							<span class="burger-slice bottom mb"></span>
						</div>				
					</button>
					<!-- END END END -->
				</div>

			</div>

			<div class="nav-overlay">
				<div class="inside">
					<?php wp_nav_menu( $navMobile ); ?>
				</div>
				<svg class="nav-scroll-indicator" width="19" height="12" viewBox="0 0 19 12" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M18 1.58398L9.97917 9.60482C9.97917 9.60482 5.09066 4.71631 1.95833 1.58398" stroke="white" stroke-width="2" stroke-linecap="round"/>
				</svg>
			</div>

		</nav>
		<!-- end mobile nav -->
		<!-- desktop nav -->
		<nav class="page-nav desktop">
			<div class="inner">
				<a class="nav-logo" href="<?php echo bloginfo('url'); ?>/">
					<svg width="133" height="57" viewBox="0 0 133 57" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M50.2253 11.9023H42.8791L30.2211 45.9881H36.6179L39.8502 36.9412H52.4404L55.6275 45.9881H62.4538L52.011 16.9741L50.2253 11.9023ZM41.7263 31.5496L46.2696 18.9617L49.7732 28.9681L50.6773 31.5496H41.7263Z" fill="white"/>
						<path d="M84.6958 11.9023H78.3668V45.9881H84.6958V11.9023Z" fill="white"/>
						<path d="M99.5237 21.3838C99.4559 21.3838 99.3881 21.3838 99.3203 21.3838C92.6974 21.4523 88.5384 25.0619 88.3349 30.4764H94.5509V30.1108C94.6866 28.169 95.9298 26.6611 98.5292 26.387C98.8456 26.3413 99.1395 26.3413 99.4559 26.3413C102.688 26.3413 103.954 27.6664 103.954 29.1056V29.3569C103.818 30.5449 102.01 30.8419 98.5066 31.5044C98.0771 31.5958 97.6476 31.6644 97.173 31.7557C91.8159 32.9437 87.8151 34.1545 87.8151 39.5918C87.8151 43.7954 91.0022 46.6054 96.1106 46.6054C98.5744 46.6054 100.631 45.9429 102.191 44.6864C102.869 44.1381 103.457 43.4756 103.909 42.7217L103.954 46.6054L109.921 43.0872V30.7962C109.967 24.2395 106.011 21.3838 99.5237 21.3838ZM103.977 36.005C103.886 38.9064 102.485 40.5742 100.722 41.3966C99.7272 41.8307 98.6648 42.0591 97.6024 42.0363C95.4325 42.0363 94.1667 40.9169 94.1667 39.272C94.1667 37.1245 95.9976 36.302 98.4162 35.6852C98.6196 35.6395 98.823 35.571 99.0491 35.5253C100.857 35.0912 102.756 34.68 103.999 33.9489L103.977 36.005Z" fill="white"/>
						<path d="M124.026 31.3436C119.867 30.5212 118.511 30.2698 118.511 28.625C118.511 27.1857 119.935 26.2262 122.15 26.2262C124.456 26.1576 126.603 27.2999 127.869 29.2418L132.819 26.5917C130.31 23.1648 126.309 21.1773 122.082 21.2686C119.867 21.223 117.674 21.8855 115.821 23.142C113.809 24.5584 112.566 26.6831 112.566 29.0819C112.566 31.8462 113.945 33.5596 115.889 34.6791C117.448 35.5015 119.121 36.0727 120.862 36.3925C124.365 37.1692 126.987 37.4662 126.987 39.1568C126.987 40.7332 125.631 41.7155 123.393 41.7155C121.02 41.7612 118.759 40.6418 117.358 38.6999L114.42 40.3905L112.408 41.5556C112.724 41.9897 113.086 42.4009 113.47 42.8121C115.731 45.1424 119.031 46.6731 123.235 46.6731C128.863 46.6731 133 43.2462 133 38.6999C133.045 33.8109 128.343 32.166 124.026 31.3436Z" fill="white"/>
						<path d="M70.4781 29.0366V24.6731H75.2475V19.5557H70.5233V11.9023L64.3977 15.4434V19.5328H61.0072V24.6731H64.3977V29.0366V29.9504V39.5913C64.4656 41.9901 64.8498 43.7264 66.1608 44.7773C67.0198 45.4627 68.2856 45.8739 70.1165 45.9881H71.9473H74.9762V40.7108H72.196C71.0206 40.6651 70.4781 40.1396 70.4781 38.9745V29.9504V29.0366Z" fill="white"/>
						<path d="M12.8162 57C15.0508 57 16.8622 55.1692 16.8622 52.9107C16.8622 50.6522 15.0508 48.8213 12.8162 48.8213C10.5816 48.8213 8.77014 50.6522 8.77014 52.9107C8.77014 55.1692 10.5816 57 12.8162 57Z" fill="white"/>
						<path d="M12.8163 43.7261C16.3741 43.7261 19.2583 40.8111 19.2583 37.2151C19.2583 33.6192 16.3741 30.7041 12.8163 30.7041C9.25846 30.7041 6.37427 33.6192 6.37427 37.2151C6.37427 40.8111 9.25846 43.7261 12.8163 43.7261Z" fill="white"/>
						<path class="green-circle" d="M12.8162 0C5.74132 0 0 5.80281 0 12.9535C0 20.1042 5.74132 25.907 12.8162 25.907C19.8912 25.907 25.6325 20.1042 25.6325 12.9535C25.6325 5.80281 19.8912 0 12.8162 0ZM20.7501 12.9535C20.7501 17.3856 17.2013 20.9723 12.8162 20.9723C8.43115 20.9723 4.88238 17.3856 4.88238 12.9535C4.88238 8.52144 8.43115 4.93467 12.8162 4.93467C17.2013 4.95752 20.7501 8.54429 20.7501 12.9535Z" fill="#ACF43B"/>
					</svg>
				</a>

				<div class="nav-top-links">

					<a class="enterprise" href="<?php echo bloginfo('url'); ?>/enterprise/" title="Enterprise">Enterprise</a>

					<a class="try-now" href="#" title="Try now">Try now
						<svg class="try-now-btn-border" viewBox="0 0 129 50" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
							<rect x="1" y="1" width="127" height="48" rx="24" stroke="url(#try-now-border)" stroke-width="2"/>
							<defs>
								<linearGradient id="try-now-border" x1="63.4882" y1="-6.99803" x2="52.606" y2="55.059" gradientUnits="userSpaceOnUse">
									<stop stop-color="#76D3B6"/>
									<stop offset="1" stop-color="#ACF438"/>
								</linearGradient>
							</defs>
						</svg>

						<svg class="try-now-btn-background" viewBox="0 0 129 50" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
							<rect x="1" y="1" width="127" height="48" rx="24" fill="url(#try-now-background)"/>
							<defs>
								<linearGradient id="try-now-background" x1="0.148276" y1="49.9426" x2="128.852" y2="49.9428" gradientUnits="userSpaceOnUse">
									<stop stop-color="#ACF438"/>
									<stop offset="1" stop-color="#76D3B6"/>
								</linearGradient>
							</defs>
						</svg>
					</a>

					<a class="login" href="#" title="login">
						<svg class="login-btn-border" viewBox="0 0 51 52" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
							<circle cx="25.3442" cy="25.9048" r="24.3442" stroke="url(#login-border)" stroke-width="2"/>
							<defs>
								<linearGradient id="login-border" x1="0.0582626" y1="51.1908" x2="50.6302" y2="51.1908" gradientUnits="userSpaceOnUse">
									<stop stop-color="#ACF438"/>
									<stop offset="1" stop-color="#76D3B6"/>
								</linearGradient>
							</defs>
						</svg>
						<svg class="login-btn-icon" width="27" height="30" viewBox="0 0 27 30" fill="none" xmlns="http://www.w3.org/2000/svg">
							<circle cx="13.3443" cy="6.99704" r="5.4365" stroke="white" stroke-width="2"/>
							<path d="M2.15743 24.8487C3.94301 20.4203 8.28025 17.2979 13.3444 17.2979C18.4085 17.2979 22.7457 20.4203 24.5313 24.8487C24.89 25.7383 24.6804 26.5626 24.1047 27.2115C23.5072 27.8851 22.513 28.3547 21.4013 28.3547H5.28748C4.17574 28.3547 3.18151 27.8851 2.58402 27.2115C2.00834 26.5626 1.79872 25.7383 2.15743 24.8487Z" stroke="white" stroke-width="2"/>
						</svg>
					</a>


					<!-- Added button to trigger DESKTOP menu -->
					<!-- Added button to trigger DESKTOP menu -->
					<!-- Added button to trigger DESKTOP menu -->
					<button aria-label="menu" class="menu-toggler" title="Menu" id="dt-menu-toggler">
					<span class="menu-toggler-bg dt"></span>
					<span class="menu-toggler-expand dt"></span>
						<svg viewBox="0 0 70 70" width="48" height="48" class="menu-toggler-wrap dt">
							<circle r="34" cx="35" cy="35"></circle>
						</svg>
						<div class="burger dt">
							<span class="burger-slice top dt"></span>
							<span class="burger-slice middle dt"></span>
							<span class="burger-slice bottom dt"></span>
						</div>				
					</button>
					<!-- END END END -->
				</div>

			</div>


			<!-- DESKTOP Menu HERE -->
			<!-- DESKTOP Menu HERE -->
			<!-- DESKTOP Menu HERE -->
			<div class="nav-overlay">
				<div class="gradient play"></div>
				<div class="gradient edge"></div>
				<div class="gradient optimise"></div>
				<div class="gradient boost"></div>
				<div class="inside">
					<div class="navigations-wrapper">

						<?php wp_nav_menu( $navMain ); ?>
						<!-- Added secondary navigation -->
						<div class="secondary-menu-container">
							<ul>
								<li class="play">
									<a href="<?php echo bloginfo('url'); ?>/play">Play</a>
								</li>
								<li class="edge">
									<a>Edge</a>
									<p class="item-coming-soon"><span></span>Coming Soon</p>
								</li>
								<li class="optimise">
									<a>Optimise</a>
									<p class="item-coming-soon"><span></span>Coming Soon</p>
								</li>
								<li class="boost">
									<a>Boost</a>
									<p class="item-coming-soon"><span></span>Coming Soon</p>
								</li>
							</ul>
						</div>

					</div>
				</div>
				<svg class="nav-scroll-indicator" width="19" height="12" viewBox="0 0 19 12" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M18 1.58398L9.97917 9.60482C9.97917 9.60482 5.09066 4.71631 1.95833 1.58398" stroke="white" stroke-width="2" stroke-linecap="round"/>
				</svg>
			</div>

		</nav>
		<!-- end desktop nav -->
		<!-- end desktop nav -->
		<!-- end desktop nav -->

	</header>

	<main class="content wrapper clearfix">
		<div class="inner-wrapper">
