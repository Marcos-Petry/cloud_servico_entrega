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


---

## Deploy em nuvem com Terraform e Ansible

Este projeto pode ser provisionado automaticamente na AWS usando Terraform e Ansible.

### Etapa 3 – Provisionamento com Terraform

A infraestrutura criada com Terraform inclui:

- Par de chaves SSH
- VPC personalizada com Sub-rede pública
- Grupo de segurança com portas liberadas (22 e 8000)
- Instância EC2 (t2.micro) para hospedar a API

#### Como usar

1. Instale o [Terraform](https://developer.hashicorp.com/terraform/install)
2. Configure a AWS com:

```bash
aws configure
```

3. Acesse a pasta `terraform/` e execute:

```bash
terraform init
terraform apply
```

4. O IP da instância será exibido ao final do processo.

---

### Etapa 4 – Deploy automático com Ansible

Após a criação da infraestrutura, o Ansible instala o ambiente necessário e sobe a API.

#### Como usar

1. Instale o [Ansible](https://docs.ansible.com/ansible/latest/installation_guide/intro_installation.html)
2. No arquivo `ansible/inventory`, insira o IP da instância EC2.
3. Execute o playbook:

```bash
ansible-playbook -i ansible/inventory ansible/deploy.yml
```

4. Após a instalação, acesse:

```
http://<IP_PUBLICO>:8000/status
```

---

## Estrutura do Projeto

```
api/
├── .github/workflows/main.yml         # CI com GitHub Actions
├── terraform/                         # Infraestrutura como código (Etapa 3)
│   ├── main.tf
│   ├── outputs.tf
│   ├── variables.tf
│   └── ...
├── ansible/                           # Automação de deploy (Etapa 4)
│   ├── ansible.cfg
│   ├── deploy.yml
│   └── inventory
├── tests/                             # Testes com PHPUnit
├── index.php                          # Arquivo principal da API
├── entregas.json                      # Dados simulados
├── composer.json
├── composer.lock
└── README.md
```
