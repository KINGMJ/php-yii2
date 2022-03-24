<?php

namespace frontend\modules\tasks\interfaces\facade;

use frontend\modules\tasks\domain\entity\Task;
use Yii;
use yii\rest\Controller;


class TaskController extends Controller {

	// 加载一张卡片
	public function actionView($id) {
		$request = Yii::$app->request;

		$board_id = $request->get('board_id');
		$task_id = $request->get("task_id");


		$task = Task::findOne([
			'board_id' => $board_id ,
			'task_id' => $task_id ,
			'status' => STATUS_ACTIVE
		]);


		return $task;
	}
}
