# API - Serviço de Entregas

Esta API simula um serviço de entregas com rota GET.

## Rotas disponíveis

- **GET /status** – Verifica se a API está no ar.
- **GET /entregas_em_transito** – Lista entregas em trânsito.

## Como executar

```bash
php -S localhost:8000
```

Acesse: http://localhost:8000/entregas_em_transito

## Testes

Instale PHPUnit:
```bash
composer install
```

Execute:
```bash
vendor/bin/phpunit tests
```
