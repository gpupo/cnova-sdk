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
use Gpupo\CommonSdk\Traits\PoolTrait;

class Manager extends ManagerAbstract
{
    use PoolTrait;

    protected $entity = 'Product';

    protected $maps = [
        'save'          => ['POST', '/loads/products'],
        'updateStatus'  => ['PUT', '/sellerItems/{itemId}/status'],    //Ativação/Desativação de produto no Marketplace
        'updateStock'   => ['PUT', '/sellerItems/{itemId}/stock'],     //Atualização do estoque do item
        'updatePrice'   => ['PUT', '/sellerItems/{itemId}/prices'],    //Atualização do preço do item
        'findById'      => ['GET', '/loads/products/{itemId}'],
        'fetch'         => ['GET', '/sellerItems?_offset={offset}&_limit={limit}'],
    ];


    public function update(EntityInterface $entity, EntityInterface $existent)
    {
        $updated = [];

        foreach(['Stock', 'Price', 'Status'] as $key) {
            $getter = 'get' . $key;
            if ($this->attributesDiff($existent->$getter(), $existent->$getter())) {
                $method = 'update'.$key;
                $updated[$key] = $this->$method($entity);
            }
        }

        return $updated;
    }

    public function save(EntityInterface $entity, $route = 'save')
    {
        $existent = $entity->getPrevious();
        if ($existent) {
            return $this->update($entity, $existent);
        }

        return $this->getPool()->add($entity);
    }

    protected function getMap($route, EntityInterface $entity)
    {
        return $this->factoryMap($route, ['itemId' => $entity->getSkuSellerId()]);
    }

    /**
     * @todo Implementar atualização de status
     */
    protected function updateStatus(EntityInterface $entity)
    {
        //$map = $this->getMap('updateStatus', $entity);

        return false;
    }

    protected function updatePrice(EntityInterface $entity)
    {
        $map = $this->getMap('updatePrice', $entity);

        return $this->execute($map, $entity->getPrice()->toJson());
    }

    protected function updateStock(EntityInterface $entity)
    {
        $map = $this->getMap('updateStock', $entity);

        return $this->execute($map, $entity->getStock()->toJson());
    }

    public function commit()
    {
        if ($this->getPool()->count() > 0) {
            return $this->execute($this->factoryMap('save'), $this->getPool()->toJson());
        }

        return false;
    }
}
