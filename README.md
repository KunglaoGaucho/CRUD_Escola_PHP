# CRUD Escola – Gerenciamento de Cursos, Alunos e Matrículas

Sistema web desenvolvido em PHP com MySQL para o gerenciamento de uma escola, com funcionalidades de login, cadastro de usuários, CRUD completo para cursos, alunos e matrículas, sistema de paginação e dockerização.

---

## Tecnologias utilizadas

- PHP 8.2  
- MySQL 8  
- Apache  
- Bootstrap 5  
- Docker (opcional)

---

## Arquitetura MVC

O projeto segue o padrão de arquitetura **MVC (Model-View-Controller)**:

- **Model**: responsável pela comunicação com o banco de dados (pasta `/models`).
- **View**: responsável pela interface com o usuário (HTML com Bootstrap na pasta `/views`).
- **Controller**: recebe as requisições, trata a lógica e aciona o Model e a View conforme necessário (pasta `/controllers`).

---

##  Como executar o projeto

### Opção 1: Rodando **SEM Docker** (via Apache ou XAMPP)

1. **Clone este repositório**

```bash
git clone https://github.com/seu-usuario/CRUD_escola.git
```
2. **Importe o banco de dados**
Importe o arquivo banco_escola.sql (está na raiz do projeto)
Ou via terminal:

```bash
mysql -u root -p escola < banco_escola.sql
```
3. **Configure o acesso ao banco (se necessário)**
Configure o acesso ao banco (se necessário)
Arquivo: config/db.php

```bash
private $host = 'localhost';
private $db   = 'escola';
private $user = 'root';
private $pass = '';
```
4. **Acesse o sistema**
```bash
http://localhost/CRUD_escola/public/login.php
```
---

### Opção 2: Rodando COM Docker

1. **Tenha o docker instalado**
https://www.docker.com/products/docker-desktop

2. **Suba os containers**
```bash
docker-compose up -d
```
3. **Acesse o sistema**
```bash
http://localhost:8000
```

---
   
### Acesso
- Clique em "Criar conta" para cadastrar um novo usuário.

- Após o login, o usuário terá acesso aos módulos de **Cursos, Alunos e Matrículas**.

--- 
## Funcionalidades
- Tela de login com senha criptografada

- Cadastro de usuários

- CRUD de Cursos, Alunos e Matrículas

- Paginação nas listagens

- Dockerização com MySQL e Apache

- Proteção de rotas com sessões
