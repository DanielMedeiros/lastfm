<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use GuzzleHttp\Client;


class APIController extends Controller
{
    const LASTFM_API_BASEURL = 'http://ws.audioscrobbler.com/2.0/?method=user.getTopArtists&user=test&api_key=aefa54108190e9c1d8dd093e5f628a21&limit=30&format=json&callback=?';

	protected $client;

	public function __construct()
	{
	   	$this->client = new Client(); 
	}

    public function getClientesAPI()
    {
    	$result = $this->client->get(self::LASTFM_API_BASEURL);

       /* if (200 !== $result->getStatusCode() || null === $result->data) {
            $this->throwResponseException();
        }*/
    		
        echo $result->getBody()->getContents();
        
      /*  $resultado = json_decode((string) $result->getBody()->getContents(), true);

        echo $resultado['artist'];*/
/*
        foreach($resultado as $result){
            echo "<p>" . $result->artist . " - <b>".  $result->album ."</b></p><br>";
        }*/
  
    }


}
