<?php
	global $themePrefix, $wpdb;

	/* Ico */
	$config = array(
		'id'				=> 'meta_skills',
		'title'				=> 'Icon',
		'pages'				=> array('clientes'),
		'context'			=> 'normal',
		'fields'			=> array(),
		'local_images'		=> false,
		'use_with_theme'	=> true
	);
	$client_meta = new Tax_Meta_Class($config);
	// Icon
	$client_meta->addImage(
		$themePrefix.'icon',
		array('name'=> 'Icon')
	);

	$client_meta->Finish();
?>