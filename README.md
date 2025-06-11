# Laravel API - Locais

📌 **API simples de gerenciamento de locais (CRUD), construída com Laravel 12 e PostgreSQL.**

---

## 🚀 Funcionalidades

- 🆕 Criar um local
- 📃 Listar locais com ou sem filtro por nome
- 🔍 Obter detalhes de um local
- ✏️ Editar um local

---

## 🗂️ Estrutura do recurso

Cada local possui os seguintes campos:

- `name`
- `slug`
- `city`
- `state`
- `created_at`
- `updated_at`

---

## 🛠️ Tecnologias

- Laravel 12
- PostgreSQL
- Docker + Docker Compose
- PHP >= 8.3
- Nginx

---

## ⚙️ Como rodar o projeto

### 1️⃣ Clonar o repositório

```bash
git clone https://github.com/seuusuario/laravel-api-locais.git
cd laravel-api-locais
```

### 2️⃣ Copiar o arquivo .env
cp .env.example .env

    Importante: Use DB_HOST=db se estiver rodando via Docker. Use 127.0.0.1 se for rodar localmente fora do container.

### 3️⃣ Subir com Docker
```bash
docker-compose up -d --build
```

### 4️⃣ Instalar dependências e preparar ambiente

``` bash
docker exec -it laravel_app composer install
docker exec -it laravel_app php artisan key:generate
docker exec -it laravel_app php artisan migrate
```


## ⚙️ Como rodar o projeto localmente

### ✅ Pré-requisitos

- PHP >= 8.3 (incluir extensão intl)
- Composer
- PostgreSQL

#### 1. Após clonar o repositório, instale as dependências PHP
```bash
    composer install
```

#### 2. Copie o arquivo do env.example
```bash
    cp .env.example .env
```

#### 3. Edite o arquivo .env com as credenciais do banco criado

⚠️ Você precisa criar o banco de dados e o usuário com as devidas permissões 

Usando o PostgreSQL via terminal
```bash
    sudo -u postgres psql
    CREATE DATABASE laravel_api;
    CREATE USER crud_user WITH PASSWORD 'senha_segura';
    GRANT ALL PRIVILEGES ON DATABASE crud_locals TO crud_user;
```

#### 4. Gere a chave da aplicação
```bash
    php artisan key:generate
```

#### 5. Execute as migrations
```bash
    php artisan migrate
```

#### 6. Suba o servidor local
```bash
    php artisan serve
```

#### 7. Acesse a aplicação em: http://localhost:8000

## 📮 Endpoints

| Método | Rota                   | Descrição                       |
| ------ | ---------------------- | ------------------------------- |
| GET    | `/api/locals`          | Lista todos os locais           |
| GET    | `/api/locals?name=abc` | Lista locais filtrando por nome |
| GET    | `/api/locals/{id}`     | Mostra um local específico      |
| POST   | `/api/locals`          | Cria um novo local              |
| PUT    | `/api/locals/{id}`     | Atualiza um local existente     |
| DELETE | `/api/locals/{id}`     | Remove um local                 |

### Testar com Postman

[📂 Clique aqui para baixar a Collection](postman/CRUD-Locals-API.postman_collection.json)

#### Como usar:
1. Abra o postman
2. Importe o arquivo baixado

## 🧪 Testes

### 1. Docker 

### 2. Localmente
#### 2.1 Criar o banco de teste
```bash
    sudo -u postgres psql
    CREATE DATABASE laravel_test;
    CREATE USER crud_user WITH PASSWORD 'senha_segura';
    GRANT ALL PRIVILEGES ON DATABASE crud_locals TO crud_user;
```

#### 2.1 Criar .env.testing e altere para usar o banco de teste
``` bash
    cp .env .env.testing
```

#### 2.2. Rodar testes
``` bash
    php artisan test
```




``` bash
docker exec -it laravel_app php artisan test
```
