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
