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

use Gpupo\CommonSdk\Entity\ManagerAbstract as CommonAbstract;
use Gpupo\CommonSdk\Entity\ManagerInterface;

abstract class ManagerAbstract extends CommonAbstract implements ManagerInterface
{
    protected $entity;

    public function fetch($offset = 1, $limit = 50, array $parameters = [])
    {
        $data = parent::fetch($offset, $limit, $parameters);

        if ($data->getTotal() > 0) {
            $method = 'get'.$this->getEntityName().'s';

            return $this->factoryEntityCollection($data->$method());
        }

        return;
    }

    /**
     * {@inheritDoc}
     *
     * Faz pausa de 1 minuto em caso de "maximum allowed rate"
     */
    protected function retry(\Exception $exception, $i)
    {
        if ($i <= 2 && $exception->getCode() >= 500){
            if (strpos('maximum allowed rate', $exception->getMessage())) {
                sleep(60);

                return true;
            }
        }

        return false;
    }


}
