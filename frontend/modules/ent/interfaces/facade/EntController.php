<?php

namespace frontend\modules\ent\interfaces\facade;

use yii\web\Controller;

/**
 * Default controller for the `ent` module
 */
class EntController extends Controller
{
	public function actionIndex() {
		print_r("123");
	}
}
