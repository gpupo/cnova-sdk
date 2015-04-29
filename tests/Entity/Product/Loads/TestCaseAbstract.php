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

namespace Gpupo\Tests\CnovaSdk\Entity\Product\Loads;

use Gpupo\CnovaSdk\Entity\Product\Loads\Loads;
use Gpupo\CnovaSdk\Entity\Product\Loads\Metadata;
use Gpupo\Tests\CnovaSdk\TestCaseAbstract as TestCaseMain;

abstract class TestCaseAbstract extends TestCaseMain
{
    protected function getManager()
    {
        return $this->getFactory()->factoryManager('loads');
    }

    protected function factoryMockup($filename)
    {
        return $this->factoryResponseFromFixture('fixture/Product/Loads/'.$filename);
    }

    protected function getLoads()
    {
        $manager = $this->getManager();
        $manager->setDryRun($this->factoryMockup('Loads.json'));

        return $manager->fetch();
    }
}
