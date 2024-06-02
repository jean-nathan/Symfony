### Bem-vindo ao Symfony 6.4.7

#### Criando um projeto Symfony 6

Você pode iniciar um novo projeto Symfony 6 executando o seguinte comando:

```bash
composer create-project symfony/skeleton Symfony6 "6.*"
```

#### Criando a primeira página

Para criar uma página, é essencial ter um controlador que armazenará nossas ações. É nele que definimos nossas rotas.

Aqui está um exemplo de uma rota principal:

```php
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    #[Route('/')]
    public function indexAction(): Response
    {
        return new Response('Olá, mundo!');
    }
}
```

Este exemplo mostra como definir uma rota principal que retorna uma simples resposta 'Olá, mundo!'.

---

### Configuração Opcional

Se você quiser configurar uma base URL para seus recursos, especialmente útil se você estiver usando uma CDN (Content Delivery Network), você pode fazer isso no arquivo `config/packages/framework.yaml`.

Aqui está como adicionar a configuração:

```yaml
framework:
    assets:
        base_urls: 'https://cdn.example.com'
```
### Explicação Completa

1. **Instalar**: Primeiro, instale a dependência:
    ```bash
    composer require symfony/asset
    ```

2. **Configuração Opcional**: Configure a base URL dos seus recursos (caso você esteja usando uma CDN ou queira organizar os caminhos de forma diferente):
    ```yaml
    framework:
        assets:
            base_urls: 'https://cdn.example.com'
    ```

3. **Uso nos Templates**: No seu template Twig, use a função `asset` para gerar o caminho correto dos recursos:
    ```twig
    <img src="{{ asset('imagens/logo.png') }}" alt="Logo">
    ```

### Benefícios Recapitulados

- **URLs Corretas**: Gera automaticamente os caminhos corretos para os arquivos.
- **Cache Busting**: Adiciona versões aos arquivos para evitar problemas de cache.
- **CDN**: Facilita a configuração para servir recursos através de uma CDN.

Dessa forma, o Symfony cuida de gerar os caminhos corretos para os arquivos e garante que os usuários sempre tenham a versão mais recente deles.

---

### Por que usar `twig/twig`?

Twig é um motor de templates para PHP que permite criar templates (arquivos que geram HTML) de forma mais fácil e organizada. Aqui estão os principais motivos para usá-lo:

1. **Sintaxe Limpa**: Twig oferece uma sintaxe limpa e intuitiva, facilitando a criação e manutenção dos templates.
2. **Segurança**: Ele inclui mecanismos de segurança embutidos, como a autoescapagem de variáveis, ajudando a prevenir ataques XSS.
3. **Reutilização de Código**: Twig permite a criação de macros e a reutilização de trechos de código, tornando os templates mais eficientes e fáceis de gerenciar.
4. **Facilidade de Extensão**: Você pode criar suas próprias funções e filtros personalizados no Twig.

### Como Usar

1. **Instalar**: Primeiro, instale a dependência do Twig:
    ```bash
    composer require twig/twig
    ```

2. **Configuração Opcional**: Configure o Twig no Symfony, caso ainda não esteja configurado. Isso é feito no arquivo `config/packages/twig.yaml`:
    ```yaml
    twig:
        debug: '%kernel.debug%'
        strict_variables: '%kernel.debug%'
        default_path: '%kernel.project_dir%/templates'
    ```

3. **Criar um Template Twig**: Crie um arquivo de template com extensão `.twig` dentro da pasta `templates`. Por exemplo, `templates/base.html.twig`:
    ```twig
    <!DOCTYPE html>
    <html>
        <head>
            <meta charset="UTF-8">
            <title>{% block title %}Bem-vindo ao Symfony!{% endblock %}</title>
        </head>
        <body>
            <header>{% block header %}{% endblock %}</header>
            <main>{% block body %}{% endblock %}</main>
            <footer>{% block footer %}{% endblock %}</footer>
        </body>
    </html>
    ```

4. **Usar o Template no Controller**: Em seu controller, renderize o template Twig:
    ```php
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Response;

    class DefaultController extends AbstractController
    {
        public function index(): Response
        {
            return $this->render('base.html.twig');
        }
    }
    ```

