<?php


namespace frontend\modules\users\interfaces\dto;

use yii\base\Model;
use yii\validators\StringValidator;
use yii\validators\UrlValidator;

class UserDto extends Model {

	public $user_id;
	public $phone_number;
	public $avatar;
	public $language;
	public $email;

	public function rules(): array {
		return [
			[['user_id'] , 'required'] ,
			['email' , 'email'] ,
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
