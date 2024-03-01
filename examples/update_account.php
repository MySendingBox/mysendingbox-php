<?php
require '../vendor/autoload.php';

$apiKey = 'API_KEY_HERE';
$mysendingbox = new \Mysendingbox\Mysendingbox($apiKey);

$account_response = $mysendingbox->accounts()->updateEmail("COMPANY_ID_HERE", "msb.partner.new@example.com");

print_r('The Mysendingbox API Account responded with success');

?>
