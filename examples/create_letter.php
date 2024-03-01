<?php
require '../vendor/autoload.php';

$apiKey = 'API_KEY_HERE';
$mysendingbox = new \Mysendingbox\Mysendingbox($apiKey);


$to_address = array(
  'name'                  => 'Mysendingbox from PHP wrapper',
  'address_line1'         => '30 rue de rivoli',
  'address_line2'         => '',
  'address_city'          => 'Paris',
  'address_country'       => 'France',
  'address_postalcode'    => '75004'
);

$letter = $mysendingbox->letters()->create(array(
  'to'                  => $to_address,
  'source_file'         => '<div>Hello</div>',
  'description'         => 'Test Letters',
  'color'               => 'bw',
  'source_file_type'    => 'html',
  'postage_type'        => 'verte'
));

print_r($letter);

?>
