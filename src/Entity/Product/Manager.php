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
use Gpupo\CnovaSdk\Entity\Product\Product;
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


    public function update(EntityInterface $product, EntityInterface $existent)
    {
        $updated = [];

        foreach([
            'Stock',
            'Price',
            //'Status'
        ] as $key) {
            $getter = 'get' . $key;
            if ($this->attributesDiff($product->$getter(), $existent->$getter())) {
                $method = 'update'.$key;
                $updated[$key] = $this->$method($product);
            }
        }

        $atualizado = !empty($updated);

        $context = [
            'id'            =>  $product->getSkuSellerId(),
            'atualizado'    =>  $atualizado,
            'atributos'     =>  $updated,
        ];

        $this->log('info', 'Atualização de produto', $context);

        return $atualizado;
    }

    public function save(EntityInterface $product, $route = 'save')
    {
        $existent = $product->getPrevious();
        if ($existent) {
            return $this->update($product, $existent);
        }

        return $this->getPool()->add($product);
    }

    protected function getMap($route, Product $product)
    {
        return $this->factoryMap($route, ['itemId' => $product->getId()]);
    }

    /**
     * @todo Implementar atualização de status
     */
    protected function updateStatus(Product $product)
    {
        //$map = $this->getMap('updateStatus', $product);

        return false;
    }

    protected function updatePrice(Product $product)
    {
        $map = $this->getMap('updatePrice', $product);

        return $this->execute($map, $product->getPrice()->toJson());
    }

    protected function updateStock(Product $product)
    {
        $map = $this->getMap('updateStock', $product);

        return $this->execute($map, $product->getStock()->toJson());
    }

    public function commit()
    {
        if ($this->getPool()->count() > 0) {
            return $this->execute($this->factoryMap('save'), $this->getPool()->toJson());
        }

        return false;
    }
}
