<?php


namespace frontend\interfaces\assembler;


use yii\base\Model;
use yii\db\ActiveRecord;

/**
 * assembler 接口，做 dto 和 entity 之间的转换
 * Interface Assembler
 * @package frontend\interfaces\assembler
 */
interface Assembler
{
	/**
	 * entity convert to dto
	 * @param ActiveRecord $entity
	 * @return Model
	 */
	public static function toDto(ActiveRecord $entity): Model;

	/**
	 * dto convert to entity
	 * @param Model $dto
	 * @return ActiveRecord
	 */
	public static function toEntity(Model $dto): ActiveRecord;
}
