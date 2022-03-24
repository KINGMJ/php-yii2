<?php


namespace frontend\modules\tasks\domain\entity;


use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * @property-read ActiveQuery $taskDesc
 */
class Task extends ActiveRecord {

	public static function tableName(): string {
		return 'lg_task';
	}

	/**
	 * fields 重写字段，可以重新定义模型里的字段，对于db里不需要的字段可以过滤掉
	 * @return array
	 */
	public function fields(): array {
		return [
			'task_id' ,
			// 前面是属性名，后面是 db 字段名
			'task_name' => 'task_name' ,
			// 每次查询 task 的时候，关联查询 task_desc
			'task_desc' => function () {
				return $this->taskDesc->task_desc;
			}
		];
	}

	/**
	 * 关联查询
	 * @return ActiveQuery
	 */
	public function getTaskDesc(): ActiveQuery {
		return $this->hasOne(TaskDesc::class , [
			'board_id' => 'board_id' ,
			'task_id' => 'task_id'
		]);
	}

}
