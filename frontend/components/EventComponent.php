<?php


namespace frontend\components;


use yii\base\Component;
use yii\base\Event;
use function foo\func;

class EventComponent extends Component
{
	const EVENT_HELLO = 'hello';

	public function __construct($config = []) {
		parent::__construct($config);
	}

	public function init() {
		parent::init();
		// 处理器是匿名函数
		self::on(self::EVENT_HELLO , function ($event) {
			print_r("hello 被触发了\n");
		});

		// 处理器是对象方法
		$component = new TestComponent(1 , 2 , ['prop1' => 3 , 'prop2' => 4]);
		self::on(self::EVENT_HELLO , [$component , 'test2']);

		// 处理器是静态类方法
		self::on(self::EVENT_HELLO , ['frontend\components\Bar' , 'test']);
	}

	public function publish() {
		$this->trigger(self::EVENT_HELLO);
	}
}
