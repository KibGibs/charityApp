<?php

return array(

	// The default gateway to use
	'default' => 'paypal',

	// Add in each gateway here
	'gateways' => array(
		'paypal' => array(
			'driver' => 'PayPal_Express',
			'options' => array(
				'testMode'=>true,
				'brandName'=>'Charity',
				'username'=>'kib.ponce-facilitator_api1.gmail.com',
				'password'=>'JW6RTWSUKPSZZ64A',
				'signature'=>'AFcWxV21C7fd0v3bYYYRCpSSRl31AYRInUK03oxzuvl2HbvD7cQ3nY1j',
				/* 'solutionType' => '',
				'landingPage' => '',
				'headerImageUrl' => '' */
			)
		)
	)
);