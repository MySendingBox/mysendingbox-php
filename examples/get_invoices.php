<?php
require '../vendor/autoload.php';

$apiKey = 'API_KEY_HERE';
$mysendingbox = new \Mysendingbox\Mysendingbox($apiKey);

$invoices_list = $mysendingbox->invoices()->all(array(
  'status'               => "paid",
  'date_start'           => "2020-01-01",
));

echo '[List] The Mysendingbox API Invoices responded : ';
print_r($invoices_list);

if (count($invoices_list['invoices']) > 0) {
    $single_invoice = $mysendingbox->invoices()->get($invoices_list['invoices'][0]['_id']);

    echo '[Single] The Mysendingbox API Invoice responded : ';
    print_r($single_invoice);
}
?>
