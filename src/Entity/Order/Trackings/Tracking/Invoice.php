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
