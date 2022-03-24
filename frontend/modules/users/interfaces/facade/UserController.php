<?php

namespace frontend\modules\users\interfaces\facade;

use yii\helpers\BaseInflector;
use frontend\modules\users\domain\entity\User;
use Yii;
use yii\rest\Controller;


class UserController extends Controller {

	// 加载一张卡片
	public function actionView($id) {

		$userDo = User::findOne([
			'id' => $id ,
			'status' => STATUS_ACTIVE
		]);


		return $userDo;
	}
}
