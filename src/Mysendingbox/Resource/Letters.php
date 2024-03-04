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

class Letters extends ResourceBase
{
    public function createElectronic(array $data)
    {
        return $this->sendRequest(
            'POST',
            $this->mysendingbox->getVersion(),
            $this->mysendingbox->getClientVersion(),
            $this->resourceName()."/electronic",
            array(),
            $data
        );
    }

}
