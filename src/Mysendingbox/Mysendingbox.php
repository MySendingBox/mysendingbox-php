<?php

/*
 * This file is part of the Mysendingbox.fr PHP Client.
 *
 * (c) 2017 Mysendingbox.fr, https://www.mysendingbox.fr
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Mysendingbox;

use InvalidArgumentException;
use BadMethodCallException;
use Mysendingbox\Resource;
use Mysendingbox\Resource\Letters;
use Mysendingbox\Resource\Accounts;
use Mysendingbox\Resource\Invoices;

class Mysendingbox
{
    private $version;
    private $apiKey;
    private $clientVersion;

    public function __construct($apiKey = null, $version = null)
    {
        if (!is_null($apiKey)) {
            $this->setApiKey($apiKey);
        }
        $this->version = $version;
        $this->clientVersion = '1.2.0';
    }

    public function getApiKey()
    {
        return $this->apiKey;
    }

    public function setApiKey($apiKey)
    {
        if (!is_string($apiKey) || empty($apiKey)) {
            throw new InvalidArgumentException('API Key must be a non-empty string.');
        }
        $this->apiKey = $apiKey;

        return $this;
    }

    public function getVersion()
    {
        return $this->version;
    }

    public function getClientVersion()
    {
      return $this->clientVersion;
    }

    public function letters()
    {
        return new Letters($this);
    }

    public function accounts()
    {
        return new Accounts($this);
    }

    public function invoices()
    {
        return new Invoices($this);
    }
}
