# Sistema de Gerenciamento de Tarefas

Este é um sistema de gerenciamento de tarefas que permite aos usuários criar uma conta, fazer login, criar novas tarefas, visualizar tarefas existentes, editar e excluir tarefas. O sistema é executado em um contêiner Docker para facilitar a implantação.

## Funcionalidades

- **Criar Usuário:** Permite a criação de uma nova conta de usuário.
- **Login:** Permite que os usuários façam login no sistema.
- **Criar Nova Tarefa:** Permite a criação de novas tarefas.
- **Visualizar Tarefa:** Permite a visualização de tarefas existentes.
- **Editar Tarefa:** Permite a edição de tarefas.
- **Excluir Tarefa:** Permite a exclusão de tarefas.

## Tecnologias Utilizadas

- **Backend:** [PHP, Laravel]
- **Frontend:** [HTML, CSS]
- **Banco de Dados:** [MySQL]
- **Docker:** Para contêinerização e fácil implantação

## Pré-requisitos

- Docker e Docker Compose instalados na máquina
- GitBash instalado na máquina

## Como Executar o Projeto

1. **Clone o repositório:**
    ```bash
    git clone https://github.com/lucsvvieira/vaga-dev.git
    cd vaga-dev
    ```

2. **Configurar Variáveis de Ambiente:**

    Crie um arquivo `.env` na raiz do projeto e adicione as seguintes variáveis:
    ```env
    DB_HOST=db
    DB_USER=seu-usuario-db
    DB_PASSWORD=sua-senha-db
    DB_NAME=nome-do-db
    JWT_SECRET=sua-chave-secreta-jwt
    ```

3. **Construir e Executar os Contêineres Docker:**
    ```bash
    docker-compose up --build
    ```

4. **Acessar a Aplicação:**

    A aplicação estará disponível em `http://localhost:3000` (ou outra porta especificada).

## Endpoints da API

- **POST /api/register:** Registro de novo usuário
- **POST /api/login:** Login do usuário
- **POST /api/tasks:** Criar nova tarefa
- **GET /api/tasks:** Listar todas as tarefas
- **GET /api/tasks/:id:** Visualizar detalhes de uma tarefa
- **PUT /api/tasks/:id:** Editar uma tarefa
- **DELETE /api/tasks/:id:** Excluir uma tarefa

## Contribuição

Sinta-se à vontade para fazer um fork do projeto e enviar pull requests. Sugestões e melhorias são sempre bem-vindas.

## Contato

Para mais informações, entre em contato através do email: [vieira07lucas@gmail.com](mailto:vieira07lucas@gmail.com).

---