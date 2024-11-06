<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        {{-- Convetir texto a voz --}}
        <script src="https://code.responsivevoice.org/responsivevoice.js?key=ir03rfNU"></script>
        
        {{-- typed js --}}
        <script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>
        <meta name="csrf-token" content="{{csrf_token()}}">
        <title>Chatbot</title>
    </head>
    <body>
        {{-- Contenedor general del chatbot --}}
        <div class="container">

            {{-- Contenedor donde se van a ir mostrando todas las acciones --}}
            <div class="container-actions">

            </div>

            {{-- Contenedor donde se va ir mostrando todos los mensajes que se vayan enviando y generando --}}
            <div class="container-chat">

            </div>
        </div>
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