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
 * @method string getId();
 * @method setId(string);
 * @method string getOrderMarketplaceId();
 * @method setOrderMarketplaceId(string);
 * @method string getPaymentType();
 * @method setPaymentType(string);
 * @method string getPurchasedAt();
 * @method setPurchasedAt(string);
 * @method string getApprovedAt();
 * @method setApprovedAt(string);
 * @method string getStatus();
 * @method setStatus(string);
 * @method mixed getTotalAmount();
 * @method setTotalAmount(mixed);
 * @method mixed getTotalDiscountAmount();
 * @method setTotalDiscountAmount(mixed);
 * @method \Gpupo\CommonSdk\Entity\EntityInterface getBilling();
 * @method setBilling(\Gpupo\CommonSdk\Entity\EntityInterface);
 * @method \Gpupo\CommonSdk\Entity\EntityInterface getCustomer();
 * @method setCustomer(\Gpupo\CommonSdk\Entity\EntityInterface);
 * @method \Gpupo\CommonSdk\Entity\EntityInterface getFreight();
 * @method setFreight(\Gpupo\CommonSdk\Entity\EntityInterface);
 * @method \Gpupo\CommonSdk\Entity\EntityInterface getItems();
 * @method setItems(\Gpupo\CommonSdk\Entity\EntityInterface);
 * @method \Gpupo\CommonSdk\Entity\EntityInterface getShipping();
 * @method setShipping(\Gpupo\CommonSdk\Entity\EntityInterface);
 * @method \Gpupo\CommonSdk\Entity\EntityInterface getTrackings();
 * @method setTrackings(\Gpupo\CommonSdk\Entity\EntityInterface);
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
