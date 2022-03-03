<?php

namespace frontend\modules\accounts\models;

use yii\base\Model;

class UserForm extends Model
{
	public $name;
	public $email;

	public function rules() {
		return [
			[['name' , 'email'] , 'required'] ,
			['email' , 'email'] ,
		];
	}

	public function attributeLabels() {
		return [
			'name' => '名称' ,
			'email' => '邮箱'
		];
	}
}
