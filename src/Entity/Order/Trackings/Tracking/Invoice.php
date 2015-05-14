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

namespace Gpupo\CnovaSdk\Entity\Order\Trackings\Tracking;

use Gpupo\CommonSdk\Entity\EntityAbstract;
use Gpupo\CommonSdk\Entity\EntityInterface;

/**
 * @method string getCnpj()
 * @method setCnpj(string $cnpj)
 * @method string getNumber()
 * @method setNumber(string $number)
 * @method string getSerie()
 * @method setSerie(string $serie)
 * @method string getIssuedAt()
 * @method setIssuedAt(string $issuedAt)
 * @method string getAccessKey()
 * @method setAccessKey(string $accessKey)
 * @method string getLinkXML()
 * @method setLinkXML(string $linkXML)
 * @method string getLinkDanfe()
 * @method setLinkDanfe(string $linkDanfe)
 */
class Invoice extends EntityAbstract implements EntityInterface
{
    public function getSchema()
    {
        return  [
            'cnpj'      => 'string',
            'number'    => 'string',
            'serie'     => 'string',
            'issuedAt'  => 'string',
            'accessKey' => 'string',
            'linkXML'   => 'string',
            'linkDanfe' => 'string',
        ];
    }

    public function setUp()
    {
        $this->setRequiredSchema(['cnpj', 'number', 'serie', 'accessKey']);
    }
}
