<?php

namespace App\Controller;

use App\Service\CallApiService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class ApiController extends AbstractController
{

    #[Route('/api/address', name: 'app_address', methods: ['POST'])]
    public function index(Request $request, CallApiService $callApiService): Response
    {
        $data = $request->toArray();

        if (isset($data['q']))
        {
            return new Response($callApiService->getAddressesDataGuv($data));

        }else if(isset($data['address'])){

            $response = $this->forward('App\Controller\SearchAddressController::saveSearch', [
                'address'  => $data['address'],
                'ip' => $request->getClientIp(),
            ]);

            return new Response($response);

        }else{

            return new Response("abort");


        }

    }




}
