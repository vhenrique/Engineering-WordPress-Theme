<!doctype html>
<html lang="pt-BR">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="initial-scale=1.0,user-scalable=no,maximum-scale=1,width=device-width">
	<title><?php wp_title('&laquo;', true, 'right'); bloginfo('name'); ?></title>
	<link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo('stylesheet_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<?php wp_head(); 
	global $redux_options, $themePrefix; 
	if(!empty($redux_options[$themePrefix.'favicon_url'])){
		echo '<link href="'.$redux_options[$themePrefix.'favicon_url']['url'].'" rel="shortcut icon" type="image/x-icon" />';
	}
	?>
</head>
<body <?php body_class(); ?>>
	<header class="large-12 paddingUD15 main">
		<div class="row">
			<div class="large-12">
				<a href="<?php echo get_home_url(); ?>" class="large-2 column" title="<?php echo get_bloginfo('name'); ?>" alt="<?php echo get_bloginfo('descrption'); ?>">
					<?php if(!empty($redux_options[$themePrefix.'logo_url']['url'])){
						echo '<img src="'.$redux_options[$themePrefix.'logo_url']['url'].'">';
					} ?>
				</a>
				<div class="large-10 column">
					<div class="large-8 float-right marginBottom15">
						<nav class="large-8 column">
							<?php wp_nav_menu(array('menu'=>'header', 'container'=>'')); 
							if(!empty($redux_options[$themePrefix.'cs_telephone'])){
								echo '<span class="contactPhone"><label>'.$redux_options[$themePrefix.'cs_telephone'].'</label></span>';
								
							} 
							?>
						</nav>
						<div class="large-4 columns searchForm">
							<form method="GET" action="<?php echo get_home_url(); ?>">
								<input type="text" required name="s" class="searchInput" placeholder="Buscar" />
								<input type="submit" value="" />
							</form>
						</div>
					</div>
					<?php wp_nav_menu(array('menu'=>'main', 'container'=>'nav', 'container_class'=>'large-10 column', 'theme_location'=>'Menu')); ?>
					<nav class="large-2 column social">
						<ul class="menu">
						<?php if(!empty($redux_options[$themePrefix.'facebook_url'])){ echo '<li><a href="'.$redux_options[$themePrefix.'facebook_url'].'" class="fb" target="_BLANK" title="Facebook"></a></li>'; } ?>
						<?php if(!empty($redux_options[$themePrefix.'twitter_url'])){ echo '<li><a href="'.$redux_options[$themePrefix.'twitter_url'].'" class="tw" target="_BLANK" title="Twitter"></a></li>'; } ?>
						<?php if(!empty($redux_options[$themePrefix.'linkedin_url'])){ echo '<li><a href="'.$redux_options[$themePrefix.'linkedin_url'].'" class="in" target="_BLANK" title="Linkedin"></a></li>'; } ?>
						</ul>
					</nav>
				</div>
			</div>
		</div>
	</header>
	<main>