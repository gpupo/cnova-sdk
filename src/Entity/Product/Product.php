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
namespace Gpupo\CnovaSdk\Entity\Product;

use Gpupo\CommonSdk\Entity\EntityAbstract;
use Gpupo\CommonSdk\Entity\EntityInterface;

/**
 * @method string getSkuSellerId()
 * @method setSkuSellerId(string $skuSellerId)
 * @method string getSkuId()
 * @method setSkuId(string $skuId)
 * @method string getProductSellerId()
 * @method setProductSellerId(string $productSellerId)
 * @method string getTitle()
 * @method setTitle(string $title)
 * @method string getDescription()
 * @method setDescription(string $description)
 * @method string getBrand()
 * @method setBrand(string $brand)
 * @method array getGtin()
 * @method setGtin(array $gtin)
 * @method array getCategories()
 * @method setCategories(array $categories)
 * @method array getImages()
 * @method setImages(array $images)
 * @method array getVideos()
 * @method setVideos(array $videos)
 * @method \Gpupo\CommonSdk\Entity\EntityInterface getPrice()
 * @method setPrice(\Gpupo\CommonSdk\Entity\EntityInterface $price)
 * @method \Gpupo\CommonSdk\Entity\EntityInterface getStock()
 * @method setStock(\Gpupo\CommonSdk\Entity\EntityInterface $stock)
 * @method \Gpupo\CommonSdk\Entity\EntityInterface getDimensions()
 * @method setDimensions(\Gpupo\CommonSdk\Entity\EntityInterface $dimensions)
 * @method \Gpupo\CommonSdk\Entity\EntityInterface getGiftWrap()
 * @method setGiftWrap(\Gpupo\CommonSdk\Entity\EntityInterface $giftWrap)
 * @method \Gpupo\CommonSdk\Entity\EntityInterface getAttributes()
 * @method setAttributes(\Gpupo\CommonSdk\Entity\EntityInterface $attributes)
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
