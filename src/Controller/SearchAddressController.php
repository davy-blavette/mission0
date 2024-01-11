<?php

namespace App\Controller;

use App\Entity\SearchAddress;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SearchAddressController extends AbstractController
{
    #[Route('/search/address', name: 'app_search_ddress')]
    public function index(): Response
    {
        return $this->render('search_address/index.html.twig', [
            'controller_name' => 'SearchAddressController'
        ]);
    }

    public function saveSearch(string $ip, string $address, EntityManagerInterface $entityManager): Response{

        $searchAddress = new SearchAddress();
        $searchAddress->setAddress($address);
        $searchAddress->setIp($ip);
        $searchAddress->setDate(new \DateTime('@'.strtotime('now')));
        $entityManager->persist($searchAddress);
        $entityManager->flush();

        return new Response('Saved new adresse with id '.$searchAddress->getId());
    }
}
