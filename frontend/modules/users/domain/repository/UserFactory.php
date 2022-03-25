<?php


namespace frontend\modules\users\domain\repository;


use frontend\modules\users\domain\entity\Avatar;
use frontend\modules\users\domain\entity\User;
use yii\web\BadRequestHttpException;

class UserFactory {
	public function createUserPo(User $user) {

	}

	/**
	 * Po 转换成 Do
	 * @param UserPo $userPo
	 * @return User
	 * @throws BadRequestHttpException
	 */
	public static function getUser(UserPo $userPo): User {
		$userDo = new User();
		// 使用 load 进行转换
		if ( ! $userDo->load($userPo->toArray() , '')) {
			$errors = $userDo->getFirstErrors();
			throw new BadRequestHttpException($errors , 400002);
		}

		// 转换完成，对于一些值对象操作
		$userDo->avatar = new Avatar([
			'letter' => $userPo->head_img_letter ,
			'img' => $userPo->head_img_name ,
			'status' => $userPo->head_img_status
		]);

		// @todo 领域模型的验证规则跟 dto 的验证规则怎么处理，它们实际上做了很多重复的事情，但是又有细微的差别
		if ( ! $userDo->validate()) {
			$errors = $userDo->getFirstErrors();
			throw new BadRequestHttpException($errors , 400003);
		}
		return $userDo;
	}
}
