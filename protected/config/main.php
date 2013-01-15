<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
Yii::setPathOfAlias('templates', Yii::app()->basePath.'/data/excel_templates');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Semamed',

    'theme'=>'bootstrap',
//    'theme'=>'classic',

	// preloading 'log' component
	'preload'=>array(
//        'log',
        'bootstrap',
    ),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
        'application.modules.user.*',
        'application.modules.user.models.*',
        'application.modules.user.components.*',
        'application.modules.rights.*',
        'application.modules.rights.models.*',
        'application.modules.rights.components.*',
//        'ext.bootstrap-theme.widgets.*',
//        'ext.bootstrap-theme.helpers.*',
//        'ext.bootstrap-theme.behaviors.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool

		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'12',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
            'generatorPaths'=>array(
                'bootstrap.gii',
            ),
		),
        'user' => array(
            // названия таблиц взяты по умолчанию, их можно изменить
            'tableUsers' => 'users',
            'tableProfiles' => 'profiles',
            'tableProfileFields' => 'profiles_fields',
        ),
        'rights',

	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
            'class' => 'RWebUser',
			'allowAutoLogin'=>true,
            'loginUrl'=>array('/user/login'),
		),
        'authManager'=>array(
            'class'=>'RDbAuthManager',
            'defaultRoles' => array('Authenticated', 'Guest') // дефолтная роль
        ),
        'bootstrap'=>array(
            'class'=>'ext.bootstrap.components.Bootstrap', // assuming you extracted bootstrap under extensions
//            'responsiveCss' => true,
        ),
		// uncomment the following to enable URLs in path-format
		/*
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),

		*/

		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=semamed',
			'emulatePrepare' => true,
			'username' => 'semamed',
			'password' => '12',
			'charset' => 'utf8',
            'enableProfiling'=>false,
            'enableParamLogging'=>false,
		),

		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
//                    'class'=>'ext.yii-debug-toolbar.YiiDebugToolbarRoute',
					'class'=>'CFileLogRoute',
					'levels'=>'info',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),
);