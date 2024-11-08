<?php

use App\Http\Controllers\ChatbotController;
use App\Http\Controllers\PacienteController;
use Illuminate\Http\Request;
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

// Ruta para convertir el audio a texto
Route::post('/transcribe-audio', [ChatbotController::class, 'transcripcionAudio']);


// Rutas para la gestion de pacientes
Route::post('/crear-paciente', [PacienteController::class, 'store'])->name('paciente.store');