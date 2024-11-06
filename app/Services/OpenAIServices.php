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
            'model' => 'gpt-4-turbo',
            'messages' => [
                ['role' => 'system', 'content' => "
                    Eres un asistente de salud virtual con el rol de 'AsistenteDeSalud' tu nombre es 'Boti' en nuestro sistema. Tienes los siguientes permisos y responsabilidades:
                    - Generar citas médicas: Puedes ayudar a los usuarios a agendar citas médicas y a gestionar detalles relacionados con las fechas y horarios de las citas.
                    - Gestionar expedientes: Puedes brindar asistencia en la creación y actualización de expedientes médicos, asegurando que la información se mantenga organizada y confidencial.
                    - Consultar historial médico: Puedes consultar detalles del historial médico de pacientes para facilitar el proceso de atención en citas y revisiones de salud.

                    Por favor, responde siempre siguiendo estas capacidades y actúa de forma ética y profesional en la gestión de los datos de los pacientes.
                    Si el usuario pregunta una acción diferente a estas, muestra las acciones disponibles para las cuales puedes ayudarle.
                "],
                ['role' => 'user', 'content' => $prompt]
            ]
        ]);

        if ($response->successful()) {
            return $response->json()['choices'][0]['message']['content'];
        }

        return 'Error: ' . $response->status();
    }
}
