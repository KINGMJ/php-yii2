<?php


namespace frontend\interfaces\dto;


use yii\base\Model;

class EntCreateDto extends Model
{
	public $ent_name;
	public $contact;
	public $ent_desc;
	public $user_count;
	public $country_code;
	public $phone_number;

	public function rules(): array {
		return [
			// 必须要验证的
			[['ent_name' , 'contact' , 'user_count'] , 'required'] ,
			// safe 属性，不需要进行验证
			[['ent_desc' , 'country_code' , 'phone_number'] , 'safe']
		];
	}
}
