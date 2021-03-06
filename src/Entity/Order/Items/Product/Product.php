<?php

/*
 * This file is part of gpupo/cnova-sdk
 * Created by Gilmar Pupo <contact@gpupo.com>
 * For the information of copyright and license you should read the file
 * LICENSE which is distributed with this source code.
 * Para a informação dos direitos autorais e de licença você deve ler o arquivo
 * LICENSE que é distribuído com este código-fonte.
 * Para obtener la información de los derechos de autor y la licencia debe leer
 * el archivo LICENSE que se distribuye con el código fuente.
 * For more information, see <https://opensource.gpupo.com/>.
 */

namespace Gpupo\CnovaSdk\Entity\Order\Items\Product;

use Gpupo\CommonSdk\Entity\EntityAbstract;
use Gpupo\CommonSdk\Entity\EntityInterface;

/**
 * @method string getId()
 * @method setId(string $id)
 * @method string getSkuSellerId()
 * @method setSkuSellerId(string $skuSellerId)
 * @method string getName()
 * @method setName(string $name)
 * @method float getSalePrice()
 * @method setSalePrice(float $salePrice)
 * @method bool getSent()
 * @method setSent(boolean $sent)
 * @method Gpupo\CnovaSdk\Entity\Order\Items\Product\Freight\Freight getFreight()
 * @method setFreight(Gpupo\CnovaSdk\Entity\Order\Items\Product\Freight\Freight $freight)
 * @method Gpupo\CnovaSdk\Entity\Order\Items\Product\GiftWrap\GiftWrap getGiftWrap()
 * @method setGiftWrap(Gpupo\CnovaSdk\Entity\Order\Items\Product\GiftWrap\GiftWrap $giftWrap)
 */
class Product extends EntityAbstract implements EntityInterface
{
    public function getSchema()
    {
        return  [
            'id'          => 'string',
            'skuSellerId' => 'string',
            'name'        => 'string',
            'salePrice'   => 'number',
            'sent'        => 'boolean',
            'freight'     => 'object',
            'giftWrap'    => 'object',
        ];
    }
}
