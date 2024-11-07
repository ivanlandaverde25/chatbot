<?php

use App\Http\Controllers\ChatbotController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/chatbot', [ChatbotController::class, 'index']);

// Rutas para el GPT
Route::post('/consultar-gpt4', [ChatbotController::class, 'consulta']);
// Route::match(['get','post'],'/consulta-gpt', [ChatbotController::class, 'consulta']);

// Ruta para guardar los mensajes generados
Route::post('/guardar-mensajes', [ChatbotController::class, 'guardarMensajes']);