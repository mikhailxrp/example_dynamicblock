<?php
// This file is generated. Do not modify it manually.
return array(
	'dynamicblock' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'wdm/dynamicblock',
		'version' => '0.1.0',
		'title' => 'Dynamic Block',
		'category' => 'text',
		'icon' => 'welcome-learn-more',
		'description' => 'New gutenberg block.',
		'example' => array(
			
		),
		'supports' => array(
			'html' => false
		),
		'textdomain' => 'dynamicblock',
		'editorScript' => 'file:./index.js',
		'editorStyle' => 'file:./index.css',
		'style' => 'file:./style-index.css',
		'viewScript' => 'file:./view.js',
		'attributes' => array(
			'postsPerPage' => array(
				'type' => 'number',
				'default' => 3
			),
			'showImage' => array(
				'type' => 'boolean',
				'default' => true
			)
		)
	)
);
