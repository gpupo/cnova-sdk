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

namespace Gpupo\Tests\CnovaSdk;

use Gpupo\CnovaSdk\Factory;
use Gpupo\Tests\CommonSdk\TestCaseAbstract as CommonSdkTestCaseAbstract;

abstract class TestCaseAbstract extends CommonSdkTestCaseAbstract
{
    private $factory;

    protected function getResourcesPath()
    {
        return dirname(dirname(__FILE__)).'/Resources/';
    }

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
            $this->factory = Factory::getInstance()->setup($this->getOptions(), $this->getLogger());
        }

        return $this->factory;
    }

    /**
     * Requer Implementação mas não será abstrato para não impedir testes que não o usam.
     */
    protected function getManager($filename = null)
    {
        unset($filename);

        return;
    }

    protected function hasToken()
    {
        return $this->hasConstant('ACCESS_TOKEN');
    }

    public function dataProviderProducts()
    {
        $manager = $this->getFactory()->factoryManager('product');
        $manager->setDryRun($this->factoryResponseFromFixture('fixture/Product/sellerItems.json'));

        $list = [];

        foreach ($manager->fetch() as $product) {
            $list[] = [$product];
        }

        return $list;
    }
}
