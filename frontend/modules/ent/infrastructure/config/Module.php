<?php

namespace frontend\modules\ent;

/**
 * ent module definition class
 */
class Module extends \yii\base\Module
{
	/**
	 * @inheritdoc
	 */
	public $controllerNamespace = 'frontend\modules\ent\controllers';

	/**
	 * @inheritdoc
	 */
	public function init() {
		parent::init();
		\Yii::configure($this , require __DIR__ . '/config.php');
		// custom initialization code goes here
	}
}
