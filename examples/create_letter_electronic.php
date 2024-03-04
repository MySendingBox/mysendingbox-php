<?php
require '../vendor/autoload.php';

$apiKey = 'API_KEY_HERE';
$mysendingbox = new \Mysendingbox\Mysendingbox($apiKey);

$to_address_electronic = array(
  'first_name'            => 'Erlich',
  'last_name'             => 'Dumas',
  'company'               => 'Mysendingbox',
  'email'                 => 'mysendingbox@example.com'
);

$letter = $mysendingbox->letters()->createElectronic(array(
  'to'                  => $to_address_electronic,
  'source_file'         => '<html>This is the electronic letter attached document</html>',
  'source_file_type'    => 'html',
  'description'         => 'Test Electronic Letters from PHP Wrapper',
  'content'             => 'Please review the attached documents',
  'postage_type'        => 'lre'
));

print_r($letter);

?>
