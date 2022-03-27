<?php

namespace frontend\modules\users\domain\repository;


use frontend\modules\users\domain\entity\Avatar;
use frontend\modules\users\domain\entity\Email;
use frontend\modules\users\domain\entity\User;
use yii\web\BadRequestHttpException;

/**
 * Data Converter，领域对象和持久化对象的转换
 * Class UserFactory
 * @package frontend\modules\users\domain\repository
 */
class UserConverter {
	/**
	 * 实体与Po的转换
	 * @param User $user
	 * @param      $oldUserPo
	 * @return UserPo
	 * @throws BadRequestHttpException
	 */
	public static function toUserPo(User $user , $oldUserPo = NULL): UserPo {
		$userPo = ! empty($oldUserPo) ? $oldUserPo : new UserPo();
		$userPo->phone_number = $user->phone_number;
		$userPo->nick_name = $user->nick_name;
		$userPo->head_img_letter = $user->avatar['letter'];
		// 邮箱
		if ( ! empty($userPo->emails)) {
			$userPo->emails[0]->email = $user->emails[0]->email;
		}
		if ( ! $userPo->validate()) {
			$errors = $userPo->getFirstErrors();
			throw new BadRequestHttpException(error_format($errors) , 400004);
		}
		return $userPo;
	}

	public static function toUserEmailPo(User $user): UserEmailPo {
		$userEmailPo = new UserEmailPo();
		if ( ! $userEmailPo->load($user->emails[0]->toArray() , '') || ! $userEmailPo->validate()) {
			$errors = $userEmailPo->getFirstErrors();
			throw new BadRequestHttpException(error_format($errors) , 400009);
		}
		return $userEmailPo;
	}

	/**
	 * Po 转换成 Do
	 * @param UserPo $userPo
	 * @return User
	 * @throws BadRequestHttpException
	 */
	public static function fromPo(UserPo $userPo): User {
		$user = new User();
		// 使用 load 进行转换
		if ( ! $user->load($userPo->toArray() , '')) {
			$errors = $user->getFirstErrors();
			throw new BadRequestHttpException($errors , 400002);
		}

		// 转换完成，对于一些值对象操作
		$user->avatar = new Avatar([
			'letter' => $userPo->head_img_letter ,
			'img' => $userPo->head_img_name ,
			'status' => $userPo->head_img_status
		]);

		// 邮箱实体转换
		foreach ($userPo->emails as $value) {
			$user->emails = [];
			$email = new Email();
			$email->load($value->toArray() , '');
			array_push($user->emails , $email);
		}

		if ( ! $user->validate()) {
			$errors = $userPo->getFirstErrors();
			throw new BadRequestHttpException(error_format($errors) , 400003);
		}
		return $user;
	}
}
