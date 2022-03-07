<?php

namespace frontend\interfaces\facade;

use frontend\interfaces\dto\ProjectCreateDto;
use yii\rest\Controller;
use frontend\interfaces\assembler\ProjectAssembler;

class ProjectController extends Controller
{
	public function actionView() {
		print_r("324");
	}

	public function actionCreate() {
		$project = (new ProjectAssembler())->toEntity(new ProjectCreateDto());

		print_r($project);


	}
}
