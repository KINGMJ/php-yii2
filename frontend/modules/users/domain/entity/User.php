<?php

namespace frontend\modules\users\domain\entity;

use yii\base\Model;
use yii\validators\StringValidator;
use yii\validators\UrlValidator;

/**
 * 用户实体，充血模型，有自定的业务属性和动作
 * Class User
 * @package frontend\modules\users\domain\entity
 * @property int    $user_id       用户id
 * @property int    $phone_number  手机号
 * @property string $nick_name     昵称
 * @property Avatar $avatar        头像 VO（Value Object，值对象）
 * @property string $email         邮箱
 */
class User extends Model {
	public $user_id;
	public $phone_number;
	public $nick_name;
	public $avatar;
	public $email;

	public function rules(): array {
		return [
			[['user_id'] , 'required'] ,
			['email' , 'email'] ,
			['phone_number' , 'number'] ,
			['nick_name' , 'string'] ,
			['avatar' , 'validateAvatar'] ,
		];
	}

	/**
	 * 自定义验证器，验证 avatar
	 * @param $attribute
	 * @param $params
	 */
	public function validateAvatar($attribute , $params) {
		if ( ! is_object($this->$attribute)) {
			$this->addError($attribute , "$attribute must be an object");
		}

		// 验证 avatar 内部属性
		// 验证 img
		$urlValidator = new UrlValidator();
		if ( ! empty($this->$attribute->img) &&
			! $urlValidator->validate($this->$attribute->img , $error)) {
			$this->addError($attribute , "$attribute.img - $error");
		}

		// 验证 status
		if ( ! empty($this->$attribute->status) &&
			! in_array($this->$attribute->status , [1 , 2])
		) {
			$this->addError($attribute , "$attribute.status is not a valid value");
		}

		// 验证 letter
		$stringValidator = new StringValidator();
		$stringValidator->length = 2;
		if ( ! empty($this->$attribute->letter) &&
			! $stringValidator->validate($this->$attribute->letter , $error)) {
			$this->addError($attribute , "$attribute.letter is not a valid value");
		}
	}

}
