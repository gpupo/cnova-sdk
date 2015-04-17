<?php


namespace Gpupo\CnovaSdk\Entity\Product;

use Gpupo\CommonSdk\Entity\EntityInterface;
use Gpupo\CnovaSdk\Entity\ManagerAbstract;

class Manager extends ManagerAbstract
{
    protected $entity = 'Product';

    protected $maps = [
        'findById'  => ['GET', '/sellerItems/{itemId}'],
        'fetch'     => ['GET', '/sellerItems?offset={offset}&limit={limit}'],
    ];

    public function update(EntityInterface $entity, EntityInterface $existent)
    {

    }

}
