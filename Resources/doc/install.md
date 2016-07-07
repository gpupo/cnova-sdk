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
