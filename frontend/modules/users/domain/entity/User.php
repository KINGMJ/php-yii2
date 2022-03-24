<?php


namespace frontend\modules\users\domain\entity;

use yii\db\ActiveRecord;

/**
 * 用户 Domain Model
 * Class User
 * @package frontend\modules\users\domain\entity
 * @property int    $user_id      用户id
 * @property int    $phone_number 用户手机号
 * @property string $nick_name    昵称
 * @property Avatar $avatar       头像
 */
class User extends ActiveRecord {


	public static function tableName(): string {
		return 'lg_user';
	}

	/**
	 * fields 重写字段，可以重新定义模型里的字段，对于db里不需要的字段可以过滤掉
	 * @return array
	 */
	public function fields(): array {
		return [
			'user_id' => 'id' ,
			'phone_number' ,
			'nick_name' ,
			// 头像构造成值对象
			'avatar' => function () {
				return new Avatar([
					'letter' => $this->head_img_letter ,
					'img' => $this->head_img_name ,
					'status' => $this->head_img_status
				]);
			}
		];
	}


}
