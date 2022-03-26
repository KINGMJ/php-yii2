<?php

namespace frontend\modules\users\domain\repository;

use frontend\modules\users\domain\entity\User;
use yii\web\Response;

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


	/**
	 * 保存或更新一个用户
	 * @param User $user
	 * @return null
	 */
	public static function save(User $user) {
		// 用户id不存在，保存用户
		if (empty($user->user_id)) {
			// 将 Do 转换成 Po
			$userPo = UserConverter::toPo($user);
			$userPo->save();
			return UserRepoImpl::findById($userPo->id);
		} else {
			return NULL;
		}
	}

}
