<?php

namespace frontend\modules\users\domain\entity;

use frontend\modules\users\domain\repository\UserConverter;
use frontend\modules\users\domain\repository\UserRepoImpl;
use yii\base\Model;
use yii\web\ServerErrorHttpException;

/**
 * 用户实体，充血模型，有自定的业务属性和动作
 * Class User
 * @package frontend\modules\users\domain\entity
 * @property int    $user_id       用户id
 * @property int    $phone_number  手机号
 * @property string $nick_name     昵称
 * @property Avatar $avatar        头像 VO（Value Object，值对象）
 * @property array  $emails        邮箱
 */
class User extends Model {

	public $user_id;
	public $phone_number;
	public $nick_name;
	public $avatar;
	public $emails;

	/**
	 * 业务模型，只验证业务规则，字段规则放到dto和po去验证
	 * @return array
	 */
	public function rules(): array {
		return [
			[['user_id' , 'phone_number' , 'nick_name' , 'avatar' , 'emails'] , 'safe'] ,
		];
	}
}
