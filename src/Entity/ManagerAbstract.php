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
use Gpupo\CommonSdk\Entity\EntityInterface;

abstract class ManagerAbstract extends CommonAbstract implements ManagerInterface
{
    protected $entity;

    public function fetch($offset = 0, $limit = 50, array $parameters = [])
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
     */
    public function update(EntityInterface $entity, EntityInterface $existent)
    {
        $text = 'Chamada a Atualização de entity '. $this->entity;
        
        return $this->log('debug', $text, [
            'entity'    => $entity,
            'existent'  => $existent,
        ]);
    }

    /**
     * {@inheritDoc}
     *
     * Faz pausa de 1 minuto em caso de "maximum allowed rate"
     *
     * Ao ultrapassar o limite de requests por minutos a API retorna
     * mensagem com http status code 429, com a mensagem
     * "Your requests have exceeded the maximum allowed rate (X)",
     * onde X representa o número máximo de request que você deve respeitar.
     */
    protected function retry(\Exception $exception, $i)
    {
        if ($i <= 2 && $exception->getCode() === 429) {
            sleep(60);

            return true;
        }

        return false;
    }
}
