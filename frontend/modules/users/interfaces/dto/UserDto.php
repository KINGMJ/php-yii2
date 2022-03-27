<?php

namespace frontend\modules\users\interfaces\dto;

use yii\base\Model;
use yii\validators\StringValidator;
use yii\validators\UrlValidator;

/**
 * 用户传输对象
 * Class UserDto
 * @package frontend\modules\users\interfaces\dto
 */
class UserDto extends Model {

	// 场景：用户加载
	const SCENARIO_VIEW = 'view';

	public $user_id;
	public $phone_number;
	public $avatar;
	public $language;
	public $nick_name;

	// 创建用户时传递的邮箱
	public $email;
	// vo展示的邮箱
	public $emails;

	public function rules(): array {
		return [
			['user_id' , 'number'] ,
			['phone_number' , 'number'] ,
			['nick_name' , 'string'] ,
			['avatar' , 'validateAvatar'] ,
			['email' , 'email'] ,
			// safe 属性，
			['emails' , 'safe'] ,
		];
	}

	/**
	 * 场景只能决定验证规则和块赋值，不能觉得model的哪些字段不显示。
	 * 如果控制字段的显示与否，使用 fields
	 * 所以这里将 SCENARIO_VIEW 设置为默认的场景，只是为了得到一个场景的标记。
	 * @return array
	 */
	public function scenarios(): array {
		$scenarios = parent::scenarios();
		$scenarios[ self::SCENARIO_VIEW ] = $scenarios[ self::SCENARIO_DEFAULT ];
		return $scenarios;
	}

	/**
	 * 这里利用场景来控制字段的显示与否
	 * @return array
	 */
	public function fields(): array {
		$fields = parent::fields();
		switch ($this->scenario) {
			case self::SCENARIO_VIEW:
				unset($fields['email']);
				break;

		}
		return $fields;
	}


	/**
	 * 自定义验证器，验证 avatar
	 * @param $attribute
	 * @param $params
	 */
	public function validateAvatar($attribute , $params) {
		if ( ! is_array($this->$attribute)) {
			$this->addError($attribute , "$attribute must be an array");
		}
		// 验证 avatar 内部属性

		// 验证 img
		$urlValidator = new UrlValidator();
		if ( ! empty($this->$attribute["img"]) &&
			! $urlValidator->validate($this->$attribute["img"] , $error)) {
			$this->addError($attribute , $attribute . "[img] - $error");
		}

		// 验证 status
		if ( ! empty($this->$attribute["status"]) &&
			! in_array($this->$attribute["status"] , [1 , 2])
		) {
			$this->addError($attribute , $attribute . "[status] is not a valid value");
		}

		// 验证 letter
		$stringValidator = new StringValidator();
		$stringValidator->length = 2;
		if ( ! empty($this->$attribute["letter"]) &&
			! $stringValidator->validate($this->$attribute["letter"] , $error)) {
			$this->addError($attribute , $attribute . "[letter] is not a valid value");
		}
	}
}
