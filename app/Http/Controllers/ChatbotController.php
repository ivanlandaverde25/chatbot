<?php

namespace App\Http\Controllers;

use App\Models\Chatbot;
use App\Services\OpenAIServices;
use Google\Cloud\Core\Exception\GoogleException;
use Google\Cloud\Speech\V1\RecognitionAudio;
use Google\Cloud\Speech\V1\RecognitionConfig;
use Google\Cloud\Speech\V1\SpeechClient;
use Illuminate\Http\Request;
use Laravel\Prompts\Prompt;

class ChatbotController extends Controller
{
    protected $openAIServices;

    public function __construct(OpenAIServices $openAIServices)
    {
        $this->openAIServices = $openAIServices;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('chatbot.index');
    }

    // Metodo para consultar al GPT
    public function consulta(Request $request)
    {
        $mensaje = $request->input('prompt');

        $respuesta = $this->openAIServices->consultarGPT4($mensaje);

        return response()->json(['respuesta' => $respuesta]);
    }

    // Metodo para realizar la transcripcion del audio
    public function transcripcionAudio(Request $request){

        // Verifica si hay un archivo de audio en la solicitud
        if (!$request->hasFile('audio') || !$request->file('audio')->isValid()) {
            return response()->json(['error' => 'Archivo de audio no válido.'], 400);
        }

        // Obtiene el archivo de audio y su contenido
        $audioFile = $request->file('audio');
        $content = file_get_contents($audioFile->getRealPath());

        try {
            // Configura el cliente de Google Speech-to-Text
            $speech = new SpeechClient([
                'credentials' => storage_path('app/google-cloud.json') // Ruta al archivo de credenciales JSON
            ]);

            // Configuración de audio
            $config = new RecognitionConfig([
                'encoding' => RecognitionConfig\AudioEncoding::LINEAR16,
                'sample_rate_hertz' => 48000,
                'language_code' => 'es-ES'
            ]);

            // Contenido del audio
            $audio = new RecognitionAudio([
                'content' => $content
            ]);

            $response = $speech->recognize($config, $audio);

            // Obtener la transcripción
            $transcripcion = $response->getResults()[0]->getAlternatives()[0]->getTranscript();

            // Enviar la respuesta en formato JSON
            return response()->json(['transcripcion' => $transcripcion]);

        } catch (GoogleException $e) {
            // Muestra un error si ocurre una excepción
            return response()->json(['error' => 'Error en la transcripción: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Chatbot $chatbot)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chatbot $chatbot)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Chatbot $chatbot)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chatbot $chatbot)
    {
        //
    }
}
