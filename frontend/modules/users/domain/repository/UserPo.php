<?php


namespace frontend\modules\users\domain\repository;

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
	 * 用于控制块赋值以及字段检测
	 * @return array[]
	 */
	public function rules(): array {
		return [
			[['head_img_letter'] , 'required'] ,
			// 默认值
			['create_datetime' , 'default' , 'value' => date('Y-m-d H:i:s')] ,
			['pwd' , 'default' , 'value' => 'a00000'] ,
			['status' , 'default' , 'value' => 1]
		];
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
		return $fields;
	}
}

