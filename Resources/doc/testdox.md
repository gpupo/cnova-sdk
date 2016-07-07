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

