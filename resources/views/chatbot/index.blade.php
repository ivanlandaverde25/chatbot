<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{csrf_token()}}">
        {{-- Convetir texto a voz --}}
        <script src="https://code.responsivevoice.org/responsivevoice.js?key=ir03rfNU"></script>
        
        {{-- typed js --}}
        <script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>

        {{-- Estilos --}}
        <link rel="stylesheet" href="{{asset('css/style.css')}}">

        {{-- Fuente --}}
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
        
        {{-- Iconos --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <title>Chatbot</title>
    </head>
    <body>
        {{-- Contenedor general del chatbot --}}
        <div class="container">

            {{-- menu --}}
            <header class="header">
                gfbf
            </header>

            {{-- Contenedor donde se van a ir mostrando todas las acciones --}}
            <div class="container-actions">
                <p>Aqui se muestran todas las acciones</p>
            </div>

            {{-- Contenedor donde se va ir mostrando todos los mensajes que se vayan enviando y generando --}}
            <div class="container-chat">
                
                {{-- Encabezado de chatbot --}}
                <div class="container-chat-header">
                    <h2>Boti</h2>
                    <div class="header-activate-voice">
                        Ingreso por voz
                    </div>
                </div>

                {{-- Aqui se van a ir mostrando todos los mensajes que ingresen --}}
                <div class="container-chat-message">
                    
                    {{-- Mensaje por defecto que se muestra de las acciones que se pueden realizar --}}
                    <div class="prompt prompt-IA">
                        <p>Hola, soy Boti, estoy aquí para ayudar con tus tareas. Si necesitas ayuda con creación de expediente, agendamiento de citas o consultas médicas solo hazmelo saber.</p>
                    </div>

                    {{-- Aqui se van a ir agregando todos los chat para hacer el efecto del scroll --}}
                    <div class="container-chat-message-scroll">

                        {{-- Datos de prueba --}}
                        <h1>Prueba de Conversión de Texto a Voz</h1>
                        <div>
                            <input type="text" id="mensaje" name="mensaje" value="que dia es hoy?" disabled>
                            <p id="respuesta"></p>
                            <input type="text" id="texto" required>
                            <br>
                            <button onclick="">Escuchar</button>
                            <br>
                            <div class="">
                                <button type="button" id="btnGenerar">Generar respuesta con voz</button>
                                <p id="respuestaChatBot"></p>
                            </div>
                        </div>
                        <button type="button" onclick="consultarGPT4();">Consultar</button>
                    </div>
                </div>

                {{-- Aqui se muestran las interacciones para enviar mensajes o grabar audio --}}
                <div class="container-chat-footer">
                    {{-- Aqui van las acciones --}}
                    <input type="text" id="input-prompt" class="input-prompt" name="input-prompt">

                    <div class="container-chat-footer-buttons">
                        {{-- Boton mediante el cual se puede realizar el envio de la solicitud por texto --}}
                        <button type="button" id="btnSendText" class="btn"><i class="fa-solid fa-paper-plane icon"></i></button>
                        
                        {{-- Boton mediante el cual se puede iniciar la grabación del audio --}}
                        <button type="button" id="btnRecordAudio" class="btn"><i class="fa-solid fa-microphone icon"></i></button>
                        
                        {{-- Boton mediante el cual se puede detener la grabación de audio --}}
                        <button type="button" id="btnstopdAudio" class="btn hidden"><i class="fa-solid fa-microphone-slash icon"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="{{asset('js/app.js')}}"></script>
    </body>

    <script>
        async function consultarGPT4() {
            // const prompt = document.getElementById('prompt').value;
            const prompt = '¿Que hace un vampiro en un tractór?';
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            responsiveVoice.speak(prompt, "Spanish Female");

            console.log(JSON.stringify({ prompt: prompt }));

            try {
                const response = await fetch('/consultar-gpt4', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    },
                    body: JSON.stringify({ prompt: prompt })
                });

                if (!response.ok) {
                    throw new Error(`Error: ${response.status} ${response.statusText}`);
                    console.log('ERORRRR')
                }

                const data = await response.json();
                document.getElementById('respuesta').innerText = data.respuesta;
                console.log('La respuesta se agrego exitosamente')


            } catch (error) {
                console.error('Error:', error);
                alert('Hubo un error al procesar tu solicitud.');
            }
        }
    </script>
</html>