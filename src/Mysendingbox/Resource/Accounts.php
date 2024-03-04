<?php

/*
 * This file is part of the Mysendingbox.fr PHP Client.
 *
 * (c) 2017 Mysendingbox.fr, https://www.mysendingbox.fr
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Mysendingbox\Resource;

use Mysendingbox\Resource as ResourceBase;
use Mysendingbox\Exception\NetworkErrorException;

class Accounts extends ResourceBase
{
    public function updateEmail($id, $email)
    {
        return $this->sendRequest(
            'PUT',
            $this->mysendingbox->getVersion(),
            $this->mysendingbox->getClientVersion(),
            $this->resourceName().'/'.strval($id),
            array(),
            [ 'email' => $email ]
        );
    }

    public function all(array $query = array(), $includeMeta = false)
    {
       throw new NetworkErrorException("Invalid REST operation : GET /accounts");
    }

    public function get($id)
    {
       throw new NetworkErrorException("Invalid REST operation : GET /accounts/:account_id");
    }

    public function delete($id)
    {
       throw new NetworkErrorException("Invalid REST operation : DELETE /accounts/:account_id");
    }
}
