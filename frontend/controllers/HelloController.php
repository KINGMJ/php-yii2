<?php


namespace frontend\controllers;


use frontend\models\ContactForm;
use yii\web\Controller;

class HelloController extends Controller
{
	public function actionIndex() {

		$model = new ContactForm();

		print_r(\Yii::$app->request->post());

// 根据用户的输入填充到模型的属性中
		$model->load(\Yii::$app->request->post());


		$model->attributes = \Yii::$app->request->post('ContactForm');

		if ($model->validate()) {
			print_r("成功了");
			print_r($model->attributes);
		} else {
			// 验证失败: $errors 是一个包含错误信息的数组
			$errors = $model->errors;
			print_r($errors);
		}
		exit;
	}
}
