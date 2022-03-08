<?php


namespace frontend\interfaces\facade;


use frontend\interfaces\assembler\EntAssembler;
use frontend\interfaces\dto\EntCreateDto;
use yii\rest\Controller;


class EntController extends Controller
{

	public function actionView() {
		print_r("21");
	}

	public function actionCreate() {
		$ent = (new EntAssembler())->toEntity(new EntCreateDto());

		print_r($ent->toArray());
	}
}
