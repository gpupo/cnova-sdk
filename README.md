[![Build Status](https://secure.travis-ci.org/gpupo/cnova-sdk.png?branch=master)](http://travis-ci.org/gpupo/cnova-sdk)

SDK Não Oficial para integração a partir de aplicações PHP com as APIs da Cnova Marketplace

# Desenvolvimento

    git clone --depth=1  git@github.com:gpupo/cnova-sdk.git

    cd cnova-sdk;
    
    composer install;

    phpunit;


Personalize a configuração do ``phpunit``:

    cp phpunit.xml.dist phpunit.xml;

Insira sua Token de Sandbox em ``phpunit.xml``:

```XML
    <!-- Customize your parameters ! -->
    <php>
        <const name="API_TOKEN" value=""/>
        <const name="VERBOSE" value="false"/>
    </php>
```

Rode os testes, desenvolva, rode os testes...

