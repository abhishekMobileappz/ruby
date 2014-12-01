<?php  
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config['Sandbox'] = TRUE;

$config['APIVersion'] = '66.0';

$config['APIUsername'] = 'shilky-facilitator-1_api1.mobileappz.in';
$config['APIPassword'] = 'EPLK5SUTTUVTAAAZ';
$config['APISignature'] = 'A3hHWZFcnmwDGHk5XEA7DDWBdhOOAgp0Nauy-37f9irKKLckkyNgvoJu';



/* LIVE CREDENTIALS */
if($config['Sandbox'] == FALSE) {
$config['APIVersion'] = '66.0';
$config['APIUsername'] = '';
$config['APIPassword'] = '';
$config['APISignature'] = '';
}

$config['DeviceID'] = $config['Sandbox'] ? '' : 'PRODUCTION_DEVICE_ID_GOES_HERE';
$config['ApplicationID'] = $config['Sandbox'] ? 'APP-80W284485P519543T' : 'APP-2E454556LR591923K';
$config['DeveloperEmailAccount'] = $config['Sandbox'] ? 'amitwali@cdnsol.com' : 'accounts@toadsquare.com';
$config['PayFlowUsername'] = $config['Sandbox'] ? 'tester' : 'PRODUCTION_USERNAME_GOGES_HERE';
$config['PayFlowPassword'] = $config['Sandbox'] ? 'Passw0rd~' : 'PRODUCTION_PASSWORD_GOES_HERE';
$config['PayFlowVendor'] = $config['Sandbox'] ? 'PayPal' : 'PRODUCTION_VENDOR_GOES_HERE';
$config['PayFlowPartner'] = $config['Sandbox'] ? 'PayPal' : 'PRODUCTION_PARTNER_GOES_HERE';

/* End of file paypal.php */
/* Location: ./system/application/config/paypal.php */
