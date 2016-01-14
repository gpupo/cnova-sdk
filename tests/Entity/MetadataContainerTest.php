<?php

/*
 * This file is part of gpupo/cnova-sdk
 *
 * (c) Gilmar Pupo <g@g1mr.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * For more information, see
 * <http://www.g1mr.com/cnova-sdk/>.
 */

namespace Gpupo\Tests\CnovaSdk\Entity;

use Gpupo\CnovaSdk\Entity\MetadataContainer;

class MetadataContainerTest extends MetadataContainerTestAbstract
{
    public function dataProviderContainer()
    {
        $data = $this->getResourceJson('fixture/Order/Orders.json');
        $container = new MetadataContainer($data);

        return [
            [$container, ['totalRows' => 2]],
        ];
    }
}
