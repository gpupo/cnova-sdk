[![Author](http://img.shields.io/badge/author-@gpupo-blue.svg?style=flat-square)](https://twitter.com/gpupo)
[![MIT License](https://img.shields.io/badge/license-MIT-brightgreen.svg)](https://github.com/gpupo/cnova-sdk/blob/master/LICENSE)
[![Build Status](https://secure.travis-ci.org/gpupo/cnova-sdk.png?branch=master)](http://travis-ci.org/gpupo/cnova-sdk)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/gpupo/cnova-sdk/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/gpupo/cnova-sdk/?branch=master)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/a8e4deb5-33f2-4d4b-b5f8-9d9310c6439c/mini.png)](https://insight.sensiolabs.com/projects/a8e4deb5-33f2-4d4b-b5f8-9d9310c6439c)
[![Codacy Badge](https://www.codacy.com/project/badge/1826444de06447b098349808ea0d5ce7)](https://www.codacy.com/app/g/cnova-sdk)
[![Code Climate](https://codeclimate.com/github/gpupo/cnova-sdk/badges/gpa.svg)](https://codeclimate.com/github/gpupo/cnova-sdk)
[![Test Coverage](https://codeclimate.com/github/gpupo/cnova-sdk/badges/coverage.svg)](https://codeclimate.com/github/gpupo/cnova-sdk/coverage)


# Cnova-SDK

SDK Não Oficial para integração a partir de aplicações PHP com as APIs da Cnova Marketplace (Extra.com.br, Pontofrio.com.br, Casasbahia.com.br)

[Documentação Oficial da API V2](https://desenvolvedores.cnova.com/api-portal/docs/apilojista/main/getting-started.html)

## Licença

MIT, see [LICENSE](https://github.com/gpupo/cnova-sdk/blob/master/LICENSE).

---

## Instalação

Adicione o pacote ``cnova-sdk`` ao seu projeto utilizando [composer](http://getcomposer.org):

    composer require gpupo/cnova-sdk

---

### Uso

Este exemplo demonstra o uso simplificado a partir do ``Factory``:


    <?php
    ///...
    use Gpupo\CnovaSdk\Factory;

    $cnovaSdk = Factory::getInstance()
        ->setup(['client_id' => 'foo','client_secret' => 'bar', 'version' => 'sandbox']);

    $manager = $cnovaSdk->factoryManager('product'));

    // Acesso a lista de produtos cadastrados:
    $produtosCadastrados = $manager->fetch(); // Collection de Objetos Product

    // Acesso a informações de um produto cadastrado e com identificador conhecido:
    $produto = $manager->findById(9)); // Objeto Produto
    echo $product->getTitle(); // Acesso ao nome do produto de Id 9


    // Criação de um produto:
    $data = []; // Veja o formato de $data em Resources/fixture/Product/ProductId.json
    $product = $cnovaSdk->createProduct($data);

    //Envio do produto para o Marketplace:
    $manager->save($product);

---
## Contributors

- [@gpupo](https://github.com/gpupo)
- [All Contributors](https://github.com/gpupo/cnova-sdk/contributors)

---

## Links

* [Cnova-sdk Composer Package](https://packagist.org/packages/gpupo/cnova-sdk) no packagist.org
* [Marketplace-bundle Composer Package](https://packagist.org/packages/gpupo/marketplace-bundle) - Integração deste pacote com Symfony2
* [Outras SDKs para o Ecommerce do Brasil](https://github.com/gpupo/common-sdk)

---

## Desenvolvimento

    git clone --depth=1  git@github.com:gpupo/cnova-sdk.git
    cd cnova-sdk;
    composer install;

Personalize a configuração do ``phpunit``:

    cp phpunit.xml.dist phpunit.xml;

Personalize os parâmetros!

---

## Comandos

Lista de comandos disponíveis:

    ./bin/main

Você pode verificar suas credenciais Cnova na linha de comando:

    ./bin/main credential

---

## Propriedades dos objetos

<!--
Comando para geração da lista:

phpunit --testdox | grep -vi php |  sed "s/.*\[/-&/" | sed 's/.*Gpupo.*/&\'$'\n/g' | sed 's/.*Gpupo.*/&\'$'\n/g' | sed 's/Gpupo\\Tests\\CnovaSdk\\/### /g' > Resources/logs/testdox.txt
-->

A lista abaixo é gerada a partir da saída da execução dos testes:

### Client\Client


- Sucesso ao definir options
- Gerencia uri de recurso
- Objeto request possui header
- Acesso a lista de pedidos
- Acesso a lista de produtos

### Entity\MetadataContainer


- É um objeto metadata container
- Possui objeto metadata
- Possui propriedade indicadora de quantidade de registros

### Entity\Order\Customer\Customer


- É propriedade de order
- Possui objeto phones

### Entity\Order\Customer\Phone


- Possui numero
- Possui identificação de tipo

### Entity\Order\Manager


- Obtem lista pedidos
- Recupera informacoes de um pedido especifico
- Atualiza status de um pedido

### Entity\OrderCollection


- Cada elementoÉ um objeto order
- Cada elemento possui dados corretos
- É um objeto metadata container
- Possui objeto metadata
- Possui propriedade indicadora de quantidade de registros

### Entity\Order\Order


- Cada item de uma lista e um objeto
- Cada pedido possui objeto billing
- Cada pedido possui objeto cliente
- Cada pedido possui objeto frete
- Cada pedido possui objeto contendo endereco de entrega
- Cada pedido possui colecao de rastreamentos
- Cada pedido possui colecao de produtos

### Entity\Product\Loads\Loads


- Possui colecao de products
- Cada product possui status
- Possui objeto metadata

### Entity\Product\Loads\Manager


- Obtem lista de situacoes de produtos
- Permite acesso a lista de produtos com erro

### Entity\Product\Loads\Metadata


- É uma collection
- Metadata possui quantidade de objetos enviados
- Metadata possui informacao do offset atual
- Metadata possui informacao do limit atual

### Entity\Product\Manager


- É o administrador de produtos
- Possui objeto pool
- Possui objeto client
- Obtem lista de produtos cadastrados
- Recupera informacoes de um produto especifico a partir de id
- Guarda produtos em uma fila para gravacao em lote
- Gerencia gravacao de produtos em lote
- Atualiza preco e estoque de um produto
- Nao executa atualizacao em produto inalterado
- Atualiza apenas estoque em caso de ser o unico atributo alterado

### Entity\Product\Price


- É propriedade de product
- Possui preço de
- Possui preço pro
- Entrega parâmetros para atualização de preço do sku

### Entity\Product\ProductCollection


- É um objeto metadata container
- Possui objeto metadata
- Possui propriedade indicadora de quantidade de registros

### Entity\Product\Product


- Possui propriedades e objetos
- Possui uma colecao attributes
- Possui objeto price
- Possui objeto stock
- Possui objeto dimensions
- Possui objeto gift wrap
- Entrega json

### Entity\Product\Stock


- É propriedade de product
- Possui quantidade
- Possui tempo preparação do produto
- Entrega parâmetros para atualização de estoque do sku

### Factory


- Centraliza acesso a managers
- Centraliza criacao de objetos
