<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class CatController extends Controller
{
    // The base URL for the Cat API
    private $catApiUrl = 'https://api.thecatapi.com/v1';

    /**
     * Display a listing of cat breeds.
     *
     * @param Request $request The incoming request instance, used for handling search queries.
     * @return \Illuminate\View\View The view for displaying the list of cat breeds.
     */
    public function index(Request $request)
    {
        // Fetch cats from the API based on the search query
        $cats = $this->fetchCats($request->query('search'));
        // Return the view with the fetched cats data
        return view('cat.index', compact('cats'));
    }

    /**
     * Display the specified cat breed.
     *
     * @param int $id The ID of the cat breed to display.
     * @return \Illuminate\View\View The view for displaying the details of the specified cat breed.
     */
    public function show($id)
    {
        // Fetch the specific cat breed by ID from the API
        $cat = $this->fetchCatById($id);
        // Return the view with the fetched cat data
        return view('cat.show', compact('cat'));
    }

    /**
     * Fetch a list of cat breeds from the API
     *
     * @param string|null $search An optional search term to filter the cat breeds.
     * @return array The list of cat breeds, or an error message if the API call fails.
     */
    private function fetchCats($search = null)
    {
        $client = new Client(); // Initialize Guzzle HTTP client

        try {
            // Send a GET request to the Cat API to retrieve all breeds
            $response = $client->get("{$this->catApiUrl}/breeds", [
                'headers' => ['x-api-key' => env('API_CAT')] // Set the API key in the request headers
            ]);

            // Decode the JSON response from the API
            $cats = json_decode($response->getBody()->getContents());

            // Filter the results based on the search query, if provided
            return $search ? array_filter($cats, fn($cat) => stripos($cat->name, $search) !== false) : $cats;
        } catch (RequestException $e) {
            // Handle API errors, particularly rate limit errors
            if ($e->getResponse() && $e->getResponse()->getStatusCode() === 429) {
                return ['error' => 'You have hit the rate limit. Please wait a minute or increase your account package tier.'];
            }
            // Handle other potential errors
            return ['error' => 'An error occurred while fetching data from the API.'];
        }
    }

    /**
     * Fetch a specific cat breed by its ID
     *
     * @param int $id The ID of the cat breed to fetch.
     * @return object|array The cat breed data, or an error message if the API call fails.
     */
    private function fetchCatById($id)
    {
        $client = new Client(); // Initialize Guzzle HTTP client

        try {
            // Send a GET request to the Cat API to retrieve the breed by ID
            $response = $client->get("{$this->catApiUrl}/breeds/{$id}", [
                'headers' => ['x-api-key' => env('API_CAT')] // Set the API key in the request headers
            ]);

            // Decode the JSON response from the API
            return json_decode($response->getBody()->getContents());
        } catch (RequestException $e) {
            // Handle API errors, particularly rate limit errors
            if ($e->getResponse() && $e->getResponse()->getStatusCode() === 429) {
                return ['error' => 'You have hit the rate limit. Please wait a minute or increase your account package tier.'];
            }
            // Handle other potential errors
            return ['error' => 'An error occurred while fetching data from the API.'];
        }
    }
}
