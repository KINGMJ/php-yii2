<?php

namespace frontend\modules\users\domain\repository;

use frontend\modules\users\domain\entity\User;

class UserRepoImpl implements UserRepoInterface {
	/**
	 * 返回一个用户
	 * @param $user_id
	 * @return UserPo|null
	 */
	public static function findById($user_id): ?UserPo {
		return UserPo::findOne([
			'id' => $user_id ,
			'status' => STATUS_ACTIVE
		]);
	}

	public static function save(User $user) {
		// 将 Do 转换成 Po
		$userPo = UserFactory::createUserPo($user);
		if ( ! $userPo->save()) {
			$userPo->addErrors($userPo->getErrors());
		}
		return UserRepoImpl::findById($userPo->id);
	}
}
