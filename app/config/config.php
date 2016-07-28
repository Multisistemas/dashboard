<?php

return new \Phalcon\Config(array(
	'database' => array(
		'adapter'     => 'Mysql',
		'host'        => 'localhost',
		'username'    => 'root',
		'password'    => 'toor',
		'dbname'      => 'dashboard',
	),
	'application' => array(
		'controllersDir' => __DIR__ . '/../../app/controllers/',
		'modelsDir'      => __DIR__ . '/../../app/models/',
		'viewsDir'       => __DIR__ . '/../../app/views/',
		'pluginsDir'     => __DIR__ . '/../../app/plugins/',
		'libraryDir'     => __DIR__ . '/../../app/library/',
		'cacheDir'       => __DIR__ . '/../../app/cache/volt/',
		'baseUri'        => '/',
		'publicUrl'      => 'dashboards.dev/sendmail',
		'debug'          => '999999',
	),
	'opauth'=>array(

		'path' => '/session/loginOpauth/',
	    'callback_url' => 'http://dashboard.dev/session/success/',
	    //'callback_transport' => 'post',
	    'security_salt' => 'LHFmi1lYf3Fyw5W10a44aarx4W1KsVrieQCnpBzzpTBMA5vJidQKDo8pMJbmw22A1C8v',
	    'debug' =>true,

 		'Strategy'=>array(
			/*'facebook' =>array(

			),*/
			'Google' =>array(
				'client_id'		=>'428910823408-6h9b8sajkoqbnvoi0ga7bu4pq0fk81bv.apps.googleusercontent.com',
				'client_secret'	=>'gf0r10aAVr9u7KjPhe9K0u8Z',
				'redectUrl' =>'http://dashboard.dev/session/abc',

			),
			/*'Twitter' =>array(
				'key'		 =>'fz8titsIrWJjeNdkR7d0w',
				'secret'	 =>'66hqNnIyMkW84lp4f7XmcKGAJQk1ffrT2wIyIxP6mQ'

			),*/
		),
	),
	'mail' => array(	
                'fromName' => 'Multisistemas Dashboard',
                'fromEmail' => 'info@multisistemas.com.sv',
                'smtp' => array(
                        'server'	=> 'obsidian.websitewelcome.com',
                        'port' 		=> 465,
                        'security' => 'ssl',
                        'username' => 'info@multisistemas.com.sv',
                        'password' => '%]gS1BMpGxU0',
                )
        ),
));