### Benefícios Recapitulados

- **Sintaxe Limpa**: Facilita a leitura e manutenção dos templates.
- **Segurança**: Protege contra ataques XSS.
- **Reutilização de Código**: Permite criar macros e reutilizar trechos de código.
- **Facilidade de Extensão**: Suporte para funções e filtros personalizados.

Dessa forma, o Twig ajuda a criar templates mais organizados, seguros e fáceis de manter no Symfony.

---

### Por que usar o sistema de depuração do Symfony 6?

1. **Detalhes de Erros**: Proporciona informações detalhadas sobre erros e exceções.
2. **Stack Traces**: Mostra a pilha de chamadas (stack trace) para ajudar a rastrear a origem do problema.
3. **Experiência de Desenvolvimento**: Exibe mensagens de erro amigáveis e informativas durante o desenvolvimento.

### Como Usar

1. **Instalar**: Não é necessário instalar `symfony/debug` diretamente, pois as funcionalidades de depuração já estão incluídas nos pacotes padrão do Symfony. Certifique-se de ter os pacotes `symfony/error-handler` e `symfony/var-dumper` instalados, que fazem parte do pacote `symfony/symfony`:
    ```bash
    composer require symfony/symfony
    ```

2. **Configuração Opcional**: Para habilitar a depuração, você deve configurar o seu ambiente de desenvolvimento. No arquivo `.env`, certifique-se de que as seguintes variáveis estejam definidas:
    ```dotenv
    APP_ENV=dev
    APP_DEBUG=1
    ```

3. **Ver Erros e Exceções**: Com a depuração habilitada, o Symfony exibirá uma página de erro detalhada sempre que ocorrer uma exceção. Esta página contém informações sobre o erro, incluindo a mensagem, o arquivo, a linha do erro, e a pilha de chamadas.

4. **Usar o Web Profiler**: Symfony inclui um Web Profiler que proporciona uma interface gráfica para analisar as requisições, visualizar logs, perfil de desempenho e muito mais. Ele é habilitado automaticamente no ambiente de desenvolvimento.

### Benefícios Recapitulados

- **Informações Detalhadas**: Fornece detalhes precisos sobre erros e exceções.
- **Stack Traces**: Facilita o rastreamento da origem dos erros.
- **Experiência de Desenvolvimento**: Melhora a experiência de desenvolvimento com informações detalhadas e páginas de erro amigáveis.
- **Web Profiler**: Ferramenta poderosa para análise e depuração das requisições.

Em resumo, ao usar o Symfony 6, a configuração e o uso do sistema de depuração são bastante simplificados, proporcionando uma experiência de desenvolvimento mais eficiente e amigável.

---

Porque devo usar a biblioteca Doctrine que serve para mapear objetos relacional no SYmfony?

Ele serve para manipulacao de dados dos objetos do banco de dados através de código PHP sem necessidade de escrever código SQL diretamente.

Basicamente ele vai fornecer uma ponte para tornar mais intuito para relacionar os nossos objetos por exemplo (produto), com a tabela produto no banco de dados.

Usaremos o MySQL Community Server como banco de dados para o nosso projeto Symfony 6, lembre-se de ter ele instalado em seu sistema operacional.

Agora iremos instalados o Doctrine através dos comandos abaixo:

```bash
composer require symfony/orm-pack
```

Selecione a opção: [p] Yes permanently, never ask again for this project

```bash
composer require --dev symfony/maker-bundle
```

Depois disso iremos configurar o env.local para criar a conexao com banco de dados, preenchendo os dados de acesso.

# customize this line!
DATABASE_URL="mysql://db_user:db_password@127.0.0.1:3306/db_name?serverVersion=5.7"

Depois disso, iremos executar o comando para criar o banco:

```bash
php bin/console doctrine:database:create
```

Antes possa ser que de algum erro de conexão com Mysql, você pode seguir o processo para configurar seu usuário root no computador:

Assim que instalar o Mysql você pode executar o comando abaixo caso não tenha pedido senha durante o processo de instalação:

