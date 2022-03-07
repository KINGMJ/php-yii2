<?php

namespace frontend\interfaces\assembler;


use Yii;
use yii\base\Model;
use yii\web\BadRequestHttpException;

class ProjectAssembler
{


	public function toDto($entity) {

	}

	/**
	 * dto 转换为实体类
	 * @param Model $dto
	 * @return Model
	 */
	public function toEntity(Model $dto): Model {
		if ( ! $dto->load(Yii::$app->request->post() , '') || ! $dto->validate()) {
			$errors = $dto->getFirstErrors();
			$errors = implode("" , $errors);
			$errors = preg_replace("/。/" , "，" , $errors);
			$errors = preg_replace('#，$#i' , '。' , $errors);
			throw new BadRequestHttpException($errors , 400000);
		}
		return $dto;
	}
}
