<?php

namespace App\Controller;

use App\Service\CallApiService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class ApiController extends AbstractController
{

    #[Route('/api/adresses', name: 'app_adresses', methods: ['POST'])]
    public function index(Request $request, CallApiService $callApiService): Response
    {

        return new Response($callApiService->getAdressesDataGouv($request->toArray()));

    }
}
