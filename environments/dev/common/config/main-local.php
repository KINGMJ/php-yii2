<?php
return [
	'components' => [
		'db' => [
			'class' => 'yii\db\Connection' ,
			'dsn' => 'mysql:host=host.docker.internal;port=3307;dbname=yii2advanced' ,
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
		'urlManager' => [
			'enablePrettyUrl' => TRUE ,
			'showScriptName' => FALSE ,
			'rules' => [
			] ,
		] ,
	] ,
];
