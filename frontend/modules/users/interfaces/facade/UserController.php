<?php

namespace frontend\modules\users\interfaces\facade;

use frontend\modules\users\domain\repository\UserConverter;
use frontend\modules\users\domain\repository\UserEmailPo;
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
	public function actionUpdate($id): UserDto {
		//更新操作先判断资源是否存在
		$userPo = UserRepoImpl::findById($id);
		if (empty($userPo)) {
			throw new NotFoundHttpException('user not found' , 400000);
		}
		$user = UserAssembler::toEntity(new UserDto());
		$userPo = UserRepoImpl::update($user , $userPo);
		if (empty($userPo)) {
			throw new ServerErrorHttpException('用户创建失败' , 400000);
		}
		// 将持久化对象转换成领域对象
		$userDo = UserConverter::fromPo($userPo);
		// 将领域对象转换成 DTO，返回给消费方
		return UserAssembler::toDto($userDo);
	}

	/**
	 * 支持额外的路由
	 * @return string[]
	 */
	public function actionSearch(): array {
		return ['message' => 'search方法'];
	}

	public function actionSearch2($id) {
	}
}
