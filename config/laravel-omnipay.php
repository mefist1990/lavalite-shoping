<?php

return [

	// The default gateway to use
	'default' => 'paypal',

	// Add in each gateway here
	'gateways' => [
		'paypal' => [
			'driver'  => 'PayPal_Express',
			'options' => [
				'username'  => env( 'OMNIPAY_PAYPAL_EXPRESS_USERNAME', 'aswathi-facilitator_api1.renfos.com' ),
	            'password'  => env( 'OMNIPAY_PAYPAL_EXPRESS_PASSWORD', 'MEWMDA98XBY8XK36' ),
	            'signature' => env( 'OMNIPAY_PAYPAL_EXPRESS_SIGNATURE', 'AFcWxV21C7fd0v3bYYYRCpSSRl31Ap9nNYJ7nTb7Hg6BcTCOC3C3.z4Y' ),
	            'solutionType' => env( 'OMNIPAY_PAYPAL_EXPRESS_SOLUTION_TYPE', '' ),
	            'landingPage'    => env( 'OMNIPAY_PAYPAL_EXPRESS_LANDING_PAGE', '' ),
	            'headerImageUrl' => env( 'OMNIPAY_PAYPAL_EXPRESS_HEADER_IMAGE_URL', '' ),
	            'brandName' =>  'Laracart',
	            'testMode' => env( 'OMNIPAY_PAYPAL_TEST_MODE', true )
			]
		]
	]

];