<?php

namespace frontend\modules\users\domain\entity;

use yii\base\Model;

/**
 * 用户实体，充血模型，有自定的业务属性和动作
 * Class User
 * @package frontend\modules\users\domain\entity
 * @property int    $user_id       用户id
 * @property int    $phone_number  手机号
 * @property string $nick_name     昵称
 * @property Avatar $avatar        头像 VO（Value Object，值对象）
 * @property string $emails        邮箱
 */
class User extends Model {

	public $user_id;
	public $phone_number;
	public $nick_name;
	public $avatar;
	public $emails;

	public function rules(): array {
		return [
			[['user_id'] , 'required'] ,
			['phone_number' , 'number'] ,
			['nick_name' , 'string'] ,
			[['avatar' , 'emails'] , 'safe'] ,
		];
	}
}
