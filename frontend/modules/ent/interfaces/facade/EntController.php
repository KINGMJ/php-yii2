<?php

namespace frontend\modules\ent\interfaces\facade;





/**
 * Default controller for the `ent` module
 */
class EntController extends \yii\web\Controller
{
	public function actionIndex() {
		$module = \Yii::$app->controller->module;
		print_r($module);
	}



}
