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
        $this->assertEquals('111111111111', $invoice->getCnpj());

        return $invoice;
    }

    /**
     * @depends testPossuiCnpj
     */
    public function testPossuiChaveDeAcesso(Invoice $invoice)
    {
        $this->assertEquals('fooBarZetaJones', $invoice->getAccessKey());
    }
}