Nesse caso, você pode tentar acessar o MySQL sem especificar uma senha. Aqui está como fazer isso:

```bash
sudo mysql -u root
```

Este comando permite que você entre no MySQL como o usuário root sem especificar uma senha. O uso do sudo é necessário para garantir permissões de superusuário.

No entanto, é altamente recomendável definir uma senha para o usuário root assim que possível para garantir a segurança do seu sistema de banco de dados. Você pode fazer isso após fazer login no MySQL usando o seguinte comando:


```bash
ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY 'senha_no_env.local';
```

Após definir a senha, você precisará sair do MySQL digitando exit no prompt do MySQL e, em seguida, fazer login novamente com a nova senha.

---
 ### 42. Entity

 Aula: https://www.udemy.com/course/symfony-6/learn/lecture/36642680#overview

 Lembre-se de ter instalado a depencia Maker para executar os comandos dele para criar uma Entity.

```bash
composer require maker --dev
```

Depois disso execute o comando para criar a Entity:

```bash
symfony console make:entity
```

Depois siga os processos abaixo para criar a Entity de mensagens do portifólio:

 Class name of the entity to create or update (e.g. BraveElephant):

 Messages

 New property name (press <return> to stop adding fields):

 message

  Field type (enter ? to see all types) [string]:

  text

Can this field be null in the database (nullable) (yes/no) [no]:

no

Add another property? Enter the property name (or press <return> to stop adding fields):

cellphone

Tem outros campos que você pode ir criando como:

name, email, cellphone e createAt.

Ele criará um arquivo na pasta migration, outro na pasta Repository e um arquivo chamado Mensages na pasta Entity.

Apenas para você entender, o Entity vai representar uma noticia ou seja, objeto Messages, a Repository vai manipular elas, como salvar, remover, pesquisar. Então todas as ações são feitas por ela.

Agora, iremos criar as migration que serve para criar um arquivo novo de migração de Doctrine, que permite que você gerencie o schema do banco de dados de uma forma estrutura sem perder dados. Esse processo permite que façamos alteração no schema do banco sem perder os dados existentes.

Execute o comando 

```bash
symfony console make:migration
```

Ele vai gerar um novo arquivo na pasta migrations, e neste arquivo terá duas funções, uma up e outra down.

O up cria a tabela com os campos que eu pedi pra criar, ou seja, faz a migration.

Já o down, desfaz o comando up, ou seja, ele desfaz a migration.

Depois disso iremos executar o comando para realizar a migração:

```bash
symfony console doctrine:migrations:migrate
```

Vai aparecer a mensagem:

WARNING! You are about to execute a migration in database "symfony6" that could result in schema changes and data loss. Are you sure you wish to continue? (yes/no) [yes]:

Você digita yes

Agora iremos visualizar o banco de dados através do comandos abaixo:

Selecionar o banco com usuário root e senha:
```bash
mysql -uroot -p symfony6
```

Visualizar tabelas:
```bash
SHOW TABLES;
```

Mostra as colunas da tabela:
```bash
SHOW COLUMNS FROM messages;
```

Agora irei mostrar os sistema de migração do banco de dados, executaremos o comando:
```bash
symfony console doctrine:migrations:status
```

Vai aparecer uma tabela, e a parte mais importante dela é a Storage que mostra o nome da tabela que fica salva as migrações.

Então toda vez que executamos um make:create, um novo arquivo é criado e quando mandamos executar ele verifica quantos arquivos existem no diretório de migrations, e checa se cada uma deles já foram executados, os que não foram ele executa na ordem.

Também temos outro comando pra listar todos os arquivos de migration possuem no diretório e dados como status dele e horário executado:
```bash
symfony console doctrine:migrations:list
```

Agora iremos ajustar nossa Entity Messages pra fazer com que o campo createAt seja criado automaticamente

Então toda vez que a entity ser criada ele vai gerar esse datetime e nunca mais será alterado:

```bash
    public function __construct() 
    {
        $this->createAt = new \DateTimeImmutable();
    }
```
---
### 43 - Persistindo dados

Aula - https://www.udemy.com/course/symfony-6/learn/lecture/36642690#overview

