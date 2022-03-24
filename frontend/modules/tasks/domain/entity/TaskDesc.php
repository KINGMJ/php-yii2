<?php


namespace frontend\modules\tasks\domain\entity;


use yii\db\ActiveRecord;

class TaskDesc extends ActiveRecord {

	public static function tableName(): string {
		return 'lg_task_description';
	}


	/**
	 * fields 重写字段，task desc 作为 Task 实体的一个属性，其他的字段都不需要
	 * @return array
	 */
	public function fields(): array {
		return [
			'task_desc'
		];
	}
}

