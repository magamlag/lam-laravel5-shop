<?php

return array(

	/*
	|--------------------------------------------------------------------------
	| Third Party Services
	|--------------------------------------------------------------------------
	|
	| This file is for storing the credentials for third party services such
	| as Stripe, Mailgun, Mandrill, and others. This file provides a sane
	| default location for this type of information, allowing packages
	| to have a conventional place to find your various credentials.
	|
	*/

	'mailgun' => array(
		'domain' => '',
		'secret' => '',
	),

	'mandrill' => array(
		'secret' => '',
	),

	'stripe' => [
		'model'  => 'User',
		'secret' => 'sk_live_WES8c8XdaPjdpNE1oWrKRzod',
	],

	'github' => [
			'client_id' => 'a72fb76c00bc34caf17e',
			'client_secret' => '7f6624631edd3906e04cf47e840ab02b6327c696',
			'redirect' => 'http://lam-ecommerce.and/github/callback',
	],

);
