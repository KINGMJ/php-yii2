<?php

namespace frontend\interfaces\assembler;


use frontend\domain\ent\entity\Ent;
use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;
use yii\web\BadRequestHttpException;

class EntAssembler
{
	public function toDto($entity) {

	}

	/**
	 * dto 转换为实体类
	 * @param Model $dto
	 * @return ActiveRecord
	 * @throws BadRequestHttpException
	 */
	public function toEntity(Model $dto): ActiveRecord {
		if ( ! $dto->load(Yii::$app->request->post() , '') || ! $dto->validate()) {
			$errors = $dto->getFirstErrors();
			$errors = implode("" , $errors);
			$errors = preg_replace("/。/" , "，" , $errors);
			$errors = preg_replace('#，$#i' , '。' , $errors);
			throw new BadRequestHttpException($errors , 400000);
		}

		// ent 实体类
		$ent = new Ent();
		// dto 转换为 ent 的属性
		$ent->attributes = $dto->toArray();
		//if ( ! $ent->save()) {
		//	$errors = implode("" , $ent->getFirstErrors());
		//	$errors = preg_replace("/。/" , "，" , $errors);
		//	$errors = preg_replace('#，$#i' , '。' , $errors);
		//	throw  new BadRequestHttpException($errors);
		//}
		return $ent;
	}
}
