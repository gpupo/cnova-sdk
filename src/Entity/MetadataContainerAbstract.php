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

namespace Gpupo\CnovaSdk\Entity;

use Gpupo\Common\Entity\CollectionAbstract;

abstract class MetadataContainerAbstract extends CollectionAbstract
{
    abstract protected function getKey();

    abstract protected function factoryEntity(array $data);

    protected $metadata;

    protected $raw;

    public function getMetadata()
    {
        return $this->metadata;
    }

    public function getRaw()
    {
        return $this->raw;
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

        if ( ! empty($data)) {
            $data = $this->normalizeMetas($data);
        }

        $this->metadata = new Metadata($data);

        return true;
    }

    public function __construct($data = null)
    {
        $this->raw = $data;

        $this->factoryMetadata($data);

        $list = $this->dataPiece($this->getKey(), $data);
        if ( ! empty($list)) {
            foreach ($list as $entityData) {
                $this->add($this->factoryEntity($entityData));
            }
        }
    }
}
