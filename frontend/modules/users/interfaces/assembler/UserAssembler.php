<?php

namespace frontend\modules\users\interfaces\assembler;


use frontend\modules\users\domain\entity\User;
use frontend\modules\users\interfaces\dto\UserDto;
use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;
use yii\web\BadRequestHttpException;

class UserAssembler {
	/**
	 * dto 转换为实体类
	 * @param UserDto $dto
	 * @return User
	 * @throws BadRequestHttpException
	 */
	public static function toEntity(UserDto $dto): User {
		$request = Yii::$app->request;
		// 返回所有参数
		$params = $request->getRawBody();
		$params = (array)json_decode($params);

		if ( ! $dto->load($params , '')) {
			throw new BadRequestHttpException('' , 400001);
		}
		// 从 params 中获取 user_id
		$dto->user_id = Yii::$app->request->get('id');

		if ( ! $dto->validate()) {
			// @todo 这个可以重构为一个 helper，或者统一处理
			$errors = $dto->getFirstErrors();
			$errors = implode("" , $errors);
			$errors = preg_replace("/。/" , "，" , $errors);
			$errors = preg_replace('#，$#i' , '。' , $errors);
			throw new BadRequestHttpException($errors , 400000);
		}

		// 转换成 user Entity
		$user = new User();
		$user->attributes = $dto->toArray();
		return $user;
	}


	/**
	 * 实体转换成 DTO
	 * @param User $entity
	 * @return UserDto
	 */
	public static function toDto(User $entity): UserDto {
		$userDto = new UserDto();
		$userDto->load($entity->toArray() , '');
		return $userDto;
	}
}
