<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SearchAdresseController extends AbstractController
{
    #[Route('/search/adresse', name: 'app_search_adresse')]
    public function index(): Response
    {
        return $this->render('search_adresse/index.html.twig', [
            'controller_name' => 'SearchAdresseController'
        ]);
    }
}
