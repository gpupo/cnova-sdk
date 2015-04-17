[![Build Status](https://secure.travis-ci.org/gpupo/cnova-sdk.png?branch=master)](http://travis-ci.org/gpupo/cnova-sdk)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/gpupo/cnova-sdk/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/gpupo/cnova-sdk/?branch=master)

# SDK Não Oficial para integração a partir de aplicações PHP com as APIs da Cnova Marketplace (Extra.com.br, Pontofrio.com.br, Casasbahia.com.br)


[Documentação Oficial da API V2](https://desenvolvedores.cnova.com/api-portal/docs/apilojista/main/getting-started.html)

## Licença

MIT, veja LICENSE.

---

## Contributors

- [@gpupo](https://github.com/gpupo)
- [All Contributors](https://github.com/gpupo/cnova-sdk/contributors)

---

## Links

* [cnova-sdk Composer Package](https://packagist.org/packages/gpupo/cnova-sdk) no packagist.org
* [marketplace-bundle Composer Package](https://packagist.org/packages/gpupo/marketplace-bundle) - Integração deste pacote com Symfony2
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

### Entity\Order\Customer\Customer


- [x] Cada cliente possui colecao de telefones

### Entity\Order\Manager


- [x] Obtem lista pedidos
- [ ] Recupera informacoes de um pedido especifico

### Entity\Order\Order


- [x] Cada item de uma lista e um objeto
- [x] Cada pedido possui objeto billing
- [x] Cada pedido possui objeto cliente
- [x] Cada pedido possui objeto frete
- [x] Cada pedido possui objeto contendo endereco de entrega
- [x] Cada pedido possui colecao de rastreamentos
- [x] Cada pedido possui colecao de produtos
