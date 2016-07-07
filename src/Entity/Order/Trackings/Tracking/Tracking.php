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
 * @method array getItems()
 * @method setItems(array $items)
 * @method string getControlPoint()
 * @method setControlPoint(string $controlPoint)
 * @method string getDescription()
 * @method setDescription(string $description)
 * @method string getOccurredAt()
 * @method setOccurredAt(string $occurredAt)
 * @method Gpupo\CnovaSdk\Entity\Order\Trackings\Tracking\Carrier getCarrier()
 * @method setCarrier(Gpupo\CnovaSdk\Entity\Order\Trackings\Tracking\Carrier $carrier)
 * @method string getUrl()
 * @method setUrl(string $url)
 * @method string getNumber()
 * @method setNumber(string $number)
 * @method string getSellerDeliveryId()
 * @method setSellerDeliveryId(string $sellerDeliveryId)
 * @method string getCte()
 * @method setCte(string $cte)
 * @method Gpupo\CnovaSdk\Entity\Order\Trackings\Tracking\Invoice getInvoice()
 * @method setInvoice(Gpupo\CnovaSdk\Entity\Order\Trackings\Tracking\Invoice $invoice)
 */
class Tracking extends EntityAbstract implements EntityInterface
{
    public function getSchema()
    {
        return  [
            'items'            => 'array',
            'controlPoint'     => 'string',
            'description'      => 'string',
            'occurredAt'       => 'string',
            'carrier'          => 'object',
            'url'              => 'string',
            'number'           => 'string',
            'sellerDeliveryId' => 'string',
            'cte'              => 'string',
            'invoice'          => 'object',
        ];
    }

    public function setUp()
    {
        $this->setRequiredSchema(['number', 'sellerDeliveryId']);
        $this->setOptionalSchema(['controlPoint', 'description', 'cte', 'url']);
    }
}
