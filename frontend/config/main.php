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
	'controllerNamespace' => 'frontend\interfaces\facade' ,
	'components' => [
		'request' => [
			'csrfParam' => '_csrf-frontend' ,
			'enableCsrfValidation' => FALSE ,
			'parsers' => [
				'application/json' => 'yii\web\JsonParser' ,
			]
		] ,
		'response' => [
			'class' => 'yii\web\Response' ,
			'on beforeSend' => function ($event) {
				$response = $event->sender;
				if ($response->data !== NULL &&
					! empty(Yii::$app->request->get('suppress_response_code'))) {
					$response->data = [
						'success' => $response->isSuccessful ,
						'data' => $response->data ,
					];
					$response->statusCode = 200;
				}
			} ,
		] ,
		'user' => [
			'identityClass' => 'common\models\User' ,
			'enableAutoLogin' => TRUE ,
			'identityCookie' => ['name' => '_identity-frontend' , 'httpOnly' => TRUE] ,
		] ,
		'session' => [
			// this is the name of the session cookie used for login on the frontend
			'name' => 'advanced-frontend' ,
		] ,
		'log' => [
			'traceLevel' => YII_DEBUG ? 3 : 0 ,
			'targets' => [
				[
					'class' => 'yii\log\FileTarget' ,
					'levels' => ['error' , 'warning'] ,
				] ,
			] ,
		] ,
		'errorHandler' => [
			'errorAction' => 'site/error' ,
		] ,

		'urlManager' => [
			'enablePrettyUrl' => TRUE ,
			'enableStrictParsing' => TRUE ,
			'showScriptName' => FALSE ,
			'rules' => [
				['class' => 'yii\rest\UrlRule' , 'controller' => 'project'] ,
			] ,
		]
		,
	] ,
	'params' => $params ,
	'language' => 'zh-CN'
];
