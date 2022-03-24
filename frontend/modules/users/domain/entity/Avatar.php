<?php


namespace frontend\modules\users\domain\entity;


use yii\base\Model;

/**
 * 头像 Value Object（值对象）
 * Class Avatar
 * @package frontend\modules\users\domain\entity
 */
class Avatar extends Model {

	/**
	 * @var string 头像文字
	 */
	public $letter;

	/**
	 * @var string 头像图片
	 */
	public $img;

	/**
	 * @var int 显示头像的状态：1. 文字； 2. 图片
	 */
	public $status;

}
