<?php

namespace App\Http\Controllers;

use App\Models\Chatbot;
use App\Services\OpenAIServices;
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
