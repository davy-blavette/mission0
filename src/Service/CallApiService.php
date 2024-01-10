<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class CallApiService
{
    private $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    public function getAdressesDataGouv():String

    {
        $response = $this->client->request('GET', 'https://api-adresse.data.gouv.fr/search/', [
            // these values are automatically encoded before including them in the URL
            'query' => [
                'q' => '8+bd+du+port',
                'limit' => 4,
            ],
        ]);

        return $response->getContent();
    }
}