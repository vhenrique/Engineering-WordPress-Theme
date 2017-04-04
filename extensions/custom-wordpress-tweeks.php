<?php
// New user role to Newsletter
	add_role('newsletter_subscriber', 'Inscrito na NewsLetter', array('read' => false, 'edit_posts' => false, 'delete_posts' => false) ); 

// Newsleter button export
	add_action('admin_init', 'export_newsletter');
	function export_newsletter(){
		add_submenu_page( 'tools.php', 'Exportação de Newsletter', 'Exportar assinantes da Newsletter', 'administrator', 'newsletter?action=export');
	}

// Remove junk from head
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wp_generator');
	remove_action('wp_head', 'feed_links', 2);
	remove_action('wp_head', 'index_rel_link');
	remove_action('wp_head', 'wlwmanifest_link');
	remove_action('wp_head', 'feed_links_extra', 3);
	remove_action('wp_head', 'start_post_rel_link', 10, 0);
	remove_action('wp_head', 'parent_post_rel_link', 10, 0);
	remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);
	
// Add page excerpt
	add_action('init', 'vhs_add_excerpt_to_pages');
	function vhs_add_excerpt_to_pages(){
		add_post_type_support('page', 'excerpt');
	}

// Excerpt limit functions
	add_filter('excerpt_length', 'vhs_excerpt_length');
	function vhs_excerpt_length($length){
		return 15;
	}

	function get_base_excerpt($limit){
		$excerpt = explode(' ', get_the_excerpt(), $limit);
		if(count($excerpt)>=$limit) {
			array_pop($excerpt);
			$excerpt = implode(" ",$excerpt).'...';
		} else {
			$excerpt = implode(" ",$excerpt);
		}
			$excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
			return "<p>".$excerpt."</p>";
	}

// Allow editor to manager widgets and menus
	if(is_admin()){
		$role =& get_role('editor');
		$role->add_cap('edit_theme_options');
		$role->add_cap('manage_options');
		$role->add_cap('manage_polls');
		$role->remove_cap('switch_themes');
	}

// Add rel to wordpress galleries
	add_filter('wp_get_attachment_link', 'vhs_add_gallery_id_rel');
	function vhs_add_gallery_id_rel($link){
		global $post;
		return str_replace('<a href', '<a rel="fancybox" href', $link);
	}

// Remove the WP version from the header
	add_filter('the_generator', 'vhs_remove_wp_version');
	function vhs_remove_wp_version(){
		return '';
	}

// Add a class to the navigation buttons
	add_filter('next_posts_link_attributes', 'vhs_posts_link_attributes');
	add_filter('previous_posts_link_attributes', 'vhs_posts_link_attributes');
	function vhs_posts_link_attributes(){
		return 'class="nav-links"';
	}

// Admin footer info
	function admin_footer(){
	    echo '<div id="wpfooter" role="contentinfo">';
		echo sprintf('<p id="footer-left" class="alignleft"><span id="footer-thankyou">Theme developped by <a href="%s" title="%s" target="_BLANK">vhenrique</a>. Thanks for use!</span></p>', 'http://vhenrique.com', 'Vhenrique portfolio.');
		echo sprintf('<p id="footer-upgrade" class="alignright"><a href="%s" title="%s" target="_BLANK"><img src="%s" width="50px"/></a></p>', 'http://vhenrique.com', 'Vhenrique portfolio.', TEMPLATEURL.'/screenshot.png');
		echo '<div class="clear"></div></div>';
	}
	add_action( 'admin_footer', 'admin_footer' );
	add_filter( 'update_footer', '__return_empty_string', 11 );

// WP Login
	function vhs_wp_login() {
        echo '<style type="text/css">';
        echo 'body.login div#login h1::after{content:"'.get_bloginfo('site_title').'";}';
        echo 'body.login div#login h1{font-size: 50px; color: #FFF;}';
        echo 'body.login {background-image: url('.get_template_directory_uri().'/screenshot.png); background-repeat:no-repeat; background-position:50%; background-size:50%;} body.login div#login h1 a, #nav {display: none;}';
        echo 'body.login form{background:#000;}';
        echo 'body.login form input{color:#cbcbcb;}';
        echo 'body.login form p label{color:#FFF;}';
        echo '</style>';
    }
    add_action( 'login_enqueue_scripts', 'vhs_wp_login' );
?>