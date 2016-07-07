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
