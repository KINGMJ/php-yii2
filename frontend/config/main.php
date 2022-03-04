<?php
$params = array_merge(
	require __DIR__ . '/../../common/config/params.php' ,
	require __DIR__ . '/../../common/config/params-local.php' ,
	require __DIR__ . '/params.php' ,
	require __DIR__ . '/params-local.php'
);

return [
	'id' => 'app-frontend' ,
	'basePath' => dirname(__DIR__) ,
	'bootstrap' => ['log'] ,
	'controllerNamespace' => 'frontend\controllers' ,
	'components' => [
		'request' => [
			'csrfParam' => '_csrf' ,
			'enableCsrfValidation' => FALSE ,
		] ,
		'user' => [
			'identityClass' => 'common\models\User' ,
			'enableAutoLogin' => TRUE ,
			'identityCookie' => ['name' => '_identity-frontend' , 'httpOnly' => TRUE] ,
		] ,
		'session' => [
			'name' => 'advanced-frontend' ,
			'class' => 'yii\redis\Session' ,
			'redis' => [
				'hostname' => 'redis5' ,
				'port' => 6379 ,
				'password' => 123456 ,
				'database' => 0 ,
			] ,
		] ,
		'log' => [
			'traceLevel' => YII_DEBUG ? 3 : 0 ,
			'targets' => [
				[
					'class' => 'yii\log\FileTarget' ,
					'levels' => ['error' , 'warning'] ,
					'logFile' => '@runtime/logs/test.log' ,
				] ,
			] ,
		] ,
		'errorHandler' => [
			'errorAction' => 'site/error' ,
		] ,

		'urlManager' => [
			'enablePrettyUrl' => TRUE ,
			'showScriptName' => FALSE ,
			'rules' => [
			] ,
		]
		,
	] ,
	'params' => $params ,

	'modules' => [
		'accounts' => 'frontend\modules\accounts\Module'
	] ,

	'as main-app-filter' => [
		'class' => frontend\filters\MainAppFilter::class ,
		'only' => ['accounts/accounts/index']
	] ,
];
