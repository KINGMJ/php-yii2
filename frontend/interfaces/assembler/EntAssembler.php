<?php

namespace frontend\interfaces\assembler;


use frontend\domain\ent\entity\Ent;
use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;
use yii\web\BadRequestHttpException;

class EntAssembler implements Assembler
{
	/**
	 * dto 转换为实体类
	 * @param Model $dto
	 * @return ActiveRecord
	 * @throws BadRequestHttpException
	 */
	public static function toEntity(Model $dto): ActiveRecord {
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

		// 额外的一些字段处理
		$ent->expired_date = date("Y-m-d H:i:s");
		$ent->create_datetime = date("Y-m-d H:i:s");
		$ent->timezone_offset = 8;
		return $ent;
	}

	public static function toDto(ActiveRecord $entity): Model {
		// TODO: Implement toDto() method.
	}
}
