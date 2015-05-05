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

namespace Gpupo\CnovaSdk\Entity\Product;

use Gpupo\CommonSdk\Entity\EntityAbstract;
use Gpupo\CommonSdk\Entity\EntityInterface;

/**
 * @method string getSkuSellerId();
 * @method setSkuSellerId(string);
 * @method string getSkuId();
 * @method setSkuId(string);
 * @method string getProductSellerId();
 * @method setProductSellerId(string);
 * @method string getTitle();
 * @method setTitle(string);
 * @method string getDescription();
 * @method setDescription(string);
 * @method string getBrand();
 * @method setBrand(string);
 * @method array getGtin();
 * @method setGtin(array);
 * @method array getCategories();
 * @method setCategories(array);
 * @method array getImages();
 * @method setImages(array);
 * @method array getVideos();
 * @method setVideos(array);
 * @method \Gpupo\CommonSdk\Entity\EntityInterface getPrice();
 * @method setPrice(\Gpupo\CommonSdk\Entity\EntityInterface);
 * @method \Gpupo\CommonSdk\Entity\EntityInterface getStock();
 * @method setStock(\Gpupo\CommonSdk\Entity\EntityInterface);
 * @method \Gpupo\CommonSdk\Entity\EntityInterface getDimensions();
 * @method setDimensions(\Gpupo\CommonSdk\Entity\EntityInterface);
 * @method \Gpupo\CommonSdk\Entity\EntityInterface getGiftWrap();
 * @method setGiftWrap(\Gpupo\CommonSdk\Entity\EntityInterface);
 * @method \Gpupo\CommonSdk\Entity\EntityInterface getAttributes();
 * @method setAttributes(\Gpupo\CommonSdk\Entity\EntityInterface);
 */
class Product extends EntityAbstract implements EntityInterface
{
    protected $primaryKey = 'skuSellerId';

    public function getSchema()
    {
        return [
            'skuSellerId'     => 'string',
            'skuId'           => 'string',
            'productSellerId' => 'string',
            'title'           => 'string',
            'description'     => 'string',
            'brand'           => 'string',
            'gtin'            => 'array',
            'categories'      => 'array',
            'images'          => 'array',
            'videos'          => 'array',
            'price'           => 'object',
            'stock'           => 'object',
            'dimensions'      => 'object',
            'giftWrap'        => 'object',
            'attributes'      => 'object',
        ];
    }
}
