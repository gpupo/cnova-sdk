<?php

/*
 * This file is part of gpupo/cnova-sdk
 * Created by Gilmar Pupo <contact@gpupo.com>
 * For the information of copyright and license you should read the file
 * LICENSE which is distributed with this source code.
 * Para a informação dos direitos autorais e de licença você deve ler o arquivo
 * LICENSE que é distribuído com este código-fonte.
 * Para obtener la información de los derechos de autor y la licencia debe leer
 * el archivo LICENSE que se distribuye con el código fuente.
 * For more information, see <https://opensource.gpupo.com/>.
 */

namespace Gpupo\Tests\CnovaSdk\Entity\Order\Trackings\Tracking;

use Gpupo\CnovaSdk\Entity\Order\Trackings\Tracking\Carrier;
use Gpupo\CnovaSdk\Entity\Order\Trackings\Tracking\Invoice;
use Gpupo\CnovaSdk\Entity\Order\Trackings\Tracking\Tracking;
use Gpupo\Tests\CnovaSdk\Entity\Order\OrderTestCaseAbstract;

class TrackingTest extends OrderTestCaseAbstract
{
    public static function setUpBeforeClass()
    {
        self::displayClassDocumentation(new Tracking());
    }

    protected function getFixture()
    {
        return require $this->getResourceFilePath('fixture/Order/tracking.php');
    }

    public function factoryTracking()
    {
        return new Tracking($this->getFixture());
    }

    public function testValida()
    {
        $tracking = $this->factoryTracking();
        $this->assertTrue($tracking->isValid());

        return $tracking;
    }

    /**
     * @depends testValida
     */
    public function testPossuiListaDeItems(Tracking $tracking)
    {
        $this->assertTrue($tracking->isValid());
        $this->assertContains('23236199-1', $tracking->getItems());

        return $tracking;
    }

    /**
     * @depends testValida
     */
    public function testPossuiDadosDaTransportadora(Tracking $tracking)
    {
        $carrier = $tracking->getCarrier();
        $this->assertTrue($tracking->isValid());
        $this->assertInstanceOf('\Gpupo\CnovaSdk\Entity\Order\Trackings\Tracking\Carrier', $carrier);
        $this->assertSame('ECT', $carrier->getName());
    }

    /**
     * @expectedException \Gpupo\CommonSdk\Exception\ExceptionInterface
     */
    public function testInválidoComRastreamentoAusente()
    {
        $tracking = $this->factoryTracking();
        $tracking->setNumber('');
        $tracking->toJson();
    }

    /**
     * @expectedException \Gpupo\CommonSdk\Exception\ExceptionInterface
     */
    public function testInválidoComNotaFiscalAusente()
    {
        $tracking = $this->factoryTracking();
        $tracking->setInvoice(new Invoice([]));
        $tracking->toJson();
    }

    /**
     * @expectedException \Gpupo\CommonSdk\Exception\ExceptionInterface
     */
    public function testInválidoComTransportadoraAusente()
    {
        $tracking = $this->factoryTracking();
        $tracking->setCarrier(new Carrier([]));
        $tracking->toJson();
    }

    public function testVálidoComDadosCompletos()
    {
        $tracking = $this->factoryTracking();
        $this->assertTrue($tracking->isValid());
    }

    public function testPossuiFormatoParaAtualizaçãoDeOrder()
    {
        $tracking = $this->factoryTracking();
        $json = $tracking->toJson();
        $array = json_decode($json, true);

        $this->assertSame($this->getFixture(), $array);
    }
}
