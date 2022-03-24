<?php

namespace frontend\modules\tasks\infrastructure\config;

/**
 * ent module definition class
 */
class Module extends \yii\base\Module {
	/**
	 * @inheritdoc
	 */
	public $controllerNamespace = 'frontend\modules\tasks\interfaces\facade';
	public $defaultRoute = 'task';

	/**
	 * @inheritdoc
	 */
	public function init() {
		parent::init();
		\Yii::configure($this , require __DIR__ . '/config.php');
		// custom initialization code goes here
	}
}
