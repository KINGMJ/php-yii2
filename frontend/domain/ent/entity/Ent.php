<?php

namespace frontend\domain\ent\entity;


use yii\db\ActiveRecord;

/**
 * ent（企业）实体类
 * @property int    $ent_id             企业id
 * @property string $ent_name           企业名称
 * @property string $ent_desc           企业详情
 * @property int    $owner_id           企业所属人
 * @property int    $user_count         企业人数
 * @property int    $status             企业状态：-1（删除）；1（正常）
 * @property string $is_on_trial        企业是否处于试用状态：
 * @property string $expired_date       企业过期时间
 * @property string $create_datetime    企业创建时间
 * @property string $timezone_offset    企业创建时区
 * @property int    $creator_id         企业创建者
 * @property string $contact            联系方式
 * @property int    $create_from        从哪里创建的
 */
class Ent extends ActiveRecord
{


	public static function tableName(): string {
		return 'ent';
	}

	public function rules(): array {
		return [
			[['ent_name' , 'user_count' , 'expired_date' , 'create_datetime' , 'timezone_offset'] , 'required'] ,
			//// safe 属性，不需要进行验证
			//[['owner_id' , 'status' , 'is_on_trial'] , 'safe']
		];
	}
}
