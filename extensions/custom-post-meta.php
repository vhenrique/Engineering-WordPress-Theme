<?php
/**
 * Include and setup custom metaboxes and fields.
 *
 * @category YourThemeOrPlugin
 * @package  Metaboxes
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/webdevstudios/Custom-Metaboxes-and-Fields-for-WordPress
 */

add_filter( 'cmb_meta_boxes', 'cmb_sample_metaboxes' );
/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 */
function cmb_sample_metaboxes( array $meta_boxes ) {
	global $themePrefix;

	// Opinion
	$meta_boxes['slider_metabox'] = array(
		'id'         => 'slider_metabox',
		'title'      => 'Itens adicionais',
		'pages'      => array('slides'),
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true,
		'fields'     => array(
			array(
				'name' => 'Url',
				'desc' => 'Link de redirecionaemnto do botão.',
				'id'   => $themePrefix . 'urlLink',
				'type' => 'text',
			),
			array(
				'name' => 'Texto do botão',
				'desc' => 'Informe o texto do botão. Ex: Clique aqui. <b>Padrão "Veja mais"</b>',
				'id'   => $themePrefix . 'urlText',
				'type' => 'text',
			)
		)
	);

	// Opinion
	$meta_boxes['opinion_metabox'] = array(
		'id'         => 'opinion_metabox',
		'title'      => 'Itens adicionais',
		'pages'      => array('opinioes'),
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true,
		'fields'     => array(
			array(
				'name' => 'Autor',
				'desc' => 'Informe o nome da pessoa.',
				'id'   => $themePrefix . 'opinion_author',
				'type' => 'text',
			)
		)
	);	

	return $meta_boxes;
}

// Initialize the metabox class.
add_action( 'init', 'cmb_initialize_cmb_meta_boxes', 9999 );
function cmb_initialize_cmb_meta_boxes() {
	if ( ! class_exists( 'cmb_Meta_Box' ) )
		require_once 'custom-metaboxes/init.php';
}