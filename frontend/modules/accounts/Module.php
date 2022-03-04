<?php

namespace frontend\modules\accounts;

/**
 * accounts module definition class
 */
class Module extends \yii\base\Module
{
	/**
	 * {@inheritdoc}
	 */
	public $controllerNamespace = 'frontend\modules\accounts\controllers';

	/**
	 * {@inheritdoc}
	 */
public function init() {
	parent::init();
	// 从config.php 加载配置来初始化模块
	\Yii::configure($this , require __DIR__ . '/config/main.php');
}
}
