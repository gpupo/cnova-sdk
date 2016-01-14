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

namespace Gpupo\Tests\CnovaSdk\Entity;

use Gpupo\CnovaSdk\Entity\MetadataContainerAbstract;
use Gpupo\Tests\CnovaSdk\TestCaseAbstract;

abstract class MetadataContainerTestAbstract extends TestCaseAbstract
{
    abstract public function dataProviderContainer();

    /**
     * @dataProvider dataProviderContainer
     */
    public function testÉUmObjetoMetadataContainer(MetadataContainerAbstract $container)
    {
        $this->assertInstanceOf('\Gpupo\CnovaSdk\Entity\MetadataContainerAbstract', $container);
    }

    /**
     * @dataProvider dataProviderContainer
     */
    public function testPossuiObjetoMetadata(MetadataContainerAbstract $container)
    {
        $this->assertInstanceOf('\Gpupo\CnovaSdk\Entity\Metadata', $container->getMetadata());
    }

    /**
     * @dataProvider dataProviderContainer
     */
    public function testPossuiPropriedadeIndicadoraDeQuantidadeDeRegistros(MetadataContainerAbstract $container, array $expected)
    {
        $this->assertSame($container->getMetadata()->getTotalRows(), $expected['totalRows']);
    }
}
