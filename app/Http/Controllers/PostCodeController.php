<?php

namespace App\Http\Controllers;

use GuzzleHttp\Exception\ClientException;

class PostCodeController extends Controller
{


    /**
     * Forwards a simple service to proxy getAddress.
     *
     * @param mixed $postcode
     *
     * @return Response
     */
    public function getPostcode($postcode){
        $apiKey = config('getaddress.key');
        try{
            $client = new \GuzzleHttp\Client();
            $response = $client->request('GET', "https://api.getAddress.io/find/$postcode",
            ['query' => [
                'expand'  => 'true',
                'api-key' => $apiKey
            ]]);
            if($response->getStatusCode() == 200){
                return $response;
            }
            else{
                return $response->getBody();
            }
        } catch (ClientException $e) {
            // Catch any Guzzle Errors and forward this error to the user.
            $response = $e->getResponse();
            $responseBodyAsString = $response->getBody()->getContents();
            return response()->json($responseBodyAsString,$response->getStatusCode());
        }
    }

}
