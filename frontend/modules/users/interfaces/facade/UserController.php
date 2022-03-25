<?php

namespace frontend\modules\users\interfaces\facade;


use frontend\modules\users\domain\repository\UserFactory;
use frontend\modules\users\domain\repository\UserRepoImpl;
use frontend\modules\users\domain\repository\UserRepoInterface;
use frontend\modules\users\interfaces\assembler\UserAssembler;
use frontend\modules\users\interfaces\dto\UserDto;
use yii\helpers\BaseInflector;
use frontend\modules\users\domain\entity\User;
use Yii;
use yii\rest\Controller;


class UserController extends Controller {

	// 加载一个用户信息
	public function actionView($id): UserDto {
		// 调用仓储层获取user的持久化对象
		$userPo = UserRepoImpl::findById($id);
		// 将持久化对象转换成领域对象
		$userDo = UserFactory::getUser($userPo);
		// 将领域对象转换成 DTO，返回给消费方
		return UserAssembler::toDto($userDo);
	}


	// 更新用户
	public function actionUpdate() {
		// 获取
		$user = UserAssembler::toEntity(new UserDto());


		//$request = Yii::$app->request;
		//// 返回所有参数
		//$params = $request->getRawBody();
		//$params = json_decode($params);
		//$userDto = new UserDto();
		//$userBo = UserAssembler::toEntity($userDto);
		//return $userBo;

	}
}
