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

class Invoices extends ResourceBase
{
    public function create(array $data)
    {
       throw new NetworkErrorException("Invalid REST operation : POST /invoices/:invoice_id");
    }

    public function delete($id)
    {
       throw new NetworkErrorException("Invalid REST operation : DELETE /invoices/:invoice_id");
    }
}
