<?php 
// Clients
	add_action( 'init', 'create_custom_tax_clients');
	function create_custom_tax_clients() {
		$singular_label = 'cliente';
		$labels = array(
			'name'					=> 'Clientes',
			'singular_name'			=> $singular_name,
			'search_items'			=> __( 'Buscar' ),
			'all_items'				=> __( 'Todos' ),
			'edit_item'				=> __( 'Editar' ),
			'update_item'			=> __( 'Atualziar' ),
			'add_new_item'			=> __( 'Novo ' ) . $singular_label,
			'new_item_name'			=> __( 'Novo ' ) . $singular_label,
			'menu_name'				=> __( 'Clientes' )
		);
		$args = array(
			'hierarchical'			=> true,
			'labels'				=> $labels,
			'show_ui'				=> true,
			'show_admin_column'		=> true,
			'capability_type'     	=> 'post',
			'query_var'				=> true,
			'rewrite'				=> array( 'slug' => 'clientes' ),
			'has_archive'			=> false,
			'exclude_from_search'	=> true
		);
		register_taxonomy('clientes', 'obras', $args );
	}

function add_post_clientes_columns($columns){
    array_unshift($columns, 'Icon');
    return $columns;
}
add_filter('manage_edit-clientes_columns', 'add_post_clientes_columns');

function add_post_clientes_column_content($value, $content, $term_id){
	global $themePrefix;
	$ico = get_tax_meta($term_id, $themePrefix.'icon');
	if(!empty($ico['url'])){
		$content = wp_get_attachment_image($ico['id'], $themePrefix.'clients');
	}
    return $content;
}
add_filter('manage_clientes_custom_column', 'add_post_clientes_column_content', 10 , 3);


// Projects
	add_action( 'init', 'create_custom_tax_projects');
	function create_custom_tax_projects() {
		$singular_label = 'projeto';
		$labels = array(
			'name'					=> 'Projetos',
			'singular_name'			=> $singular_name,
			'search_items'			=> __( 'Buscar' ),
			'all_items'				=> __( 'Todos' ),
			'edit_item'				=> __( 'Editar' ),
			'update_item'			=> __( 'Atualziar' ),
			'add_new_item'			=> __( 'Novo ' ) . $singular_label,
			'new_item_name'			=> __( 'Novo ' ) . $singular_label,
			'menu_name'				=> __( 'Projetos' )
		);
		$args = array(
			'hierarchical'			=> true,
			'labels'				=> $labels,
			'show_ui'				=> true,
			'show_admin_column'		=> true,
			'capability_type'     	=> 'post',
			'query_var'				=> true,
			'rewrite'				=> array( 'slug' => 'projetos' ),
			'has_archive'			=> false,
			'exclude_from_search'	=> true
		);
		register_taxonomy('projetos', 'obras', $args );
	}
?>