# Documentação para Teste da API Laravel com Insomnia ou Postman

Este documento fornece instruções para testar a API do Laravel usando Insomnia, com um banco de dados MySQL.

## Pré-requisitos

1. **Laravel**: Certifique-se de que o Laravel está instalado e configurado corretamente.
2. **Banco de Dados MySQL**: Verifique se o banco de dados MySQL está em execução e configurado.
3. **Insomnia**: Instale o Insomnia para enviar requisições API.

## Configuração do Banco de Dados

1. **Arquivo `.env`**: Configure o arquivo `.env` na raiz do seu projeto Laravel para conectar ao seu banco de dados MySQL. Exemplo:

```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=seu_banco_de_dados
   DB_USERNAME=seu_usuario
   DB_PASSWORD=sua_senha
```
2. **Rodar Migrações**: Execute as migrações para criar as tabelas necessárias no banco de dados.

```bash
php artisan migrate
```

O servidor estará acessível em http://localhost:8000.

## Testando a API com Insomnia

# 1. Criar uma Nova Requisição

Abra o Insomnia.
Crie um novo Request clicando em New Request.

## Configuração da Requisição

**Criar Pessoa (POST)**
Método: POST

URL: http://localhost:8000/api/pessoas

Corpo da Requisição:

Selecione JSON como o tipo de corpo.

Exemplo de JSON para criar uma pessoa:

```JSON
{
    "nome": "João da Silva",
    "dataNascimento": "1990-05-15",
    "salario": 3500.00,
    "observacoes": "Observações adicionais aqui.",
    "nomeMae": "Maria da Silva",
    "nomePai": "José da Silva",
    "cpf": "12345678901"
}

```
 Enviar a Requisição: Clique no botão Send.

## Listar Pessoas (GET)
Método: GET
URL: http://localhost:8000/api/pessoas
Enviar a Requisição: Clique no botão Send.
Obter Pessoa Específica (GET)
Método: GET

URL: http://localhost:8000/api/pessoas/{id}

Substitua {id} pelo ID da pessoa que você deseja obter. Por exemplo: http://localhost:8000/api/pessoas/1.

**Enviar a Requisição**: Clique no botão Send.

**Atualizar Pessoa (PUT)**
Método: PUT

URL: http://localhost:8000/api/pessoas/{id}

Substitua {id} pelo ID da pessoa que você deseja atualizar.

**Corpo da Requisição:**

Selecione JSON como o tipo de corpo.

Exemplo de JSON para atualizar uma pessoa:

```JSON
{
    "nome": "João da Silva",
    "dataNascimento": "1990-05-15",
    "salario": 3600.00,
    "observacoes": "Observações atualizadas.",
    "nomeMae": "Maria da Silva",
    "nomePai": "José da Silva",
    "cpf": "12345678901"
}
```
Enviar a Requisição: Clique no botão Send.

## Excluir Pessoa (DELETE)
Método: DELETE

URL: http://localhost:8000/api/pessoas/{id}

Substitua {id} pelo ID da pessoa que você deseja remover.

Enviar a Requisição: Clique no botão Send.

## Testando e Verificando
Verificar Respostas: Verifique as respostas das requisições para garantir que estão corretas e que a API está funcionando como esperado.




