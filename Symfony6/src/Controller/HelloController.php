<?php 

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HelloController
{
    #[Route('/')]
    public function indexAction(): Response
    {
        return new Response('Olá, mundo!');
    }

    #[Route('/dinossauro')]
    public function dinossauroAction(): Response
    {
        return new Response('Olá, Dinossauro!');
    }
}