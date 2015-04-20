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

namespace Gpupo\CnovaSdk\Entity\Product;

use Gpupo\CnovaSdk\Entity\ManagerAbstract;
use Gpupo\CommonSdk\Entity\EntityInterface;

class Manager extends ManagerAbstract
{
    protected $entity = 'Product';

    protected $pool;

    protected $maps = [
        'save'      => ['POST', '/loads/products'],
        'findById'  => ['GET', '/sellerItems/{itemId}'],
        'fetch'     => ['GET', '/sellerItems?_offset={offset}&_limit={limit}'],
    ];

    public function getPool()
    {
        if (!$this->pool) {
            $this->pool = new Pool();
        }

        return $this->pool;
    }

    public function update(EntityInterface $entity, EntityInterface $existent)
    {
    }

    public function save(EntityInterface $entity, $route = 'save')
    {
        $existent = $entity->getPrevious();
        if ($existent) {
            return $this->update($entity, $existent);
        }

        return $this->getPool()->add($entity);
    }

    public function commit()
    {
        return $this->execute($this->factoryMap('save'), $this->getPool()->toJson());
    }

}
