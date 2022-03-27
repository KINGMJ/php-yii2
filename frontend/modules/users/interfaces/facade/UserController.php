<?php

namespace frontend\modules\users\interfaces\facade;

use frontend\modules\users\domain\repository\UserConverter;
use frontend\modules\users\domain\repository\UserPo;
use frontend\modules\users\domain\repository\UserRepoImpl;

use frontend\modules\users\interfaces\assembler\UserAssembler;
use frontend\modules\users\interfaces\dto\UserDto;
use yii\rest\Controller;
use yii\web\NotFoundHttpException;
use yii\web\ServerErrorHttpException;


class UserController extends Controller {

	// 加载一个用户信息
	public function actionView($id): ?UserDto {
		// 调用仓储层获取user的持久化对象
		$userPo = UserRepoImpl::findById($id);
		if (empty($userPo)) {
			//@todo 业务错误要使用异常处理吗
			throw new NotFoundHttpException('user not found' , 400000);
		}
		// 将持久化对象转换成领域对象
		$user = UserConverter::fromPo($userPo);
		// 将领域对象转换成 DTO，返回给消费方
		return UserAssembler::toDto($user);
	}

	// 创建一个用户
	public function actionCreate(): UserDto {
		// 将 dto 转换成实体
		$user = UserAssembler::toEntity(new UserDto());
		$userPo = UserRepoImpl::save($user);
		if (empty($userPo)) {
			throw new ServerErrorHttpException('用户创建失败' , 400000);
		}
		// 将持久化对象转换成领域对象
		$userDo = UserConverter::fromPo($userPo);
		// 将领域对象转换成 DTO，返回给消费方
		return UserAssembler::toDto($userDo);
	}

	// 更新用户
	public function actionUpdate($id) {
		//更新操作先判断资源是否存在
		$userPo = UserRepoImpl::findById($id);
		if (empty($userPo)) {
			throw new NotFoundHttpException('user not found' , 400000);
		}
		// 将 dto 转换成实体
		$user = UserAssembler::toEntity(new UserDto());
		$userPo = UserRepoImpl::save($user , $userPo);
	}

	/**
	 * 支持额外的路由
	 * @return string[]
	 */
	public function actionSearch(): array {

		$res = response_success("123");


		[$success , $data , $error] = $res;
		print_r($success);
		//print_r($data);


		//return ['message' => 'search方法'];
	}

	public function actionSearch2($id) {
		//return ["message" => "search带id： $id"];

// 更新操作先判断资源是否存在
//		$originalUserPo = UserRepoImpl::findById($id);

		//print_r($originalUserPo);
		$userPo = new UserPo();


		$arr = [
			"user_id" => 495844 ,
			"phone_number" => 18900000000
		];

		if ( ! $userPo->load($arr , '')) {
			return "加载失败";
		}

		if ( ! $userPo->validate()) {
			return "错误";
		}

		return $userPo;

	}
}
