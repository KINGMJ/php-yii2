<?php


namespace frontend\controllers;


use Yii;
use yii\web\Controller;
use yii\web\NotAcceptableHttpException;
use yii\web\NotFoundHttpException;
use yii\web\Response;

// request 的相关内容
class RequestController extends Controller
{
	public function actionIndex() {

	}

	// redis 保存 session 信息
	public function actionCreate(): array {
		$response = Yii::$app->response;
		$response->format = Response::FORMAT_JSON;

		$session = Yii::$app->session;
		$key = 'username';
		if ($session->has($key)) {
			return ['session' => $session->get($key)];
		} else {
			$session->set($key , 'Leon');
		}
		return ['session' => 'no session'];
	}
}
