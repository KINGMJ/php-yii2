<?php


namespace frontend\modules\users\domain\repository;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * 用户持久化类
 * Class UserPo
 * @package frontend\modules\users\domain\repository
 * db 字段
 * @property int        $id               用户id
 * @property int        $phone_number     用户手机号
 * @property string     $nick_name        昵称
 * @property string     $pwd              头像
 * @property string     $department       部门
 * @property string     $position         职位
 * @property string     $create_datetime  创建时间
 * @property int        $status           状态
 * @property string     $head_img_letter  头像字符
 * @property string     $head_img_name    头像icon地址
 * @property string     $head_img_status  头像类型：1. 头像字符；2.头像icon
 * @property string     $biography        用户简介
 * @property int        $register_from    从哪里注册：1:通过账号密码注册；2：通过微信扫一扫注册；3：第三方接口注册
 * @property string     $signature        用户签名
 * @property string     $ip               注册时的ip
 * @property string     $country_code     注册时的国际区号
 * 关联表
 * @property-read mixed $userEmail
 */
class UserPo extends ActiveRecord {

	public static function tableName(): string {
		return 'lg_user';
	}

	/**
	 * fields 重写字段，可以重新定义模型里的字段，对于db里不需要的字段可以过滤掉
	 * @return array
	 */
	public function fields(): array {
		$fields = parent::fields();

		//字段删除
		unset($fields['pwd']);
		//字段转换
		$fields["user_id"] = $fields["id"];
		$fields["ip"] = $fields["IP"];
		unset($fields["id"] , $fields['IP']);

		// 执行关联查询
		// 这种方式每次查询用户都会默认查用户邮箱，会增大db的开销
		$fields["email"] = function () {
			$res = $this->getUserEmail()
				->where(["status" => STATUS_ACTIVE , "is_master" => "Y"])
				->limit(1)
				->one();
			return $res->email;
		};
		return $fields;
	}

	// 关联表，前面是副表id，后面是主表id
	// 关联查询可以使用 $userPo->userEmail 获取关联对象；
	// 或者调用 $userPo->getUserEmail() 方法，可以做一些额外的限定，比如 status =1
	public function getUserEmail(): ActiveQuery {
		return $this->hasMany(UserEmailPo::class , [
			'user_id' => 'id'
		]);
	}
}

