<?php
// Solutions
	add_action('init', 'solutions_register');
	function solutions_register(){
		$singular_label = 'solução';
		$labels = array(
			'name'					=> __('Soluções'),
			'singular_name'			=> __('Solução'),
			'add_new'				=> __('Nova'),
			'add_new_item'			=> __('Nova ').' '.strtolower($singular_label),
			'edit_item'				=> __('Editar').' '.strtolower($singular_label),
			'new_item'				=> __('Nova ').' '.strtolower($singular_label),
			'view_item'				=> __('Ver ').' '.strtolower($singular_label),
			'search_items'			=> __('Buscar ').' '.strtolower($singular_label),
			'not_found'				=> __('Não encotrato'),
			'not_found_in_trash'	=> __('Não encontrato na lixeira'),
		);
		$args = array(
			'labels'				=> $labels,
			'public'				=> true,
			'publicly_queryable'	=> true,
			'show_ui'				=> true,
			'query_var'				=> true,
			'show_in_nav_menus' 	=> true,
			'capability_type'		=> 'post',
			'menu_icon' 			=> 'dashicons-yes',
			'hierarchical'			=> false,
			'menu_position'			=> 7,
			'has_archive'			=> true,
			'exclude_from_search'	=> true,
			'supports'				=> array( 'comments', 'editor', 'excerpt', 'thumbnail', 'title' )
		);
		register_post_type('solucoes', $args);
	}

// Constructions
	add_action('init', 'constructions_register');
	function constructions_register(){
		$singular_label = 'obra';
		$labels = array(
			'name'					=> __('Obras'),
			'singular_name'			=> __('Obra'),
			'add_new'				=> __('Nova'),
			'add_new_item'			=> __('Nova ').' '.strtolower($singular_label),
			'edit_item'				=> __('Editar').' '.strtolower($singular_label),
			'new_item'				=> __('Nova ').' '.strtolower($singular_label),
			'view_item'				=> __('Ver ').' '.strtolower($singular_label),
			'search_items'			=> __('Buscar ').' '.strtolower($singular_label),
			'not_found'				=> __('Não encotrado'),
			'not_found_in_trash'	=> __('Não encontrado na lixeira'),
		);
		$args = array(
			'labels'				=> $labels,
			'public'				=> true,
			'publicly_queryable'	=> true,
			'show_ui'				=> true,
			'query_var'				=> true,
			'show_in_nav_menus' 	=> true,
			'capability_type'		=> 'post',
			'menu_icon' 			=> 'dashicons-hammer',
			'hierarchical'			=> false,
			'menu_position'			=> 7,
			'has_archive'			=> true,
			'exclude_from_search'	=> true,
			'supports'				=> array( 'comments', 'editor', 'thumbnail', 'title' )
		);
		register_post_type('obras', $args);
	}

// Blog
	add_action('init', 'blog_register');
	function blog_register(){
		$singular_label = 'post';
		$labels = array(
			'name'					=> __('Blog'),
			'singular_name'			=> __('Post'),
			'add_new'				=> __('Novo'),
			'add_new_item'			=> __('Novo ').' '.strtolower($singular_label),
			'edit_item'				=> __('Editar').' '.strtolower($singular_label),
			'new_item'				=> __('Novo ').' '.strtolower($singular_label),
			'view_item'				=> __('Ver ').' '.strtolower($singular_label),
			'search_items'			=> __('Buscar ').' '.strtolower($singular_label),
			'not_found'				=> __('Não encotrado'),
			'not_found_in_trash'	=> __('Não encontrado na lixeira'),
		);
		$args = array(
			'labels'				=> $labels,
			'public'				=> true,
			'publicly_queryable'	=> true,
			'show_ui'				=> true,
			'query_var'				=> true,
			'show_in_nav_menus' 	=> true,
			'capability_type'		=> 'post',
			'menu_icon' 			=> 'dashicons-format-aside',
			'hierarchical'			=> false,
			'menu_position'			=> 7,
			'has_archive'			=> true,
			'exclude_from_search'	=> true,
			'supports'				=> array( 'comments', 'editor', 'excerpt', 'thumbnail', 'title' ),
			'taxonomies'			=> array('category')
		);
		register_post_type('blog', $args);
	}

// Blog
	add_action('init', 'slides_register');
	function slides_register(){
		$singular_label = 'slide';
		$labels = array(
			'name'					=> __('Slides'),
			'singular_name'			=> __('Slide'),
			'add_new'				=> __('Novo'),
			'add_new_item'			=> __('Novo ').' '.strtolower($singular_label),
			'edit_item'				=> __('Editar').' '.strtolower($singular_label),
			'new_item'				=> __('Novo ').' '.strtolower($singular_label),
			'view_item'				=> __('Ver ').' '.strtolower($singular_label),
			'search_items'			=> __('Buscar ').' '.strtolower($singular_label),
			'not_found'				=> __('Não encotrado'),
			'not_found_in_trash'	=> __('Não encontrado na lixeira'),
		);
		$args = array(
			'labels'				=> $labels,
			'public'				=> true,
			'publicly_queryable'	=> true,
			'show_ui'				=> true,
			'query_var'				=> true,
			'show_in_nav_menus' 	=> true,
			'capability_type'		=> 'post',
			'menu_icon' 			=> 'dashicons-images-alt',
			'hierarchical'			=> false,
			'menu_position'			=> 7,
			'has_archive'			=> true,
			'exclude_from_search'	=> true,
			'supports'				=> array( 'excerpt', 'thumbnail', 'title' )			
		);
		register_post_type('slides', $args);
	}
?>