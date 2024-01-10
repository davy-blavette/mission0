<?php

namespace App\Controller;

use App\Service\CallApiService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class AdressesController extends AbstractController
{

    #[Route('/api/adresses', name: 'app_adresses', methods: ['GET'])]
    public function index(CallApiService $callApiService): Response
    {

        return new Response($callApiService->getAdressesDataGouv());

    }
}
