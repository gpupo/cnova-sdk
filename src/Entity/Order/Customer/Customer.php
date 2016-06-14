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
namespace Gpupo\CnovaSdk\Entity\Order\Customer;

use Gpupo\CommonSdk\Entity\EntityAbstract;
use Gpupo\CommonSdk\Entity\EntityInterface;

/**
 * @method string getId()
 * @method setId(string $id)
 * @method string getName()
 * @method setName(string $name)
 * @method string getDocumentNumber()
 * @method setDocumentNumber(string $documentNumber)
 * @method string getType()
 * @method setType(string $type)
 * @method string getCreatedAt()
 * @method setCreatedAt(string $createdAt)
 * @method string getEmail()
 * @method setEmail(string $email)
 * @method \Gpupo\CommonSdk\Entity\EntityInterface getPhones()
 * @method setPhones(\Gpupo\CommonSdk\Entity\EntityInterface $phones)
 */
class Customer extends EntityAbstract implements EntityInterface
{
    public function getSchema()
    {
        return  [
            'id'             => 'string',
            'name'           => 'string',
            'documentNumber' => 'string',
            'type'           => 'string',
            'createdAt'      => 'string',
            'email'          => 'string',
            'phones'         => 'object',
        ];
    }
}
