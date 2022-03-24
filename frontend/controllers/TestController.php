<?php


namespace frontend\controllers;


use yii\rest\Controller;
use yii\web\BadRequestHttpException;

class TestController extends Controller
{
	public function actionIndex() {
		// 自定义错误输出
		throw new BadRequestHttpException("错误" , 400000);
	}

	// 一个正确的响应
	public function actionView(): array {
		return [
			'message' => 'hello world'
		];
	}
}
