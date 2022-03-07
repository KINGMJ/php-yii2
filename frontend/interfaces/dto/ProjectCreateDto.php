<?php


namespace frontend\interfaces\dto;


use yii\base\Model;

class ProjectCreateDto extends Model
{
	public $entId;
	public $dept;
	public $projectName;
	public $projectType;
	public $projectDes;
	public $templateId;
	public $teamCount;
	public $timezoneOffset;


	public function rules(): array {
		return [
			[['entId' , 'dept' , 'projectName'] , 'required']
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
