<?php

namespace frontend\modules\users\domain\repository;

use frontend\modules\users\domain\entity\User;

interface UserRepoInterface {

	/**
	 * 查找一个用户
	 * @param $user_id
	 * @return UserPo|null
	 */
	public static function findById($user_id): ?UserPo;

	/**
	 * 保存一个用户
	 * @param User $user
	 * @return mixed
	 */
	public static function save(User $user);
}
