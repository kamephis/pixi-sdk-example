	<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| API SETTINGS
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
*/

if(file_exists(__DIR__.'/db_test_conf.php')) {
	include __DIR__.'/db_test_conf.php';
} else {
	$config['api']['username'] = 'VIRGO3\pixiAPP';
	$config['api']['password'] = 'fHNzq44NA6kaDm_APP';
	$config['api']['location'] = 'https://api.pixi.eu/soap/pixiAPP/';
	$config['api']['uri'] = 'https://api.pixi.eu/soap/pixiAPP/';
	$config['api']['ssl_method'] =  SOAP_SSL_METHOD_TLS;
	$config['api']['allow_self_signed'] = true; // needed for self signed certs
	

	/*
	| -------------------------------------------------------------------------
	| DEFAULT DATABASE
	| -------------------------------------------------------------------------
	| Settings for default (common) database.
	|
	*/

	// $active_group = 'default';
	$active_record = TRUE;

	$config['db']['hostname'] = 'localhost';
	$config['db']['username'] = 'root';
	$config['db']['password'] = '';
	$config['db']['database'] = 'app_db';
	$config['db']['dbdriver'] = 'mysqli';
	$config['db']['dbprefix'] = '';
	$config['db']['pconnect'] = false;
	// $config['db']['db_debug'] = TRUE;
	// $config['db']['cache_on'] = FALSE;
	// $config['db']['cachedir'] = '';
	// $config['db']['char_set'] = 'utf8';
	// $config['db']['dbcollat'] = 'utf8_general_ci';
	// $config['db']['swap_pre'] = '';
	// $config['db']['autoinit'] = TRUE;
	// $config['db']['stricton'] = FALSE;

	/*
	| -------------------------------------------------------------------------
	| CUSTOMER DATABASE
	| -------------------------------------------------------------------------
	| Settings for customer specific database.
	|
	*/

	$config['customer_db']['hostname'] = 'localhost';
	$config['customer_db']['username'] = 'root';
	$config['customer_db']['password'] = '';
	$config['customer_db']['database'] = 'customer_db';
	$config['customer_db']['dbdriver'] = 'mysqli';
	$config['customer_db']['dbprefix'] = '';
	$config['customer_db']['pconnect'] = false;
	// $config['customer_db']['db_debug'] = TRUE;
	// $config['customer_db']['cache_on'] = FALSE;
	// $config['customer_db']['cachedir'] = '';
	// $config['customer_db']['char_set'] = 'utf8';
	// $config['customer_db']['dbcollat'] = 'utf8_general_ci';
	// $config['customer_db']['swap_pre'] = '';
	// $config['customer_db']['autoinit'] = TRUE;
	// $config['customer_db']['stricton'] = FALSE;
}

/*
| -------------------------------------------------------------------------
| OAUTH SETTINGS
| -------------------------------------------------------------------------
| Settings for OAuth authentication.
|
*/
//MEMO: We don't need this oauth data in this version.
$config['oauth']['uri'] = 'https://local.dev?pixi_o_auth=1';
$config['oauth']['token'] = '';
$config['oauth']['client_id'] = '';
