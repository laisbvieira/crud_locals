# Laravel API - Locais

📌 **API simples de gerenciamento de locais (CRUD), construída com Laravel 12 e PostgreSQL.**

---

## 🚀 Funcionalidades

- 🆕 Criar um local
- 📃 Listar locais com ou sem filtro por nome
- 🔍 Obter detalhes de um local
- ✏️ Editar um local
- 🗑️ Deletar um local

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
- PHP 8.2
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

## 📮 Endpoints
A aplicação estará disponível em:
http://localhost:8080

| Método | Rota                   | Descrição                       |
| ------ | ---------------------- | ------------------------------- |
| GET    | `/api/locals`          | Lista todos os locais           |
| GET    | `/api/locals?name=abc` | Lista locais filtrando por nome |
| GET    | `/api/locals/{id}`     | Mostra um local específico      |
| POST   | `/api/locals`          | Cria um novo local              |
| PUT    | `/api/locals/{id}`     | Atualiza um local existente     |
| DELETE | `/api/locals/{id}`     | Remove um local                 |

## 🧪 Testes
``` bash
docker exec -it laravel_app php artisan test
```
