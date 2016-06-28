---
layout: default
---
# Cnova-SDK

SDK Não Oficial para integração a partir de aplicações PHP com as APIs da Cnova Marketplace
(Extra.com.br, Pontofrio.com.br, Casasbahia.com.br)

[![Paypal Donations](https://www.paypalobjects.com/en_US/i/btn/btn_donate_SM.gif)](https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=EK6F2WRKG7GNN&item_name=cnova-sdk)
<!-- require -->

## Requisitos para uso

* PHP >= *5.6*
* [curl extension](http://php.net/manual/en/intro.curl.php)

Este componente **não é uma aplicação Stand Alone** e seu objetivo é ser utilizado como biblioteca.
Sua implantação deve ser feita por desenvolvedores experientes.

**Isto não é um Plugin!**

As opções que funcionam no modo de comando apenas servem para depuração em modo de
desenvolvimento.

A documentação mais importante está nos testes unitários. Se você não consegue ler os testes unitários, eu recomendo que não utilize esta biblioteca.


<!-- //require -->

<!-- licence -->

## Direitos autorais e de licença

Este componente está sob a [licença MIT](https://github.com/gpupo/common-sdk/blob/master/LICENSE)

Para a informação dos direitos autorais e de licença você deve ler o arquivo
de [licença](https://github.com/gpupo/common-sdk/blob/master/LICENSE) que é distribuído com este código-fonte.

### Resumo da licença

Exigido:

- Aviso de licença e direitos autorais

Permitido:

- Uso comercial
- Modificação
- Distribuição
- Sublicenciamento
- Proibido

Proibido:

- Responsabilidade Assegurada

<!-- //licence -->
<!-- qa -->

---

## Indicadores de qualidade

[![Build Status](https://secure.travis-ci.org/gpupo/cnova-sdk.png?branch=master)](http://travis-ci.org/gpupo/cnova-sdk)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/gpupo/cnova-sdk/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/gpupo/cnova-sdk/?branch=master)
[![Codacy Badge](https://www.codacy.com/project/badge/1826444de06447b098349808ea0d5ce7)](https://www.codacy.com/app/g/cnova-sdk)
[![Code Climate](https://codeclimate.com/github/gpupo/cnova-sdk/badges/gpa.svg)](https://codeclimate.com/github/gpupo/cnova-sdk)
[![Test Coverage](https://codeclimate.com/github/gpupo/cnova-sdk/badges/coverage.svg)](https://codeclimate.com/github/gpupo/cnova-sdk/coverage)
<!-- thanks -->

---

## Agradecimentos

* A todos os que [contribuiram com patchs](https://github.com/gpupo/cnova-sdk/contributors);
* Aos que [fizeram sugestões importantes](https://github.com/gpupo/cnova-sdk/issues);
* Aos desenvolvedores que criaram as [bibliotecas utilizadas neste componente](https://github.com/gpupo/cnova-sdk/blob/master/Resources/doc/libraries-list.md).

 _- [Gilmar Pupo](http://www.g1mr.com/)_
<!-- install -->

---

## Instalação

Adicione o pacote ``cnova-sdk`` ao seu projeto utilizando [composer](http://getcomposer.org):

    composer require gpupo/cnova-sdk

---

## Uso

Este exemplo demonstra o uso simplificado a partir do ``Factory``:

```PHP

///...
use Gpupo\CnovaSdk\Factory;

$cnovaSdk = Factory::getInstance()->setup([
    'client_id'     => 'foo',
    'access_token'  => 'bar',
    'version'       => 'sandbox',
 ]);

$manager = $cnovaSdk->factoryManager('product'));

```

Parâmetro | Descrição | Valores possíveis
----------|-----------|------------------
``client_id``|Chave da loja| string
``access_token``|Token de autorização da aplicação| string
``version``|Identificação do Ambiente| sandbox, prod (produção)
``registerPath``|Quando informado, registra no diretório informado, os dados de cada requisição executada


### Acesso a lista de produtos cadastrados:

    $produtosCadastrados = $manager->fetch(); // Collection de Objetos Product

### Acesso a informações de um produto cadastrado e com identificador conhecido:

    $produto = $manager->findById(9)); // Objeto Produto
    echo $product->getTitle(); // Acesso ao nome do produto de Id 9


### Criação de um produto:

    $data = []; // Veja o formato de $data em Resources/fixture/Product/ProductId.json
    $product = $cnovaSdk->createProduct($data);

### Envio do produto para o Marketplace:

    $manager->save($product);

### Registro (log)

    //...
    use Monolog\Logger;
    use Monolog\Handler\StreamHandler;
    //..
    $logger = new Logger('foo');
    $logger->pushHandler(new StreamHandler('Resources/logs/main.log', Logger::DEBUG));
    $cnovaSdk->setLogger($logger);
<!-- console -->

---

## Console

Lista de comandos disponíveis:

    ./bin/main

Você pode verificar suas credenciais Cnova na linha de comando:

    ./bin/main credential

Você poder criar um arquivo chamado ``app.json`` com suas configurações personalizadas, as quais serão utilizadas na linha de comando:

```json
{
    "client_id": "foo",
    "access_token": "bar"
}
```

Utilize como modelo o arquivo ``app.json.dist``


*Dica*: Verifique os logs gerados em ``Resources/logs/main.log``
<!-- links -->

---

## Links

* [Cnova-sdk Composer Package](https://packagist.org/packages/gpupo/cnova-sdk) no packagist.org
* [Documentação Oficial da API V2](https://desenvolvedores.cnova.com/api-portal/docs/apilojista/main/getting-started.html)
* [Marketplace-bundle Composer Package](http://www.g1mr.com/MarkethubBundle/) - Integração deste pacote com Symfony
* [Outras SDKs para o Ecommerce do Brasil](http://www.g1mr.com/common-sdk/)
<!-- dev -->

---

## Desenvolvimento

    git clone --depth=1  git@github.com:gpupo/cnova-sdk.git
    cd cnova-sdk;
    ant;

Personalize a configuração do ``phpunit``:

    cp phpunit.xml.dist phpunit.xml;

Personalize os parâmetros!



*Dica*: Verifique os logs gerados em ``var/log/main.log``

---

## Propriedades dos objetos
<!-- todo -->
## Todo


<!-- //todo -->

### CnovaSdk\Client\Client


- [x] Sucesso ao definir options
- [x] Gerencia uri de recurso
- [ ] Objeto request possui header
- [ ] Acesso a lista de pedidos
- [ ] Acesso a lista de produtos

### CnovaSdk\Entity\Order\Customer\Customer


- [x] É propriedade de order 
- [x] Possui objeto phones 

### CnovaSdk\Entity\Order\Customer\Phones\Phone


- [x] Possui numero 
- [x] Possui identificação de tipo 

### CnovaSdk\Entity\Order\Items\Items


- [x] Possui coleção de objetos product
- [x] Possui ids diferentes para cada unidade mesmo com skus iguais
- [x] Contém lista de ids existentes na coleção

### CnovaSdk\Entity\Order\Items\Product\Product


- [x] Possui um identificador por unidade
- [x] Possui identificador do sku

### CnovaSdk\Entity\Order\Manager


- [x] Obtem lista pedidos
- [x] Obtém a lista de pedidos recém aprovados e que esperam processamento
- [x] Recupera informacoes de um pedido especifico
- [x] Move pedido para status enviado 
- [x] Falha ao mover pedido para enviado sem informações completas 
- [x] Move pedido para status recebido 
- [x] Move pedido para status cancelado 

### CnovaSdk\Entity\OrderCollection


- [x] Cada elementoÉ um objeto order 
- [x] Cada elemento possui dados corretos
- [x] É um objeto metadata container 
- [x] Possui objeto metadata 
- [x] Possui propriedade indicadora de quantidade de registros 

### CnovaSdk\Entity\Order\Order


- [x] Cada item de uma lista e um objeto
- [x] Cada pedido possui objeto billing
- [x] Cada pedido possui objeto cliente
- [x] Cada pedido possui objeto frete
- [x] Cada pedido possui objeto contendo endereco de entrega
- [x] Cada pedido possui colecao de rastreamentos
- [x] Cada pedido possui colecao de produtos

### CnovaSdk\Entity\Order\Trackings\Tracking\Invoice


- [x] Possui cnpj
- [x] Possui chave de acesso

### CnovaSdk\Entity\Order\Trackings\Tracking\Tracking


- [x] Valida
- [x] Possui lista de items
- [x] Possui dados da transportadora
- [x] Inválido com rastreamento ausente
- [x] Inválido com nota fiscal ausente
- [x] Inválido com transportadora ausente
- [x] Válido com dados completos
- [x] Possui formato para atualização de order

### CnovaSdk\Entity\Product\Loads\Loads


- [x] Possui colecao de products
- [x] Cada product possui status
- [x] Possui objeto metadata

### CnovaSdk\Entity\Product\Loads\Manager


- [x] Obtem lista de situacoes de produtos
- [x] Permite acesso a lista de produtos com erro

### CnovaSdk\Entity\Product\Loads\Metadata


- [x] É uma collection
- [x] Metadata possui quantidade de objetos enviados
- [x] Metadata possui informacao do offset atual
- [x] Metadata possui informacao do limit atual

### CnovaSdk\Entity\Product\Manager


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

### CnovaSdk\Entity\Product\Price


- [x] É propriedade de product
- [x] Possui preço de
- [x] Possui preço por
- [x] Entrega parâmetros para atualização de preço do sku

### CnovaSdk\Entity\Product\ProductCollection


- [x] Possui coleção de products 
- [x] É um objeto metadata container 
- [x] Possui objeto metadata 
- [x] Possui propriedade indicadora de quantidade de registros 

### CnovaSdk\Entity\Product\Product


- [x] Possui propriedades e objetos 
- [x] Possui uma colecao attributes 
- [x] Possui objeto price
- [x] Possui objeto stock
- [x] Possui objeto dimensions
- [x] Possui objeto gift wrap
- [x] Entrega json 

### CnovaSdk\Entity\Product\Stock


- [x] É propriedade de product
- [x] Possui quantidade
- [x] Possui tempo preparação do produto
- [x] Entrega parâmetros para atualização de estoque do sku

### CnovaSdk\Factory


- [x] Centraliza acesso a managers 
- [x] Centraliza criacao de objetos 


## Lista de dependências (libraries)

Name | Version | Description
-----|---------|------------------------------------------------------
codeclimate/php-test-reporter | v0.3.2 | PHP client for reporting test coverage to Code Climate
doctrine/annotations | v1.2.7 | Docblock Annotations Parser
doctrine/cache | v1.6.0 | Caching library offering an object-oriented API for many cache backends
doctrine/collections | v1.3.0 | Collections Abstraction library
doctrine/common | v2.5.3 | Common Library for Doctrine projects
doctrine/inflector | v1.1.0 | Common String Manipulations with regard to casing and singular/plural rules.
doctrine/instantiator | 1.0.5 | A small, lightweight utility to instantiate objects in PHP without invoking their constructors
doctrine/lexer | v1.0.1 | Base library for a lexer that can be used in Top-Down, Recursive Descent Parsers.
gpupo/cache | 1.3.0 | Caching library that implements PSR-6
gpupo/common | 1.6.6 | Common Objects
gpupo/common-sdk | 2.0.11 | Componente de uso comum entre SDKs para integração a partir de aplicações PHP com Restful webservices
guzzle/guzzle | v3.9.3 | PHP HTTP client. This library is deprecated in favor of https://packagist.org/packages/guzzlehttp/guzzle
monolog/monolog | 1.19.0 | Sends your logs to files, sockets, inboxes, databases and various web services
myclabs/deep-copy | 1.5.1 | Create deep copies (clones) of your objects
phpdocumentor/reflection-common | 1.0 | Common reflection classes used by phpdocumentor to reflect the code structure
phpdocumentor/reflection-docblock | 3.1.0 | With this component, a library can provide support for annotations via DocBlocks or otherwise retrieve information that is embedded in a DocBlock.
phpdocumentor/type-resolver | 0.2 | 
phpspec/prophecy | v1.6.1 | Highly opinionated mocking framework for PHP 5.3+
phpunit/php-code-coverage | 4.0.0 | Library that provides collection, processing, and rendering functionality for PHP code coverage information.
phpunit/php-file-iterator | 1.4.1 | FilterIterator implementation that filters files based on a list of suffixes.
phpunit/php-text-template | 1.2.1 | Simple template engine.
phpunit/php-timer | 1.0.8 | Utility class for timing
phpunit/php-token-stream | 1.4.8 | Wrapper around PHP's tokenizer extension.
phpunit/phpunit | 5.4.6 | The PHP Unit Testing framework.
phpunit/phpunit-mock-objects | 3.2.3 | Mock Object library for PHPUnit
psr/cache | 1.0.0 | Common interface for caching libraries
psr/log | 1.0.0 | Common interface for logging libraries
satooshi/php-coveralls | v1.0.1 | PHP client library for Coveralls API
sebastian/code-unit-reverse-lookup 1.0.0 | Looks up which function or method a line of code belongs to
sebastian/comparator | 1.2.0 | Provides the functionality to compare PHP values for equality
sebastian/diff | 1.4.1 | Diff implementation
sebastian/environment | 1.3.7 | Provides functionality to handle HHVM/PHP environments
sebastian/exporter | 1.2.2 | Provides the functionality to export PHP variables for visualization
sebastian/global-state | 1.1.1 | Snapshotting of global state
sebastian/object-enumerator | 1.0.0 | Traverses array structures and object graphs to enumerate all referenced objects
sebastian/peek-and-poke | dev-master a8295 | Proxy for accessing non-public attributes and methods of an object
sebastian/recursion-context | 1.0.2 | Provides functionality to recursively process PHP variables
sebastian/resource-operations | 1.0.0 | Provides a list of PHP built-in functions that operate on resources
sebastian/version | 2.0.0 | Library that helps with managing the version number of Git-hosted PHP projects
symfony/config | v3.1.1 | Symfony Config Component
symfony/console | v3.1.1 | Symfony Console Component
symfony/event-dispatcher | v2.8.7 | Symfony EventDispatcher Component
symfony/filesystem | v3.1.1 | Symfony Filesystem Component
symfony/polyfill-mbstring | v1.2.0 | Symfony polyfill for the Mbstring extension
symfony/stopwatch | v3.1.1 | Symfony Stopwatch Component
symfony/yaml | v3.1.1 | Symfony Yaml Component
twig/twig | v1.24.1 | Twig, the flexible, fast, and secure template language for PHP
webmozart/assert | 1.0.2 | Assertions to validate method input/output with nice error messages.


