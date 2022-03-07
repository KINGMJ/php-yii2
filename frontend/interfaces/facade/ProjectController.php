<?php

namespace frontend\interfaces\facade;

use frontend\application\service\ProjectCreateService;
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
		$projectCreateService = new ProjectCreateService();
		$res = $projectCreateService->create($project);
		print_r($res);
	}
}
