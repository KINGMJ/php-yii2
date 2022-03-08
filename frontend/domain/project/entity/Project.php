<?php

namespace frontend\domain\project\entity;

use yii\db\ActiveRecord;

class Project extends ActiveRecord
{
	public static function tableName(): string {
		return 'lg_project';
	}


}
