<?php

namespace frontend\modules\users\infrastructure\config;

/**
 * ent module definition class
 */
class Module extends \yii\base\Module {
	/**
	 * @inheritdoc
	 */
	public $controllerNamespace = 'frontend\modules\users\interfaces\facade';
	public $defaultRoute = 'user';

	/**
	 * @inheritdoc
	 */
	public function init() {
		parent::init();
		\Yii::configure($this , require __DIR__ . '/config.php');
		// custom initialization code goes here
	}
}
