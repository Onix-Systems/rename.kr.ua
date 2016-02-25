<?php

return [

		'db' => [

			'server' => '',
			'username' => '',
			'password' => '',
			'database_name' => '',
			'database_type' => 'mysql',
			'charset' => 'utf8'

		],

		'components' => [

			'template_engine' => [
				//name
				'engine_name' => 'php',
				'siteName' => 'Web App',
				'forntend_module_folder' => 'frontend',
				'template_engine_settings' => [
					'smarty' => [
						'compiledDir' => 'runtime/compiled'
					],
					'twig' => [
						'compiledDir' => 'runtime/compiled'
					]
				],
			],

		],

		'production' => false,
		'frontend_module_name' => 'frontend',
		'siteName' => 'Web App'
];
