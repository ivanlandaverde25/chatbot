<?php

namespace App\Services;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

class OpenAIServices
{
    // protected $client;
    protected $apiKey;

    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        // $this->client = new Client();
        $this->apiKey = env('OPENAI_API_KEY');
    }

    public function consultarGPT4($prompt)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->apiKey,
        ])->post('https://api.openai.com/v1/chat/completions', [
            'model' => 'gpt-4-turbo', // Asegúrate de que esté disponible en tu cuenta
            'messages' => [
                ['role' => 'user', 'content' => $prompt]
            ]
        ]);

        if ($response->successful()) {
            return $response->json()['choices'][0]['message']['content'];
        }

        return 'Error: ' . $response->status();
    }
}
