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

	///**
	// * 创建一个企业
	// * @throws BadRequestHttpException
	// */
	//public function actionCreate() {
	//	//interfaces 层进行格式校验，将 dto 转换为实体等操作
	//	$ent = (new EntAssembler())->toEntity(new EntCreateDto());
	//	// 因为 ent 实体是一个充血模型，如果领域逻辑很简单，可以直接用实体的方法去 save 一个对象
	//	if ( ! $ent->save()) {
	//		throw new BadRequestHttpException('' , 400000);
	//	}
	//
	//	// save 之后，可以拿到所有数据
	//	print_r($ent->toArray());
	//}

	public function actonCreate() {
		$entDto = new EntCreateDto();
		$ent = EntAssembler::toEntity($entDto);

	}
}
