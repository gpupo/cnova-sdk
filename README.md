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

    phpunit;


Personalize a configuração do ``phpunit``:

    cp phpunit.xml.dist phpunit.xml;

Personalize os parâmetros!

---

# Comandos

Lista de comandos disponíveis:

    ./bin/main

Você pode verificar suas credenciais Cnova na linha de comando:

    ./bin/main credential

---

# Propriedades dos objetos (Testdox)

<!--
Comando para geração da lista:

phpunit --testdox | grep -vi php |  sed "s/.*\[/-&/" | sed 's/.*Gpupo.*/&\'$'\n/g' | sed 's/.*Gpupo.*/&\'$'\n/g' | sed 's/Gpupo\\Tests\\CnovaSdk\\/### /g' > Resources/logs/testdox.txt
-->

A lista abaixo é gerada a partir da saída da execução dos testes:

### Client\Client


- [x] Sucesso ao definir options
- [x] Gerencia uri de recurso
- [x] Objeto request possui header
- [x] Acesso a lista de pedidos
- [x] Acesso a lista de produtos

### Entity\MetadataContainer


- [x] É um objeto metadata container
- [x] Possui objeto metadata
- [x] Possui propriedade indicadora de quantidade de registros

### Entity\Order\Customer\Customer


- [x] É propriedade de order
- [x] Possui objeto phones

### Entity\Order\Customer\Phone


- [x] Possui numero
- [x] Possui identificação de tipo

### Entity\Order\Manager


- [x] Obtem lista pedidos
- [x] Recupera informacoes de um pedido especifico
- [x] Atualiza status de um pedido

### Entity\OrderCollection


- [x] Cada elementoÉ um objeto order
- [x] Cada elemento possui dados corretos
- [x] É um objeto metadata container
- [x] Possui objeto metadata
- [x] Possui propriedade indicadora de quantidade de registros

### Entity\Order\Order


- [x] Cada item de uma lista e um objeto
- [x] Cada pedido possui objeto billing
- [x] Cada pedido possui objeto cliente
- [x] Cada pedido possui objeto frete
- [x] Cada pedido possui objeto contendo endereco de entrega
- [x] Cada pedido possui colecao de rastreamentos
- [x] Cada pedido possui colecao de produtos

### Entity\Product\Loads\Loads


- [x] Possui colecao de products
- [x] Cada product possui status
- [x] Possui objeto metadata

### Entity\Product\Loads\Manager


- [x] Obtem lista de situacoes de produtos
- [x] Permite acesso a lista de produtos com erro

### Entity\Product\Loads\Metadata


- [x] É uma collection
- [x] Metadata possui quantidade de objetos enviados
- [x] Metadata possui informacao do offset atual
- [x] Metadata possui informacao do limit atual

### Entity\Product\Manager


- [x] É o administrador de produtos
- [x] Possui objeto pool
- [x] Possui objeto client
- [x] Obtem lista de produtos cadastrados
- [x] Recupera informacoes de um produto especifico a partir de id
- [x] Guarda produtos em uma fila para gravacao em lote
- [x] Gerencia gravacao de produtos em lote
- [x] Atualiza preco e estoque de um produto
- [x] Nao executa atualizacao em produto inalterado
- [x] Atualiza apenas estoque em caso de ser o unico atributo alterado

### Entity\Product\Price


- [x] É propriedade de product
- [x] Possui preço de
- [x] Possui preço pro
- [x] Entrega parâmetros para atualização de preço do sku

### Entity\Product\ProductCollection


- [x] É um objeto metadata container
- [x] Possui objeto metadata
- [x] Possui propriedade indicadora de quantidade de registros

### Entity\Product\Product


- [x] Possui propriedades e objetos
- [x] Possui uma colecao attributes
- [x] Possui objeto price
- [x] Possui objeto stock
- [x] Possui objeto dimensions
- [x] Possui objeto gift wrap
- [x] Entrega json

### Entity\Product\Stock


- [x] É propriedade de product
- [x] Possui quantidade
- [x] Possui tempo preparação do produto
- [x] Entrega parâmetros para atualização de estoque do sku

### Factory


- [x] Centraliza acesso a managers
- [x] Centraliza criacao de objetos
