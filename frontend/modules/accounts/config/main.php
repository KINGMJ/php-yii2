<?php
return [
	'components' => [
		// list of component configurations
	] ,
	'params' => [
		// list of parameters
	] ,
	'as action-time-filter' => [
		'class' => frontend\modules\accounts\filters\ActionTimeFIlter::class ,
		'only' => ['accounts/index']
	] ,
];
