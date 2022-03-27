<?php

namespace frontend\modules\users\interfaces\assembler;

use frontend\modules\users\domain\entity\Email;
use frontend\modules\users\domain\entity\User;
use frontend\modules\users\interfaces\dto\UserDto;
use Yii;
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
		$params = $request->bodyParams;
		// 从 form 中获取 user_id
		$params["user_id"] = Yii::$app->request->get('id');

		// 将params数据填充到 DTO 中，并进行格式校验
		if ( ! $dto->load($params , '') || ! $dto->validate()) {
			$errors = $dto->getFirstErrors();
			throw new BadRequestHttpException(error_format($errors) , 400000);
		}
		// 转换成 user Entity
		$user = new User();
		if ( ! $user->load($dto->toArray() , "") || ! $user->validate()) {
			$errors = $user->getFirstErrors();
			throw new BadRequestHttpException(error_format($errors) , 400007);
		}
		// 邮箱实体转换
		$user->emails = [];
		$email = new Email();
		$email->email = $dto->email;
		$email->is_master = 'Y';
		$email->is_virtual = 'N';
		array_push($user->emails , $email);
		return $user;
	}

	/**
	 * 实体转换成 dto
	 * @param User $user
	 * @return UserDto
	 */
	public static function toDto(User $user): UserDto {
		$userDto = new UserDto(['scenario' => UserDto::SCENARIO_VIEW]);
		if ( ! $userDto->load($user->toArray() , "") || ! $user->validate()) {
			$errors = $user->getFirstErrors();
			throw new BadRequestHttpException(error_format($errors) , 400008);
		}
		return $userDto;
	}
}
