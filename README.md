# Fornecedores API

Este projeto é uma API REST desenvolvida em Laravel para gerenciar o cadastro de fornecedores, permitindo a busca por CNPJ utilizando a BrasilAPI.

## Funcionalidades

- **CRUD de Fornecedores:**
  - Criar Fornecedor: Permite o cadastro de fornecedores usando CNPJ ou CPF, incluindo informações como nome/nome da empresa, contato, endereço, etc.
  - Editar Fornecedor: Facilita a atualização das informações de fornecedores, mantendo a validação dos dados.
  - Excluir Fornecedor: Possibilita a remoção segura de fornecedores.
  - Listar Fornecedores: Apresenta uma lista paginada de fornecedores, com filtragem e ordenação.
- **Busca por CNPJ:** Implementação de busca por CNPJ na BrasilAPI.

## Tecnologias Utilizadas

- Laravel 9.x
- MySQL
- GuzzleHTTP

## Instalação

1. Clone o repositório:
   ```bash
   git clone https://github.com/herrmannjob/fornecedores-api.git
   cd fornecedores-api

2. Instale as dependências:
    ```bash
    composer install

3. Configure o arquivo '.env':
    ```
    cp .env.example .env
    php artisan key:generate

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=fornecedores_db
    DB_USERNAME=root
    DB_PASSWORD=sua_senha

4. Execute as migrations:
    ```
    php artisan migrate

5. Execute os seeders para popular o banco de dados com dados de teste (opcional):
    ```
    php artisan db:seed

6. Inicie o servidor:
    ```
    php artisan serve

## Endpoints

- **Listar Fornecedores:**
  - URL: 'api/fornecedores'.
  - Método: 'GET'.
  - Query Params:
    - 'page': Página atual (opcional)
    - 'perPage': Número de itens por página (opcional)
    - 'sort': Campo para ordenação (opcional)
    - 'order': Ordem de ordenação ('asc' ou 'desc', opcional)
    - 'filter': Filtro para busca (opcional)

- **Criar Fornecedor:**
  - URL: 'api/fornecedores'.
  - Método: 'POST'.
  - Body:
  ```
  {
    "cnpj": "12345678000195",
    "nome": "Fornecedor Teste",
    "contato": "123456789",
    "endereco": "Rua Teste, 123"
  }

- **Editar Fornecedor:**
  - URL: 'api/fornecedores/{id}'.
  - Método: 'PUT'.
  - Body:
  ```
  {
    "nome": "Fornecedor Teste",
    "contato": "123456789",
    "endereco": "Rua Teste, 123"
  }

- **Excluir Fornecedor:**
  - URL: 'api/fornecedores/{id}'.
  - Método: 'DELETE'.

- **Buscar Fornecedor por CNPJ:**
  - URL: 'api/fornecedores/cnpj/{cnpj}'.
  - Método: 'GET'.

## Testes

Para rodar os testes, utilize o seguinte comando:
```
php artisan migrate