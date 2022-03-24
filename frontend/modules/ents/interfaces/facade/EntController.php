<?php


namespace frontend\modules\ents\interfaces\facade;


use frontend\modules\ents\domain\entity\Ent;
use frontend\modules\ents\domain\entity\Task;
use Yii;
use yii\rest\Controller;


class EntController extends Controller {

	// 加载企业列表
	public function actionIndex() {

		//print_r(\Yii::$app->params["adminEmail"]);
		//return 123;
	}

	// 加载一个企业
	public function actionView($id) {

		$request = Yii::$app->request;
		$board_id = $request->get('board_id');

		$ent = Ent::findOne([
			'ent_id' => $id ,
			'status' => STATUS_ACTIVE
		]);

		return $ent;

	}


	/**
	 * 创建一个企业
	 */
	public function actionCreate() {

	}
}
