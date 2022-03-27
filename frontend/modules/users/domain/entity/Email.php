<?php
/**
 * Author: jerry.mei
 * Email: jerry.mei2049@gmail.com
 * Date: 2022/3/26
 */

namespace frontend\modules\users\domain\entity;

use yii\base\Model;

/**
 * 邮箱实体，这里拿掉了 status 字段，因为这个只是表示db row 的状态，对于领域模型来说，是没有用的
 * Class Email
 * @package frontend\modules\users\domain\entity
 * @property string $email            邮箱
 * @property string $is_master        是否是主邮箱
 * @property string $is_virtual       是否是虚拟邮箱
 * @property string $create_datetime  创建时间
 */
class Email extends Model {
	public $user_id;
	public $email;
	public $is_master;
	public $is_virtual;
	public $create_datetime;

	public function rules(): array {
		return [
			[['email' , 'is_master' , 'is_virtual' , 'create_datetime'] , 'safe'] ,
		];
	}
}

