<?php


namespace frontend\interfaces\dto;


use yii\base\Model;

class EntCreateDto extends Model
{
	public $entName;
	public $contact;
	public $entDesc;
	public $userCount;
	public $countryCode;
	public $phoneNumber;

	public function rules(): array {
		return [
			// 必须要验证的
			[['entName' , 'contact' , 'userCount'] , 'required'] ,
			// safe 属性，不需要进行验证
			[['entDesc' , 'countryCode' , 'phoneNumber'] , 'safe']
		];
	}
}
