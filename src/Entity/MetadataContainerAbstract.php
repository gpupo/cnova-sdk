<?php

/*
 * This file is part of gpupo/cnova-sdk
 *
 * (c) Gilmar Pupo <g@g1mr.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @version 1
 */

namespace Gpupo\CnovaSdk\Entity;

use Gpupo\Common\Entity\CollectionAbstract;

abstract class MetadataContainerAbstract extends CollectionAbstract
{
    protected $metadata;

    public function getMetadata()
    {
        return $this->metadata;
    }

    protected function factoryMetadata(array $metas)
    {
        $data = [];

        foreach ($metas as $meta) {
            $data[$meta['key']] = $meta['value'];
        }

        $this->metadata = new Metadata($data);

        return $this;
    }

    public function __construct($data = null)
    {
        $this->factoryMetadata($data->getMetadata());
    }
}
