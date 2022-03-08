<?php


namespace frontend\interfaces\facade;


use frontend\domain\ent\entity\Ent;
use frontend\interfaces\assembler\EntAssembler;
use frontend\interfaces\dto\EntCreateDto;
use Yii;
use yii\rest\Controller;
use yii\web\BadRequestHttpException;

/**
 * facade 与外部系统进行通信，可以是 restful 或 rpc 等方式
 * Class EntController
 * @package frontend\interfaces\facade
 */
class EntController extends Controller
{

	public function actionView() {
		// SELECT * FROM `customer` WHERE `id` = 123
		$customer = Ent::find()
			->where(['ent_id' => 1])
			->one();

		print_r($customer);
	}

	/**
	 * 创建一个企业
	 * @throws BadRequestHttpException
	 */
	public function actionCreate() {
		//interfaces 层进行格式校验，将 dto 转换为实体等操作
		$ent = (new EntAssembler())->toEntity(new EntCreateDto());
	}
}
