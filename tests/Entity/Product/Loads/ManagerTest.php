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

namespace Gpupo\Tests\CnovaSdk\Entity\Product\Loads;

class ManagerTest extends TestCaseAbstract
{
    public function testObtemListaDeSituacoesDeProdutos()
    {
        $loads = $this->getLoads();

        $this->assertInstanceOf('\Gpupo\CnovaSdk\Entity\Product\Loads\LoadsCollection', $loads);

        return $loads;
    }

    public function testPermiteAcessoAListaDeProdutosComErro()
    {
        $manager = $this->getManager('Errors.json');
        $loads = $manager->fetch(0, 20, ['status' => 'Error']);

        foreach ($loads as $product) {
            $this->assertSame('Error', $product->getStatus());
        }
    }
}
