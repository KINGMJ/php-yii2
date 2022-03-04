<?php

namespace frontend\modules\accounts\controllers;

use frontend\modules\accounts\models\User;
use frontend\modules\accounts\models\UserForm;
use yii\web\Controller;

/**
 * Default controller for the `accounts` module
 */
class AccountsController extends Controller
{

	public function behaviors(): array {
		return [
			[
				'class' => 'frontend\modules\accounts\filters\ActionTimeFilter' ,
				'only' => ['index' , 'user']
			]
		];
	}

	public function actionIndex() {
		$user = new UserForm();
		echo $user->getAttributeLabel("name") . '<br/>';
	}

	public function actionUser() {
		$users = User::find()->all();
		print_r($users);
	}
}
