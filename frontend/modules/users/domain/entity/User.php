<?php

namespace frontend\modules\users\domain\entity;

use yii\base\Model;


class User extends Model {
	/**
	 * @var int 用户id
	 */
	public $user_id;

	/**
	 * @var int 手机号
	 */
	public $phone_number;

	/**
	 * @var string 昵称
	 */
	public $nick_name;

	/**
	 * @var Avatar 头像 VO（Value Object，值对象）
	 */
	public $avatar;

	public function rules(): array {
		return [
			[['user_id'] , 'required'] ,
			// safe 属性，不需要进行验证
			[['phone_number' , 'nick_name' , 'avatar'] , 'safe']
		];
	}
}
