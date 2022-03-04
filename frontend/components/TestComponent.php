<?php

namespace frontend\components;


use Yii;
use yii\base\BaseObject;

class TestComponent extends BaseObject
{
	public $prop1;
	public $prop2;

	public function __construct($params1 , $params2 , $config = []) {
		print_r("这是一个组件\n");
		echo $params1 . $params2 . '\n';
		parent::__construct($config);
	}

	public function init() {
		parent::init();
		print_r("这是组件的初始化方法\n");

		print_r($this->prop1);
		print_r($this->prop2);
	}

	public function test() {
		echo "调用组件里的方法\n";
	}
}
