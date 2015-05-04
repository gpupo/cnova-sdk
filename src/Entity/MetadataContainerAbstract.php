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
    public function getMetadata()
    {
        return $this->get('metadata');
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

    protected function dataPiece($piece, $data)
    {
        if ($data instanceof CollectionAbstract) {
            return $data->get($piece);
        } elseif (array_key_exists($piece, $data)) {
            return $data[$piece];
        } else {
            return [];
        }
    }

    protected function factoryMetadata($raw)
    {
        $data = $this->dataPiece('metadata', $raw);

        if (!empty($data)) {
            $data = $this->normalizeMetas($data);
        }

        $this->set('metadata', new Metadata($data));

        return true;
    }

    public function __construct($data = null)
    {
        parent::__construct([
            'raw' => $data,
        ]);

        $this->factoryMetadata($data);
    }
}
