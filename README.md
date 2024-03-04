# mysendingbox-php

[![Packagist version](https://img.shields.io/packagist/v/mysendingbox/mysendingbox-php.svg)](https://github.com/mysendingbox/mysendingbox-php)
[![Dependency Status](https://gemnasium.com/badges/github.com/mysendingbox/mysendingbox-php.svg)](https://gemnasium.com/github.com/mysendingbox/mysendingbox-php)


Mysendingbox.fr PHP Client is a simple but flexible wrapper for the [Mysendingbox.fr](https://www.mysendingbox.fr) API. See full Mysendingbox.fr documentation [here](https://docs.mysendingbox.fr/). For best results, be sure that you're using the latest version of the Mysendingbox API and the latest version of the PHP wrapper.

## Table of Contents

- [Getting Started](#getting-started)
  - [Registration](#registration)
  - [Installation](#installation)
  - [Letters](#usage)
  - [Accounts](#accounts)
  - [Invoices](#invoices)
- [Examples](#examples)

## Getting Started

Here's a general overview of the Mysendingbox services available, click through to read more.


Please read through the official [API Documentation](https://docs.mysendingbox.fr/?php#) to get a complete sense of what to expect from each endpoint.

### Registration

First, you will need to first create an account at [Mysendingbox.fr](https://www.mysendingbox.fr/signup) and obtain your Test and Live API Keys.

Once you have created an account, you can access your API Keys from the [API keys Panel](https://www.mysendingbox.fr/app/dashboard/keys).

### Installation

The recommended way to install Mysendingbox.fr PHP Client is through [Composer](http://getcomposer.org).

```bash
// Install Composer
curl -sS https://getcomposer.org/installer | php

// Add Mysendingbox.fr PHP client as a dependency
composer require mysendingbox/mysendingbox-php
```

After installing, you need to require Composer's autoloader:

```php
require 'vendor/autoload.php';
```

### Letters

#### Create a new Letter
```php
<?php
require 'vendor/autoload.php';

// Provide an API Key in the class constructor
// in order to instantiate the Mysendingbox object
$apiKey = 'your API Key here';
$mysendingbox = new \Mysendingbox\Mysendingbox($apiKey);

$to_address = array(
  'name'                  => 'Mysendingbox',
  'address_line1'         => '30 rue de rivoli',
  'address_line2'         => '',
  'address_city'          => 'Paris',
  'address_country'       => 'France',
  'address_postalcode'    => '75004'
);

$letter = $mysendingbox->letters()->create(array(
  'to'                  => $to_address,
  'source_file'         => '@test.pdf',
  'description'         => 'Test Letters',
  'color'               => 'bw',
  'source_file_type'    => 'file',
  'postage_type'        => 'verte'
));

print_r($letter);

?>
```

#### Create a new Electronic Letter
```php
<?php
require '../vendor/autoload.php';

$apiKey = 'your API key here';
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
  'description'         => 'Test Electronic Letters',
  'content'             => 'Please review the attached documents',
  'postage_type'        => 'lre'
));

print_r($letter);

?>
```

#### Get all Letters

```php
<?php
  require 'vendor/autoload.php';

  $mysendingbox = new \Mysendingbox\Mysendingbox('test_12345678901234567890');

  $letters = $mysendingbox->letters()->all();

  print_r($letters);
?>
```

#### Get a specific Letter
```php
<?php
  require 'vendor/autoload.php';

  $mysendingbox = new \Mysendingbox\Mysendingbox('test_12345678901234567890');

  $letter = $mysendingbox->letters()->get('LETTER_ID');

  print_r($letter);
?>
```

### Accounts

#### Create a new account for the company

```php
<?php
require 'vendor/autoload.php';

// Provide an API Key in the class constructor
// in order to instantiate the Mysendingbox object
$mysendingbox = new \Mysendingbox\Mysendingbox('test_12345678901234567890');

$account = $mysendingbox->accounts()->create(array(
  'email'               => "msb.partner@example.com",
  'name'                => "Erlich Bachman",
  'phone'               => "+33104050607",
  'company_name'        => "MSB Partner from PHP Wrapper",
  'address_line1'       => '30 rue de rivoli',
  'address_line2'       => '',
  'address_city'        => 'Paris',
  'address_country'     => 'France',
  'address_postalcode'  => '75004'
));

print_r($account);

?>
```

#### Update the account company email

```php
<?php
require 'vendor/autoload.php';

// Provide an API Key in the class constructor
// in order to instantiate the Mysendingbox object
$mysendingbox = new \Mysendingbox\Mysendingbox('test_12345678901234567890');

$account_response = $mysendingbox->accounts()->updateEmail("COMPANY_ID_HERE", "msb.partner.new@example.com");
?>
```

### Invoices

#### List all invoices for a company

```php
<?php
  require 'vendor/autoload.php';

  $mysendingbox = new \Mysendingbox\Mysendingbox('test_12345678901234567890');

  $letters = $mysendingbox->invoices()->all();

  print_r($letters);
?>
```

#### Get a specific invoice

```php
<?php
  require 'vendor/autoload.php';

  $mysendingbox = new \Mysendingbox\Mysendingbox('test_12345678901234567890');

  $letter = $mysendingbox->invoices()->get('INVOICE_ID');

  print_r($letter);
?>
```

## Examples

We've provided various examples for you to try out [here](https://github.com/mysendingbox/mysendingbox-php/tree/master/examples).


=======================

Copyright &copy; 2017 Mysendingbox.fr

Released under the MIT License, which can be found in the repository in `LICENSE.txt`.
