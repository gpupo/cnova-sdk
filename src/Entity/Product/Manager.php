<?php

/*
 * This file is part of gpupo/cnova-sdk
 * Created by Gilmar Pupo <g@g1mr.com>
 * For the information of copyright and license you should read the file
 * LICENSE which is distributed with this source code.
 * Para a informação dos direitos autorais e de licença você deve ler o arquivo
 * LICENSE que é distribuído com este código-fonte.
 * Para obtener la información de los derechos de autor y la licencia debe leer
 * el archivo LICENSE que se distribuye con el código fuente.
 * For more information, see <http://www.g1mr.com/>.
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
        'save'         => ['POST', '/loads/products'],
        'updateStatus' => ['PUT', '/sellerItems/{itemId}/status'], //Ativação/Desativação de produto no Marketplace
        'updateStock'  => ['PUT', '/sellerItems/{itemId}/stock'], //Atualização do estoque do item
        'updatePrice'  => ['PUT', '/sellerItems/{itemId}/prices'], //Atualização do preço do item
        'findById'     => ['GET', '/loads/products/{itemId}'],
        'fetch'        => ['GET', '/sellerItems?_offset={offset}&_limit={limit}&status={status}&createdAt={createdAt}'],
    ];

    /**
     * {@inheritdoc}
     */
    public function update(EntityInterface $entity, EntityInterface $existent)
    {
        parent::update($entity, $existent);

        $updated = [];

        foreach ([
            'Stock',
            'Price',
            //'Status'
        ] as $key) {
            $getter = 'get'.$key;
            if ($this->attributesDiff($entity->$getter(), $existent->$getter())) {
                $method = 'update'.$key;
                $updated[$key] = $this->$method($entity);
            }
        }

        $atualizado = !empty($updated);

        $context = [
            'id'         => $entity->getId(),
            'atualizado' => $atualizado,
            'atributos'  => $updated,
        ];

        $this->log('info', 'Operação de Atualização de entity '
            .$this->entity, $context);

        return $atualizado;
    }

    public function save(EntityInterface $product, $route = 'save')
    {
        $existent = $product->getPrevious();

        $this->log('INFO', 'save', ['route' => $route, 'existent' => $existent]);

        if ($existent) {
            return $this->update($product, $existent);
        }

        return $this->getPool()->add($product);
    }

    protected function getMap($route, Product $product)
    {
        return $this->factoryMap($route, ['itemId' => $product->getId()]);
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

    protected function updateStatus(Product $product)
    {
        $map = $this->getMap('updateStatus', $product);

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
