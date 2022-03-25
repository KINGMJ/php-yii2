<?php

namespace frontend\modules\users\domain\repository;

interface UserRepoInterface {

	public static function findById($user_id): ?UserPo;

	public static function update();

}
