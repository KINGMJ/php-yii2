<?php


namespace frontend\modules\ents\interfaces\facade;


use yii\rest\Controller;

class EntController extends Controller
{
	public function actionIndex() {
		print_r("11111");
	}

	public function actionView() {
		print_r("22222");
	}
}
