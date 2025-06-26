# API - Serviço de Entregas

Esta API simula um serviço de entregas com rota GET.

## Rotas disponíveis

1. GET /status 
    – Verifica se a API está no ar.
    - Acesse: http://localhost:8000/status

2. GET /entregas_em_transito 
    – Lista entregas em trânsito.
    - Acesse: http://localhost:8000/entregas_em_transito

## Pre requisitos.

1. Ter o PHP instalado.
2. Ter o composer instalado.

## Como executar

1. Após clonar o repositório executar.

```bash
composer install
```

2. Para subir o servidor execute o comando

```bash
php -S localhost:8000
```

3. Acessar a rota número 1 e verificar que o status é "Ok";

4. Acessar a rota número 2 e verificar que os dados são retornados.

5. Referente aos testes unitários executar o comando abaixo e analisar a resposta. 

```bash
vendor/bin/phpunit tests
```