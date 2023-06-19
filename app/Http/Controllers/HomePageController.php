<?php

namespace App\Http\Controllers;

use GuzzleHttp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomePageController extends Controller
{
    public function ShowWorkspace() {
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', 'http://127.0.0.1:8000/workspace');
        echo $response->getBody(); // '{"id": 1420053, "name": "guzzle", ...}'
    }
}
