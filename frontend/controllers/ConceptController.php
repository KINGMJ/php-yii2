<?php


namespace frontend\controllers;


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
}
