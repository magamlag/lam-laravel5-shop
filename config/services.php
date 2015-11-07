<?php

return [

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

	'mailgun' => [
		'domain' => '',
		'secret' => '',
	],

	'mandrill' => [
		'secret' => '',
	],

	'ses' => [
		'key' => '',
		'secret' => '',
		'region' => 'us-east-1',
	],

	'stripe' => [
			'model'  => 'User',
			'secret' => Config::get('STRIPE_SECRET'),
	],

	'github' => [
			'client_id' => Config::get('GITHUB_CLIENT_ID'),
			'client_secret' => Config::get('GITHUB_CLIENT_SECRET'),
			'redirect' => Config::get('CALLBACK_REDIRECT'),
	],


];
