<?php


namespace frontend\controllers;


use frontend\components\EventComponent;
use frontend\components\Mailer;
use frontend\components\TestComponent;
use yii\web\Controller;

// yii2 中的一些关键概念
class ConceptController extends Controller
{
	// 组件的使用
	public function actionComponent() {
		$component = new TestComponent(1 , 2 , ['prop1' => 3 , 'prop2' => 4]);
		$component->test();
	}

	// 事件的使用
	public function actionEvent() {
		$component = new EventComponent();
		$component->publish();
	}

// 事件传递数据
	public function actionEventData() {
		$component = new Mailer();
		$message = [
			'to' => '3210120@qq.com' ,
			'content' => '发送一封邮件'
		];
		$component->send($message);
	}
}
