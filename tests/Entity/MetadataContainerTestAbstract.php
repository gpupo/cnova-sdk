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

namespace Gpupo\Tests\CnovaSdk\Entity;

use Gpupo\Tests\CnovaSdk\TestCaseAbstract;
use Gpupo\CnovaSdk\Entity\MetadataContainerAbstract;

abstract class MetadataContainerTestAbstract extends TestCaseAbstract
{
    abstract public function dataProviderContainer();

    /**
     * @dataProvider dataProviderContainer
     */
    public function testPossuiPropriedadeIndicadoraDeQuantidadeDeRegistros(Array $expected, MetadataContainerAbstract $container)
    {
        $this->assertEquals($expected['totalRows'], $container->getMetadata()->getTotalRows());
    }

}
