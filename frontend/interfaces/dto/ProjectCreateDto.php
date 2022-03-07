<?php


namespace frontend\interfaces\dto;


use yii\base\Model;

class ProjectCreateDto extends Model
{
	public $entId;
	public $dept;
	public $projectName;
	public $projectType;
	public $projectDescription;
	public $templateId;
	public $teamCount;
	public $timezoneOffset;


	public function rules(): array {
		return [
			// 必须要验证的
			[['entId' , 'dept' , 'projectName' , 'projectType'] , 'required'] ,
			// safe 属性，不需要进行验证
			[['projectDescription' , 'templateId' , 'teamCount' , 'timezoneOffset'] , 'safe']
		];
	}

	public function attributeLabels(): array {
		return [
			'entId' => '企业id' ,
			'dept' => '部门' ,
			'projectName' => '项目名称'
		];
	}
}
