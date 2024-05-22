## Guia de Configuração do Symfony 6 com Docker

### Clone o repositorio antes de iniciar:

https://github.com/JonasPoli/docker-symfony.git

### Iniciando o Ambiente Docker

Para começar, dentro do diretório do seu projeto `docker-symfony`, você pode iniciar os serviços necessários utilizando o seguinte comando:

```bash
docker-compose up -d --build
```

Este comando não só inicia os serviços definidos no arquivo `docker-compose.yml` em segundo plano, mas também reconstrói as imagens dos contêineres, caso seja necessário, antes de iniciar esses serviços.

Para verificar se os contêineres estão em execução, você pode utilizar o comando:

```bash
docker-compose ps
```

### Acessando o Terminal do Docker

Para acessar o terminal da máquina docker, execute o seguinte comando:

```bash
docker-compose exec php /bin/bash
```

### Instalando Symfony

Dentro do terminal do docker, você pode instalar o Symfony executando o seguinte comando:

```bash
composer create-project symfony/skeleton my_project_directory "6.*"
```

Em seguida, acesse o diretório do projeto Symfony criado utilizando o comando:

```bash
cd my_project_directory
```

### Sincronizando com Banco de Dados

#### Criando uma Entidade

Para criar uma entidade, execute o comando:

```bash
symfony console make:entity
```

Se encontrar algum erro, você pode instalar o ORM utilizando o comando:

```bash
composer require orm
```

#### Configurando o Banco de Dados

Crie um arquivo chamado `.env.local` dentro do projeto com o seguinte conteúdo:

```dotenv
# DATABASE_URL="sqlite:///%kernel.project_dir%/var/data.db"
DATABASE_URL="mysql://root:secret!@database:3306/symfony_docker?serverVersion=8.0"
```

#### Executando Migrações

Execute o comando para criar as migrações:

```bash
symfony console make:migration
```

E, em seguida, execute o comando para aplicar as migrações:

```bash
symfony console doctrine:migrations:migrate
```

### Conectando ao Banco de Dados

Para conectar-se à instância Docker do banco de dados através do terminal, na raiz do projeto, execute o comando:

```bash
docker-compose exec database /bin/bash
```

E para acessar o MySQL, execute o seguinte comando:

```bash
mysql -u root -p symfony_docker
```

Digite a senha quando solicitado (`secret`). Você pode listar os bancos de dados e tabelas utilizando os comandos `show databases;` e `show tables;` respectivamente.

### Resumo

Neste ponto, seu projeto está configurado com Docker, Symfony, PHP e um servidor que não está instalado na sua máquina host, mas sim no Docker. 

---

Agora, vamos entender um pouco sobre os arquivos presentes em nosso projeto:

#### `docker-compose.yml`

Este arquivo é utilizado para definir a configuração de uma aplicação composta por múltiplos containers. 

A estrutura do nosso projeto possui 3 containers, que são: `database`, `php` e `nginx`, representando os 3 serviços essenciais para nossa aplicação.

Cada serviço dentro deste arquivo é uma descrição de como os containers devem se comportar e se relacionar entre si.

Vamos analisar linha por linha para entender como funciona:

- Na primeira linha, definimos a versão do documento como 3.8.
- Em seguida, começamos a descrever os serviços. Temos 3 serviços: `database`, `php` e `nginx`.
- Caso seja necessário alterar alguma informação dentro deste arquivo, como o nome do container do banco de dados, é importante destruir os volumes instalados e reinstalá-los.
- Após fazer as mudanças, o comando `docker-compose up -d --build` deve ser executado para aplicar as alterações.

Agora, vamos analisar cada serviço:

#### `database`:

- `image`: Define qual imagem do MySQL será utilizada, optamos pelo MySQL 8.
- `command`: É o comando que será executado durante a inicialização do container.
- `environment`: Define as variáveis de ambiente acessíveis dentro do container, como senhas e nomes de banco de dados.
- `ports`: Mapeia as portas do container para a máquina host.
- `volumes`: Define os diretórios que serão persistentes mesmo após a destruição do container, garantindo que os dados não sejam perdidos.

#### `php`:

- `container_name`: Define o nome do container.
- `build`: Descreve como a imagem do container será construída, usando um arquivo Dockerfile.
- `ports`: Mapeia as portas do container para a máquina host.
- `volumes`: Define os diretórios que serão persistentes, garantindo a preservação dos dados.

#### `nginx`:

- `container_name`: Define o nome do container.
- `image`: Especifica a imagem do Nginx.
- `ports`: Mapeia as portas do container para a máquina host.
- `volumes`: Define os diretórios que serão persistentes, incluindo arquivos de configuração.

Este arquivo deve ser configurado de forma cuidadosa para garantir o funcionamento correto da aplicação.

Este guia visa fornecer uma compreensão básica dos arquivos de configuração em seu projeto Symfony com Docker, ajudando a entender como cada parte se relaciona e contribui para a funcionalidade geral da aplicação.