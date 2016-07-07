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

namespace Gpupo\Tests\CnovaSdk\Entity\Order\Trackings\Tracking;

use Gpupo\CnovaSdk\Entity\Order\Trackings\Tracking\Invoice;
use Gpupo\Tests\CnovaSdk\Entity\Order\OrderTestCaseAbstract;

class InvoiceTest extends OrderTestCaseAbstract
{
    public static function setUpBeforeClass()
    {
        self::displayClassDocumentation(new Invoice());
    }

    protected function factoryInvoice()
    {
        return new Invoice([
            'cnpj'      => '111111111111',
            'number'    => '2456',
            'serie'     => '1',
            'issuedAt'  => '2015-05-04T14:54:29.000-03:00',
            'accessKey' => 'fooBarZetaJones',
            'linkXML'   => 'http://foo/bar',
            'linkDanfe' => 'http://bar/foo',
        ]);
    }

    public function testPossuiCnpj()
    {
        $invoice = $this->factoryInvoice();
        $this->assertSame('111111111111', $invoice->getCnpj());

        return $invoice;
    }

    /**
     * @depends testPossuiCnpj
     */
    public function testPossuiChaveDeAcesso(Invoice $invoice)
    {
        $this->assertSame('fooBarZetaJones', $invoice->getAccessKey());
    }
}
