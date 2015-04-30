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

    protected function normalizeMetas($metas)
    {
        $data = [];

        if (is_array($metas)) {
            foreach ($metas as $meta) {
                $data[$meta['key']] = $meta['value'];
            }
        }

        return $data;
    }

    protected function factoryMetadata($metas = [])
    {
        $this->metadata = new Metadata($this->normalizeMetas($metas));

        return $this;
    }

    public function __construct($data = null)
    {
        $this->factoryMetadata($data->getMetadata());
    }
}