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

namespace Gpupo\CnovaSdk\Entity\Order;

use Gpupo\CommonSdk\Entity\EntityAbstract;
use Gpupo\CommonSdk\Entity\EntityInterface;

/**
 * @method string getId()
 * @method setId(string $id)
 * @method string getOrderMarketplaceId()
 * @method setOrderMarketplaceId(string $orderMarketplaceId)
 * @method string getPaymentType()
 * @method setPaymentType(string $paymentType)
 * @method string getPurchasedAt()
 * @method setPurchasedAt(string $purchasedAt)
 * @method string getApprovedAt()
 * @method setApprovedAt(string $approvedAt)
 * @method string getStatus()
 * @method setStatus(string $status)
 * @method float getTotalAmount()
 * @method setTotalAmount(float $totalAmount)
 * @method float getTotalDiscountAmount()
 * @method setTotalDiscountAmount(float $totalDiscountAmount)
 * @method Gpupo\CnovaSdk\Entity\Order\Billing\Billing getBilling()
 * @method setBilling(Gpupo\CnovaSdk\Entity\Order\Billing\Billing $billing)
 * @method Gpupo\CnovaSdk\Entity\Order\Customer\Customer getCustomer()
 * @method setCustomer(Gpupo\CnovaSdk\Entity\Order\Customer\Customer $customer)
 * @method Gpupo\CnovaSdk\Entity\Order\Freight\Freight getFreight()
 * @method setFreight(Gpupo\CnovaSdk\Entity\Order\Freight\Freight $freight)
 * @method Gpupo\CnovaSdk\Entity\Order\Items\Items getItems()
 * @method setItems(Gpupo\CnovaSdk\Entity\Order\Items\Items $items)
 * @method Gpupo\CnovaSdk\Entity\Order\Shipping\Shipping getShipping()
 * @method setShipping(Gpupo\CnovaSdk\Entity\Order\Shipping\Shipping $shipping)
 * @method Gpupo\CnovaSdk\Entity\Order\Trackings\Trackings getTrackings()
 * @method setTrackings(Gpupo\CnovaSdk\Entity\Order\Trackings\Trackings $trackings)
 */
class Order extends EntityAbstract implements EntityInterface
{
    public function getSchema()
    {
        return  [
            'id'                  => 'string',
            'orderMarketplaceId'  => 'string',
            'paymentType'         => 'string',
            'purchasedAt'         => 'string',
            'approvedAt'          => 'string',
            'status'              => 'string',
            'totalAmount'         => 'number',
            'totalDiscountAmount' => 'number',
            'billing'             => 'object',
            'customer'            => 'object',
            'freight'             => 'object',
            'items'               => 'object',
            'shipping'            => 'object',
            'trackings'           => 'object',
        ];
    }
}
