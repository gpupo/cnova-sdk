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
use Gpupo\Tests\CnovaSdk\TestCaseAbstract as TestCaseMain;

abstract class TestCaseAbstract extends TestCaseMain
{
    protected function getManager($filename = null)
    {
        if (empty($filename)) {
            $filename = 'Loads.json';
        }

        $manager = $this->getFactory()->factoryManager('loads');
        $manager->setDryRun($this->factoryResponseFromFixture('fixture/Product/Loads/'.$filename));

        return $manager;
    }

    protected function getLoads()
    {
        return $this->getManager()->fetch();
    }
}
