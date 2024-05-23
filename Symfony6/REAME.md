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