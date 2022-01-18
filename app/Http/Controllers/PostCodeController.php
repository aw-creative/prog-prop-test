<?php

namespace App\Http\Controllers;

use GuzzleHttp\Exception\ClientException;

class PostCodeController extends Controller
{


    /**
     * Retrieves information about a postcode from getaddress.io.
     *
     * @param string $postcode
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
            return response($response->getBody()->getContents(), 200);

        } catch (ClientException $e) {
            // Catch any Guzzle Errors and forward this error to the user.
            $response = $e->getResponse();
            $responseBodyAsString = $response->getBody()->getContents();
            return response()->json($responseBodyAsString,$response->getStatusCode());
        }
    }

}
