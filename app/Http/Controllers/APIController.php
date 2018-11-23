<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use GuzzleHttp\Client;


class APIController extends Controller
{
    const LASTFM_API_BASEURL = 'http://ws.audioscrobbler.com/2.0/';

	protected $client;

	public function __construct()
	{
	   	$this->client = new Client(); 
	}

    public function getClientesAPI()
    {
    	$result = $this->client->get(self::LASTFM_API_BASEURL);

        if (200 !== $result->getStatusCode() || null === $result->data) {
            $this->throwResponseException();
        }
    		
        // echo $result->getBody();
        
        $resultado = json_decode($result->getBody()->getContents());

        foreach($resultado as $result){
            echo "<p>" . $result->artist . " - <b>".  $result->album ."</b></p><br>";
        }
  
    }


}
