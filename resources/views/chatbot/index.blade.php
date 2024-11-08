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
                {{-- <p>Aqui se muestran todas las acciones</p> --}}
                <img src="{{asset('images/Logo_Boti.png')}}" alt="" class="img-logo">
                
                {{-- Formulario para la creacion del expediente --}}
                <div class="form-create-expediente" id="formCreateExpediente">
                    
                    {{-- Encabezado del formulario --}}
                    <div class="form-create-expediente-header">
                        <div class="logo" style="display: flex; justify-content:center; align-items: center;">
                            <img src="{{asset('images/Logo_Boti.png')}}" alt="" style="width: 5rem;">
                        </div>
                        <div class="title-form" class="title-form">
                            <h3>Formulario para la creacion del expediente</h3>
                        </div>
                        <div class="alert alert-info">
                            <strong>Importante:</strong>
                            <ul class="alert-list">
                                <li class="alert-list-item">• Completa la siguiente información para aperturar tu expediente.</li>
                                <li class="alert-list-item">• Toda tu informacion es completamente confidencial.</li>
                                <li class="alert-list-item">• Tu expediente servirá para tus proximas citas y consultas.</li>
                            </ul>
                        </div>
                    </div>

                    {{-- Cuerpo del formulario --}}
                    <div class="form-create-expediente-body" id="formCreateExpedienteBody">
                        
                        <form action="" class="form-create-exp" id="formCreateExp">

                            {{-- Fila 1 del formulario --}}
                            <div class="fila fila1">
                                
                                {{-- Campo para nombres --}}
                                <div class="block">
                                    <input type="text" autocomplete="off" id="inputNombres" class="input-form" name="nombres" required/>
                                    <label class = "label-form">Nombres *</label>
                                    <span></span>
                                </div>

                                {{-- Campo para apellidos --}}
                                <div class="block">
                                    <input type="text" autocomplete="off" id="inputApellidos" class="input-form" name="apellidos" required/>
                                    <label class = "label-form">Apellidos *</label>
                                    <span></span>
                                </div>
                            </div>
    
                            {{-- Fila 2 del formulario --}}
                            <div class="fila fila2">
                                <div class="block">
                                    <input type="text" autocomplete="off" id="inputDireccion" class="input-form" name = "direccion" required/>
                                    <label class = "label-form">Direccion *</label>
                                    <span></span>
                                </div>
                            </div>

                            {{-- Fila 3 del formulario --}}
                            <div class="fila fila3">
                                
                                {{-- Campo para tipo de documento --}}
                                <div class="block">
                                    <input type="text" list="listTipoDocumento" autocomplete="off" id="inputTipoDocumento" class="input-form" name="tipo_documento" required/>
                                    <datalist id="listTipoDocumento">
                                        <option value="DUI">Documento Único de Identidad</option>
                                        <option value="Pasaporte">Pasaporte</option>
                                        <option value="NUI">Número Único de Identidad</option>
                                    </datalist>
                                    <label class = "label-form">Tipo de documento *</label>
                                    <span></span>
                                </div>

                                {{-- Campo para Numero de documento --}}
                                <div class="block">
                                    <input type="text" autocomplete="off" id="inputNumeroDocumento" class="input-form" name="numero_documento" required/>
                                    <label class = "label-form">Número de documento *</label>
                                    <span></span>
                                </div>
                            </div>

                            {{-- Fila 4 del formulario --}}
                            <div class="fila fila3">
                                
                                {{-- Campo para correo --}}
                                <div class="block">
                                    <input type="email" autocomplete="off" id="inputCorreo" class="input-form" name="correo" required/>
                                    <label class = "label-form">Correo *</label>
                                    <span></span>
                                </div>

                                {{-- Campo para Numero de telefono --}}
                                <div class="block">
                                    <input type="text" autocomplete="off" id="inputNumeroTelefono" class="input-form" name="numero_telefono" required/>
                                    <label class = "label-form">Número de teléfono *</label>
                                    <span></span>
                                </div>
                            </div>

                            {{-- Fila 5 del formulario --}}
                            <div class="fila fila4">
                                
                                {{-- Campo para fecha de nacimiento --}}
                                <div class="block">
                                    <input type="date" autocomplete="off" id="inputFechaNacimiento" class="input-form" name="fecha_nacimiento" required/>
                                    <label class = "label-form">Fecha de nacimiento *</label>
                                    <span></span>
                                </div>

                                {{-- Campo para antecedentes --}}
                                <div class="block">
                                    <input type="text" autocomplete="off" id="inputAntecedentes" class="input-form" name="antecedentes" required/>
                                    <label class = "label-form">Antecedentes</label>
                                    <span></span>
                                </div>
                            </div>

                            {{-- Footer del formulario --}}
                            <div class="form-create-expediente-footer">
                                <button type="submit" class="button-form-create button-form-create-submit" id="buttonFormCreateExp"><i class="fa-regular fa-floppy-disk"></i> Guardar</button>
                                <button type="button" class="button-form-create button-form-create-cancel"><i class="fa-regular fa-circle-xmark"></i> Cancelar</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>

            {{-- Contenedor donde se va ir mostrando todos los mensajes que se vayan enviando y generando --}}
            <div class="container-chat">
                
                {{-- Encabezado de chatbot --}}
                <div class="container-chat-header">
                    <h3>Boti</h3>
                    <div class="header-activate-voice">
                        Ingreso por voz
                    </div>
                </div>

                {{-- Aqui se van a ir mostrando todos los mensajes que ingresen --}}
                <div class="container-chat-message" id="container-chat-message">
                    
                    {{-- Mensaje por defecto que se muestra de las acciones que se pueden realizar --}}
                    <div class="prompt prompt-IA">
                        <p>Hola, soy Boti, estoy aquí para ayudar con tus tareas. Si necesitas ayuda con creación de expediente, agendamiento de citas o consultas médicas solo hazmelo saber.</p>
                    </div>
                    
                    {{-- Aqui se van a ir agregando todos los chat para hacer el efecto del scroll --}}
                    <div class="container-chat-message-scroll" id="container-chat-message-scroll">

                    </div>
                </div>

                {{-- Aqui se muestran las interacciones para enviar mensajes o grabar audio --}}
                <div class="container-chat-footer">
                    {{-- Aqui van las acciones --}}
                    <input type="text" id="input-prompt" class="input-prompt" name="input-prompt" placeholder="Que queres maje...">

                    <div class="container-chat-footer-buttons">
                        {{-- Boton mediante el cual se puede realizar el envio de la solicitud por texto --}}
                        <button type="button" id="btnSendText" class="btn"><i class="fa-solid fa-paper-plane icon"></i></button>
                        
                        {{-- Boton mediante el cual se puede iniciar la grabación del audio --}}
                        <button type="button" id="btnRecordAudio" class="btn"><i class="fa-solid fa-microphone icon"></i></button>
                        
                        {{-- Boton mediante el cual se puede detener la grabación de audio --}}
                        <button type="button" id="btnStopdAudio" class="btn btn-stop-record hidden"><i class="fa-solid fa-microphone-slash icon"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="{{asset('js/app.js')}}"></script>
    </body>

    <script>
        const btnSendText = document.getElementById('btnSendText');
        const btnRecordAudio = document.getElementById('btnRecordAudio');
        const btnStopdAudio = document.getElementById('btnStopdAudio');
        const inputMessage = document.getElementById('input-prompt');
        let mensajesGenrados = [];
        let mediaRecorder;
        let audioChunks = [];

        // Formulario para creacion de paciente
        let formCreateExp = document.getElementById('formCreateExp');

        // Funcion para hacer el scroll hacia abajo
        function scrollToBottom() {
            const chatBox = document.getElementById("container-chat-message");
            chatBox.scrollTop = chatBox.scrollHeight;
        }

        // Funcion para iniciar el grabado de audio y transcribirlo
        btnRecordAudio.addEventListener('click', async (e) =>{
            console.log('Compatibilidad de getUserMedia:', !!navigator.mediaDevices?.getUserMedia);
            
            const stream = await navigator.mediaDevices.getUserMedia({ audio: true });
            mediaRecorder = new MediaRecorder(stream);

            mediaRecorder.ondataavailable = event => {
                audioChunks.push(event.data);
            };

            mediaRecorder.onstop = () => {
                const audioBlob = new Blob(audioChunks, { type: 'audio/wav' });
                audioChunks = [];
                uploadAudio(audioBlob);
            };

            mediaRecorder.start();
        });

        // Funcion para detener el grabado del audio
        btnStopdAudio.addEventListener('click', () => {
            mediaRecorder.stop();
        });

        // Funcion para subir el audio
        async function uploadAudio(audioBlob) {
            const formData = new FormData();
            formData.append('audio', audioBlob);

            const response = await fetch('/transcribe-audio', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                },
                body: formData
            });

            const data = await response.json();
            // document.getElementById('transcription').textContent = data.transcription;
            console.log(data);
            console.log('La transcripcion es:' + data.transcription);
        }

        // Funcion para almacenar dentro del arreglo los mensajes que se vayan generado
        function guardarMensajes( mensaje, usuario) {
            let data = {
                mensaje: mensaje,
                usuario: usuario
            };

            mensajesGenrados.push(JSON.parse(data));
            console.log(mensajesGenrados);
        }

        // Funcion que se utiliza dentro de consultar GPT4 para mostrar las respuestas en pantalla
        function crearMensaje( mensaje, usuario ) {

            // Generar el div general donde se mostrara el mensaje
            const divGeneral = document.createElement('div');
            divGeneral.classList.add('div-general');

            // Agregar el div especifico al que se le agregaran los estilos
            const miDiv = document.createElement('div');
            miDiv.classList.add('prompt');

            // validar si el mensaje es del usuario o del GPT
            if ( usuario === 1 ){
                // El usuairo 1 indica que es la persona
                divGeneral.classList.add('flex-end');
                miDiv.classList.add('prompt-user');

                // Crear el parrafo para mostrar el texto
                const miParrafo = document.createElement('p');
                miParrafo.textContent = mensaje;
                miDiv.appendChild(miParrafo);
                
                // Añadir el div al body o a otro contenedor
                contentChat = document.getElementById('container-chat-message-scroll');
                contentChat.appendChild(divGeneral);
                
            } else if ( usuario === 2 ){
                // El usuario 2 indica que es el GPT
                divGeneral.classList.add('flex-start');
                miDiv.classList.add('prompt-IA');
                
                // Crear el parrafo para mostrar el texto y dar el efecto de escritura
                const miParrafo = document.createElement('p');
                const typedResponse = new Typed(miParrafo, {
                        strings: [
                        mensaje,
                    ],
                    typeSpeed: 10,
                    loop: false,
                    loopCount: Infinity,
                    showCursor: false,
                    autoInsertCss: true,
                });
                miDiv.appendChild(miParrafo);

                // Añadir el div al body o a otro contenedor
                contentChat = document.getElementById('container-chat-message-scroll');
                contentChat.appendChild(divGeneral);
                responsiveVoice.speak(mensaje, "Spanish Female");
            }

            divGeneral.appendChild(miDiv);
            scrollToBottom();
        }

        // Funcion para abrir el expediente
        function abrirExpediente(){
            console.log('Aqui se abre el expediente');
            let formCreateExpediente = document.getElementById('formCreateExpediente');
            let formCreateExpedienteBody = document.getElementById('formCreateExpedienteBody');

            formCreateExpedienteBody.classList.remove('hidden');
            formCreateExpediente.classList.add('show-form');
        }

        // Funcion para realizar la peticion a GPT4 y traer la respuesta
        async function consultarGPT4() {
            
            const prompt = document.getElementById('input-prompt').value;

            // const prompt = '¿Que hace un vampiro en un tractór?';
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            // responsiveVoice.speak(prompt, "Spanish Female");

            try {
                const response = await fetch('/consultar-gpt4', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    },
                    body: JSON.stringify({ prompt: prompt })
                });
                inputMessage.value = '';

                // console.log(response);
                if (!response.ok) {
                    throw new Error(`Error: ${response.status} ${response.statusText}`);
                    console.log('ERORRRR')
                }

                const data = await response.json();

                crearMensaje(data.respuesta, 2);

                if (data.respuesta.match('abrir tu expediente')){
                    console.log('Si detecto la funcion');
                    setTimeout(() => {
                        abrirExpediente();
                    }, 2000);
                }
                console.log('La respuesta se agrego exitosamente')


            } catch (error) {
                console.error('Error:', error);
                alert('Hubo un error al procesar tu solicitud.');
            }
        }

        // Ocultar el botón de inicio de audio
        btnRecordAudio.addEventListener('click', () =>{
            btnRecordAudio.classList.add('hidden');
            btnStopdAudio.classList.remove('hidden');
        });

        // Ocultar el botón de finalización de audio
        btnStopdAudio.addEventListener('click', () =>{
            btnRecordAudio.classList.remove('hidden');
            btnStopdAudio.classList.add('hidden');
        });

        btnSendText.addEventListener('click', () =>{
            const inputPrompt = document.getElementById('input-prompt');

            if ( inputPrompt.value != '' ){
                const mensaje = inputPrompt.value;
    
                crearMensaje(mensaje, 1);
                consultarGPT4();
                inputPrompt.value = '';
                // responsiveVoice.speak(mensaje, "Spanish Female");
            } else {
                alert('Por favor, escribe algo para enviaaaaaar.');
            }
        });

        // Funcion para detonar el envio de mensaje por medio de la tecla enter
        inputMessage.addEventListener('keydown', async (e) =>{
            if ( e.key === 'Enter'){
                e.preventDefault();
                crearMensaje(inputMessage.value, 1); //
                await consultarGPT4();
                // inputMessage.value = '';
            }
        });

    </script>
</html>