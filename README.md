# **API de Cadastro de Clientes com Validação de CEP**

## **Descrição do Projeto**

**Backend (API Laravel)** com listagem, cadastro, edição e exclusão de cliente.

## Requisitos
- PHP 7.3 ou superior até a versão 8.x
- Laravel 8.75 ou superior
- Docker (v20.10+)
- Docker Compose (v1.29+ ou V2)
⚠️ **Observação:** Neste projeto, apenas o **MySQL roda dentro de um container Docker**. A aplicação Laravel roda localmente na sua máquina.


## Tecnologias Utilizadas
- PHP ^7.3 ou ^8.0
- Laravel 8.x
- MySQL 8.x
- BrasilAPI para validação de endereço
- LaravelLegends para validação de CPF (pt-br)

## Rotas
- `GET    /api/customers` – Listar clientes
- `POST   /api/customers` – Criar cliente
- `GET    /api/customers/{id}` – Buscar cliente específico
- `PUT    /api/customers/{id}` – Atualizar cliente
- `DELETE /api/customers/{id}` – Deletar cliente (soft delete)

---
## Instalação

```bash
# 1. Clone o repositório

# 2. Copie o arquivo .env

# 3. Suba o banco de dados MySQL em container
docker-compose up -d

# 4. Instale as dependências do PHP
composer install

# 5. Gere a chave da aplicação
php artisan key:generate

# 6. Dados para conexão do banco:
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3406
DB_DATABASE=teste_dev_php
DB_USERNAME=admin
DB_PASSWORD=admin

# 7. Rode as migrations e seeders
php artisan migrate --seed

# 8. Inicie o servidor Laravel
php artisan serve
