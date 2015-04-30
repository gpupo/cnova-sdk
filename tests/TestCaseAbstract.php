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

namespace Gpupo\Tests\CnovaSdk;

use Gpupo\CnovaSdk\Factory;
use Gpupo\Tests\CommonSdk\TestCaseAbstract as CommonSdkTestCaseAbstract;

abstract class TestCaseAbstract extends CommonSdkTestCaseAbstract
{
    private $factory;

    public function factoryClient()
    {
        return $this->getFactory()->getClient();
    }

    protected function getOptions()
    {
        return [
            'client_id'         => $this->getConstant('CLIENT_ID'),
            'access_token'      => $this->getConstant('ACCESS_TOKEN'),
            'verbose'           => $this->getConstant('VERBOSE'),
            'dryrun'            => $this->getConstant('DRYRUN'),
            'registerPath'      => $this->getConstant('REGISTER_PATH'),
        ];
    }

    protected function getFactory()
    {
        if (!$this->factory) {
            $this->factory = new Factory($this->getOptions(), $this->getLogger());
        }

        return $this->factory;
    }

    protected function hasToken()
    {
        return $this->hasConstant('ACCESS_TOKEN');
    }

    public function dataProviderProducts()
    {
        return $this->getResourceJson('fixture/Product/Products.json');
    }

    public function dataProviderOrders()
    {
        return $this->getResourceJson('fixture/Order/Orders.json');
    }
}
