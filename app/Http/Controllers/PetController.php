<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class PetController extends Controller
{
    private $catApiUrl = 'https://api.thecatapi.com/v1';

    public function index(Request $request)
    {
        $cats = $this->fetchCats($request->query('search'));
        return view('cat.index', compact('cats'));
    }

    public function show($id)
    {
        $cat = $this->fetchCatById($id);
        return view('cat.show', compact('cat'));
    }

    private function fetchCats($search = null)
    {
        $client = new Client();
        $response = $client->get("{$this->catApiUrl}/breeds", [
            'headers' => ['x-api-key' => env('API_CAT')]
        ]);

        $cats = json_decode($response->getBody()->getContents());

        return $search ? array_filter($cats, fn($cat) => stripos($cat->name, $search) !== false) : $cats;
    }

    private function fetchCatById($id)
    {
        $client = new Client();
        $response = $client->get("{$this->catApiUrl}/breeds/{$id}", [
            'headers' => ['x-api-key' => env('API_CAT')]
        ]);

        return json_decode($response->getBody()->getContents());
    }
}
