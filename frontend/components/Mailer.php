<?php


namespace frontend\components;


use yii\base\Component;
use yii\base\Event;


class Mailer extends Component
{
	const EVENT_MESSAGE_SENT = 'messageSent';

	public function init() {
		parent::init();
		self::on(self::EVENT_MESSAGE_SENT , function ($event) {
			print_r($event->message);
		});
	}

	public function send($message) {
		$event = new MessageEvent();
		$event->message = $message;
		$this->trigger(self::EVENT_MESSAGE_SENT , $event);
	}
}


class MessageEvent extends Event
{
	public $message;
}
