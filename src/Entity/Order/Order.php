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
 * @method mixed getTotalAmount()
 * @method setTotalAmount(mixed $totalAmount)
 * @method mixed getTotalDiscountAmount()
 * @method setTotalDiscountAmount(mixed $totalDiscountAmount)
 * @method \Gpupo\CommonSdk\Entity\EntityInterface getBilling()
 * @method setBilling(\Gpupo\CommonSdk\Entity\EntityInterface $billing)
 * @method \Gpupo\CommonSdk\Entity\EntityInterface getCustomer()
 * @method setCustomer(\Gpupo\CommonSdk\Entity\EntityInterface $customer)
 * @method \Gpupo\CommonSdk\Entity\EntityInterface getFreight()
 * @method setFreight(\Gpupo\CommonSdk\Entity\EntityInterface $freight)
 * @method \Gpupo\CommonSdk\Entity\EntityInterface getItems()
 * @method setItems(\Gpupo\CommonSdk\Entity\EntityInterface $items)
 * @method \Gpupo\CommonSdk\Entity\EntityInterface getShipping()
 * @method setShipping(\Gpupo\CommonSdk\Entity\EntityInterface $shipping)
 * @method \Gpupo\CommonSdk\Entity\EntityInterface getTrackings()
 * @method setTrackings(\Gpupo\CommonSdk\Entity\EntityInterface $trackings)
 */
class Order extends EntityAbstract implements EntityInterface
{
    public function getSchema()
    {
        return  [
            'id'                    => 'string',
            'orderMarketplaceId'    => 'string',
            'paymentType'           => 'string',
            'purchasedAt'           => 'string',
            'approvedAt'            => 'string',
            'status'                => 'string',
            'totalAmount'           => 'number',
            'totalDiscountAmount'   => 'number',
            'billing'               => 'object',
            'customer'              => 'object',
            'freight'               => 'object',
            'items'                 => 'object',
            'shipping'              => 'object',
            'trackings'             => 'object',
        ];
    }
}
