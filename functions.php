<?php
// Theme prefix
	global $themePrefix;
	$themePrefix = "_vhs_";

// Define templateurl
	define('TEMPLATEURL', get_template_directory_uri());

// Make theme available for translation
	load_theme_textdomain('lang', TEMPLATEPATH . '/languages');

// Location defaults
	date_default_timezone_set('Brazil/East');
	setlocale(LC_ALL, 'pt_BR');
	define("CHARSET", "utf-8");

// Set content width
	if(!isset($content_width)) $content_width = 640;

// Register navigation menus
	add_theme_support('nav-menus');
	register_nav_menus(array('menu'=>'Menu', 'footer'=>'Rodapé'));

// Register sidebar
	if(function_exists('register_sidebar')){
		register_sidebar(array('name'=>'Sidebar','before_widget'=>'<div class="widget">','after_widget'=>'</div>','before_title'=>'<h3>','after_title'=>'</h3>'));
	}

// Register post thumbnail sizes
	add_theme_support('post-thumbnails', array('solucoes', 'obras', 'blog', 'page', 'slides'));
	add_image_size($themePrefix.'slider', 1920, 320, 'center');
	add_image_size($themePrefix.'singleThumbnail', 1080, false);
	add_image_size($themePrefix.'halfPage', 450, 325, false);
	add_image_size($themePrefix.'archiveListing', 300, false);
	add_image_size($themePrefix.'construction', 180, 140, 'center');
	add_image_size($themePrefix.'clients', 150, false);

// Enqueue scripts
	add_action('wp_enqueue_scripts', 'vhs_enqueue_scripts');
	function vhs_enqueue_scripts(){
		wp_enqueue_script('jquery');
		wp_enqueue_script('slider', get_template_directory_uri().'/assets/js/slider.js', array('jquery'), '', true);
		wp_enqueue_script('newsletter', get_template_directory_uri().'/assets/js/newsletter.js', array('jquery'), '', true);
	} 

// Admin extensions
	$extensions_path = TEMPLATEPATH . '/extensions/';
	if(file_exists($extensions_path . 'custom-post-types.php')) require_once($extensions_path . 'custom-post-types.php');
	if(file_exists($extensions_path . 'custom-post-taxonomies.php')) require_once($extensions_path . 'custom-post-taxonomies.php');
	if(file_exists($extensions_path . 'custom-functions.php')) require_once($extensions_path . 'custom-functions.php');
	if(file_exists($extensions_path . 'custom-wordpress-tweeks.php')) require_once($extensions_path . 'custom-wordpress-tweeks.php');
	if(file_exists($extensions_path . 'tax-meta-class/tax-meta-class.php')) require_once($extensions_path . 'tax-meta-class/tax-meta-class.php');
	if(file_exists($extensions_path . 'custom-term-meta.php')) require_once($extensions_path . 'custom-term-meta.php');

// Custom theme options
	if(!class_exists('ReduxFramework') && file_exists($extensions_path . 'redux/framework.php')) require_once($extensions_path . 'redux/framework.php');
	if(file_exists($extensions_path . 'custom-theme-options.php')) require_once($extensions_path . 'custom-theme-options.php');

// Custom metaboxes
	add_action('init', 'vhs_admin_init');
	function vhs_admin_init(){
		if(file_exists($extensions_path . 'custom-metaboxes/init.php')) require_once($extensions_path . 'custom-metaboxes/init.php');
	}
	if(file_exists($extensions_path . 'custom-post-meta.php')) require_once($extensions_path . 'custom-post-meta.php');


?>