<?php

namespace App\Http\Controllers;

use App\Models\Chatbot;
use App\Services\OpenAIServices;
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

        $audioFile = $request->file('audio');
        $audioPath = $audioFile->store('audio', 'public');
        $audioContent = file_get_contents(storage_path("app/public/{$audioPath}"));

        $speech = new SpeechClient([
            'credentials' => json_decode(file_get_contents(storage_path('app/google-cloud.json')), true)
        ]);

        $config = new RecognitionConfig([
            'encoding' => RecognitionConfig\AudioEncoding::LINEAR16,
            // 'sample_rate_hertz' => 16000,
            'language_code' => 'en-US',
        ]);
        $audio = new RecognitionAudio(['content' => $audioContent]);

        $response = $speech->recognize($config, $audio);
        $transcription = '';

        foreach ($response->getResults() as $result) {
            $transcription .= $result->getAlternatives()[0]->getTranscript();
        }

        $speech->close();

        return response()->json(['transcription' => $transcription]);
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
