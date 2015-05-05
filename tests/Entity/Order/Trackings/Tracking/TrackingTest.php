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

use Gpupo\CnovaSdk\Entity\Order\Trackings\Tracking\Tracking;
use Gpupo\Tests\CnovaSdk\Entity\Order\OrderTestCaseAbstract;

class TrackingTest extends OrderTestCaseAbstract
{
    public static function setUpBeforeClass()
    {
        self::displayClassDocumentation(new Tracking());
    }

    public function testInválidoComRastreamentoAusente()
    {
        return $this->markIncomplete();
    }

    public function testInválidoComNotaFiscalAusente()
    {
        return $this->markIncomplete();
    }

    public function testVálidoComDadosCompletos()
    {
        return $this->markIncomplete();
    }
}
