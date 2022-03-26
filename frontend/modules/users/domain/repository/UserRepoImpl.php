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
		return UserPo::find()
			->where([
				'id' => $user_id ,
				'status' => STATUS_ACTIVE
			])
			->with([
				// 查询状态为ok的邮箱
				'emails' => function ($query) {
					$query->andWhere(['status' => STATUS_ACTIVE]);
				}
			])
			->one();
	}

	/**
	 * 保存一个用户
	 * @param User $user
	 * @return null
	 */
	public static function save(User $user): ?UserPo {
		// 将 Do 转换成 Po
		$userPo = UserConverter::toPo($user);
		$userPo->save();
		return UserRepoImpl::findById($userPo->id);
	}


}
