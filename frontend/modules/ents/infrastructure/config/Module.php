<?php

namespace frontend\modules\ents\infrastructure\config;

/**
 * ent module definition class
 */
class Module extends \yii\base\Module
{
	/**
	 * @inheritdoc
	 */
	public $controllerNamespace = 'frontend\modules\ents\interfaces\facade';
	public $defaultRoute = 'ent';

	/**
	 * @inheritdoc
	 */
	public function init() {
		parent::init();
		\Yii::configure($this , require __DIR__ . '/config.php');
		// custom initialization code goes here
	}
}
