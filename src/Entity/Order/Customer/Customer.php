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
