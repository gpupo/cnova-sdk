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
