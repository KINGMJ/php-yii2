<?php

namespace frontend\modules\users\domain\repository;

class UserRepoImpl implements UserRepoInterface {

	public static function update() {
		// TODO: Implement update() method.
	}

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
}
