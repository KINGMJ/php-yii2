<?php


namespace frontend\modules\users\domain\entity;


use yii\base\Model;

/**
 * 头像 Value Object（值对象）
 * Class Avatar
 * @package frontend\modules\users\domain\entity
 * @property string $letter 头像文字
 * @property string $img    头像图片
 * @property int    $status 显示头像的状态：1. 文字； 2. 图片
 */
class Avatar extends Model {

	public $letter;
	public $img;
	public $status;
	
}
