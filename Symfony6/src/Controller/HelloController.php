<?php 

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function Symfony\Component\String\u;

class HelloController extends AbstractController
{
    #[Route('/')]
    public function indexAction(): Response
    {
        return $this->render('home/homepage.html.twig', [
            'title' => 'Zoologico'
        ]);
    }

    #[Route('/animal/{slug}')]
    public function animalAction(string $slug=null): Response
    {
        $newSlug = str_replace('-', ' ', $slug); // remove o traço.
        $newSlug = u($newSlug)->title(true); // Tranforma o slug em titulo.
        return new Response('Olá, ' . $newSlug);
    }
}