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

### 1. Clonar o repositório

```bash
git clone https://github.com/seuusuario/laravel-api-locais.git
cd laravel-api-locais
```

### 2. Copiar o arquivo .env
cp .env.example .env
cp .env.docker.example .env.docker

    Importante: Use DB_HOST=db se estiver rodando via Docker. Use 127.0.0.1 se for rodar localmente fora do container. Então, confira os dados se estão todos ok, caso desejar pode alterar o usuário e senha (em ambos os .envs).

### 3. Subir com Docker
```bash
    docker-compose up -d --build
```

### 4. Adicione a APP_KEY ao .env.docker
O próprio docker fará a instalação do composer e geração da key para a aplicação. Você só precisar copiar e adicionar ao .env.docker e rodar o compose novamente

```bash
    docker-compose up -d --build
```

### 5. Rodar as migrations do banco de dados

``` bash
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

[📂 Clique aqui para baixar a Collection](postman/API%20Locals.postman_collection.json)

#### Como usar:
1. Abra o postman
2. Importe o arquivo baixado

## 🧪 Testes

### 1. Docker 

``` bash
docker exec -it laravel_app php artisan test
```

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
