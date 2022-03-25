<?php


namespace frontend\modules\users\domain\repository;


use yii\db\ActiveRecord;

/**
 * Class UserEmailPo
 * @package frontend\modules\users\domain\repository
 * db 字段
 * @property int    $user_id          用户id
 * @property string $email            邮箱
 * @property string $is_master        是否是主邮箱
 * @property string $is_virtual       是否是虚拟邮箱
 * @property int    $status           状态
 * @property string $create_datetime  创建时间
 */
class UserEmailPo extends ActiveRecord {

	public static function tableName(): string {
		return 'lg_user_email';
	}

	/**
	 * fields 重写字段，可以重新定义模型里的字段，对于db里不需要的字段可以过滤掉
	 * @return array
	 */
	public function fields(): array {
		$fields = parent::fields();
		//字段删除
		unset($fields['status']);
		return $fields;
	}
}
