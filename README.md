# 🚗 Sistema de Cadastro de Veículos

Sistema web para cadastro e consulta de veículos disponíveis para venda, desenvolvido com HTML, CSS, JavaScript, PHP e MySQL.

## 📋 Requisitos Atendidos

- ✅ Tela HTML de cadastro de veículos
- ✅ Tela de listagem em tabela HTML
- ✅ Inserção de veículos no banco de dados
- ✅ Consulta que retorna JSON com lista de veículos
- ✅ Todos os campos obrigatórios
- ✅ Back-end obrigatoriamente em PHP
- ✅ Apenas operações de inserção e consulta (sem alteração/exclusão)

## 🗂️ Estrutura do Projeto

```
veiculos/
├── index.html          # Tela de cadastro
├── listar.html         # Tela de listagem
├── css/
│   └── estilo.css      # Estilos da aplicação
├── js/
│   └── script.js       # Lógica do formulário
├── php/
│   ├── conexao.php     # Configuração do banco
│   ├── cadastrar.php   # Insere veículo no BD
│   └── listar.php      # Retorna JSON com veículos
└── database.sql        # Script para criar o banco
```

## 🚀 Como Executar

### 1. Instale um servidor local
- [XAMPP](https://www.apachefriends.org/) (Windows/Linux/Mac)
- [WAMP](http://www.wampserver.com/) (Windows)
- [MAMP](https://www.mamp.info/) (Mac)

### 2. Configure o banco de dados
1. Inicie o Apache e MySQL no XAMPP Control Panel
2. Acesse: http://localhost/phpmyadmin
3. Importe o arquivo `database.sql` ou execute:
   ```sql
   CREATE DATABASE concessionaria;
   USE concessionaria;
   -- (cole o conteúdo do database.sql)
   ```

### 3. Instale o projeto
1. Copie a pasta `veiculos/` para `htdocs/` (XAMPP) ou `www/` (WAMP)
2. Acesse: http://localhost/veiculos/

### 4. Configure a conexão
Edite `php/conexao.php` com suas credenciais do MySQL:
```php
$host = "localhost";
$user = "root";     // seu usuário
$pass = "";         // sua senha
$db   = "concessionaria";
```

## 🛠️ Tecnologias Utilizadas

| Camada | Tecnologia |
|--------|-----------|
| Front-end | HTML5, CSS3, JavaScript (ES6+) |
| Back-end | PHP 7.4+ |
| Banco de Dados | MySQL 5.7+ |
| Comunicação | JSON via Fetch API |
| Segurança | Prepared Statements |

## 📊 Campos do Banco de Dados

| Campo | Tipo | Descrição |
|-------|------|-----------|
| id | INT (PK) | Identificador único |
| placa | VARCHAR(10) | Placa do veículo |
| marca | VARCHAR(50) | Marca |
| modelo | VARCHAR(50) | Modelo |
| ano_fabricacao | INT | Ano de fabricação |
| ano_modelo | INT | Ano do modelo |
| cor | VARCHAR(30) | Cor |
| combustivel | VARCHAR(30) | Tipo de combustível |
| quilometragem | INT | Quilometragem |
| chassi | VARCHAR(50) | Número do chassi |
| renavam | VARCHAR(50) | Número do Renavam |
| data_cadastro | DATE | Data do cadastro |
| observacoes | TEXT | Observações |

## 🔒 Segurança

- **Prepared Statements**: Previne SQL Injection
- **Validação no cliente**: Campos obrigatórios via HTML5
- **Validação no servidor**: Verificação de todos os campos no PHP
- **Sanitização**: Trim de espaços em branco

## 📱 Screenshots

### Tela de Cadastro
Formulário responsivo com validação em tempo real.

### Tela de Listagem
Tabela dinâmica carregada via JSON do servidor PHP.

## 📝 Licença

Projeto acadêmico desenvolvido para a disciplina Linguagens de Programação Universidade Uniasselvi
