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

use Gpupo\CommonSdk\Entity\EntityInterface;
use Gpupo\CommonSdk\Entity\ManagerAbstract as CommonAbstract;
use Gpupo\CommonSdk\Entity\ManagerInterface;

abstract class ManagerAbstract extends CommonAbstract implements ManagerInterface
{
    protected $entity;

    /**
     * @return Gpupo\Common\Entity\CollectionAbstract|null
     */
    protected function fetchPrepare($data)
    {
        if (!empty($data)) {
            return $this->factoryEntityCollection($data->toArray());
        }
    }

    /**
     * @return Gpupo\Common\Entity\CollectionAbstract|null
     */
    public function fetch($offset = 0, $limit = 50, array $parameters = [])
    {
        $data = parent::fetch($offset, $limit, $parameters);

        return $this->fetchPrepare($data);
    }

    /**
     * @return Gpupo\Common\Entity\CollectionAbstract|null
     */
    public function findById($itemId)
    {
        $data = parent::findById($itemId);

        if (!empty($data)) {
            return $this->factoryEntity($data->toArray());
        }
    }

    /**
     * {@inheritDoc}
     */
    public function update(EntityInterface $entity, EntityInterface $existent)
    {
        $text = 'Chamada a Atualização de entity '.$this->entity;

        return $this->log('debug', $text, [
            'entity'    => $entity,
            'existent'  => $existent,
        ]);
    }

    /**
     * {@inheritDoc}
     *
     * Tenta 3 vezes em caso de erro do lado servidor.
     */
    protected function retry(\Exception $exception, $i)
    {
        if ($i <= 2 && $exception->getCode() >= 500) {
            return true;
        }

        return false;
    }
}
