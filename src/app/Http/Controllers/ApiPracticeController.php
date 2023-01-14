<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ApiPracticeController extends Controller
{
    public function index()
    {
        $tag_id = "laravel";

        $url = "https://qiita.com/api/v2/tags/" . $tag_id . "/items?page=1&per_page=20";

        //接続
        $client = new Client();
        // $response = $client->request("GET", [アクセスしたいURL]);
        $response = $client->request("GET", $url);

        $posts = $response->getBody();
        $posts = json_decode($posts, true);

        return view('/api', ['posts' => $posts]);
    }
}
