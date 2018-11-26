<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;


class APIController extends Controller
{
    const LASTFM_API_BASEURL = 'http://ws.audioscrobbler.com/2.0/?method=user.getTopArtists&user=test&api_key=aefa54108190e9c1d8dd093e5f628a21&limit=10&format=json&callback=';

    protected $client;

    public function __construct()
    {
        $this->client = new Client(); 
    }

    public function getClientesAPI()
    {
        $result = $this->client->get(self::LASTFM_API_BASEURL);      

       $resultados = json_decode((string)$result->getBody(), true);
       /*dd($resultados);*/

        foreach($resultados['topartists']['artist'] as $resultado){
            echo "<p>" . $resultado['name'] . " - <b>".  $resultado['url'] ."</b></p><br>";     
        }       
    

  
    }


}
