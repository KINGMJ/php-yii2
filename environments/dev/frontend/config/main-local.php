<?php

$config = [
	'components' => [
		'request' => [
			// !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
			'cookieValidationKey' => 'testfordev' ,
		] ,
		'db' => [
			'class' => 'yii\db\Connection' ,
			'dsn' => 'mysql:host=host.docker.internal;dbname=yii2advanced' ,
			'username' => 'root' ,
			'password' => 'leangoo123' ,
			'charset' => 'utf8' ,
		] ,
		'mailer' => [
			'class' => 'yii\swiftmailer\Mailer' ,
			'viewPath' => '@common/mail' ,
			// send all mails to a file by default. You have to set
			// 'useFileTransport' to false and configure a transport
			// for the mailer to send real emails.
			'useFileTransport' => TRUE ,
		] ,
	]
];

if ( ! YII_ENV_TEST) {
	// configuration adjustments for 'dev' environment
	$config['bootstrap'][] = 'debug';
	$config['modules']['debug'] = [
		'class' => 'yii\debug\Module' ,
	];

	$config['bootstrap'][] = 'gii';
	$config['modules']['gii'] = [
		'class' => 'yii\gii\Module' ,
	];
}

return $config;
