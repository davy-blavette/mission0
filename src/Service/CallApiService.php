<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Component\HttpFoundation\Request;

class CallApiService
{
    private $client;
    private $data;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
        $this->data = [];
    }

    public function getAddressesDataGuv($request):String
    {

        if (strlen($request['q']) > 4){
            $response = $this->client->request('GET', 'https://api-adresse.data.gouv.fr/search/', [
                // these values are automatically encoded before including them in the URL
                'query' => [
                    'q' => urlencode($request['q']),
                    'limit' => 4,
                ],
            ]);

            $data = json_decode($response->getContent());
            foreach ($data->features as $feature){
                $this->data[] = $feature->properties->label;
            }

            return '["'.implode('","', $this->data).'"]';
        }

        return '[]';
    }
}