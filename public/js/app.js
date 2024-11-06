document.addEventListener('DOMContentLoaded', (e) => {
    console.log('Detalles');

    // Funcion para convertir texto a voz
    function convertirTextoAVoz() {
            
        const texto = document.getElementById("texto").value;
        
        if (texto != ''){
            responsiveVoice.speak(texto, "Spanish Female");
        } else {
            alert("Debe ingresar un texto");
        }
    }
    
    // Mostrar texto para el chatbot
    let typedResponse = new Typed('#respuesta', {
        strings: [
            'texto de ejemplo donde se simula la resputa del chatbot a mostrar dentro del chat'
        ],
        typeSpeed: 10,
        loop: false,
        loopCount: Infinity,
        showCursor: false,
        autoInsertCss: true,
    });
    
    // Funcion para generar una respuesta aleatoria al chatbot
    // let generarRespuesta = () => {
    //     let respuestaChatBot = document.getElementById('respuestaChatBot');
    //     let text = "Este es el mensaje que se va utilizar para mostrar como texto y se va a reproducir con voz como si fuera de un chatbot";
        
    //     const typedResponse = new Typed(respuestaChatBot, {
    //         strings: [
    //             text,
    //         ],
    //         typeSpeed: 10,
    //         loop: false,
    //         loopCount: Infinity,
    //         showCursor: false,
    //         autoInsertCss: true,
    //     });

    //     // Simular la respuesta del chatbot
    //     responsiveVoice.speak(text, "Spanish Female", {rate: 0.9});
    // };
        
    let btnGenerar = document.getElementById('btnGenerar');
    btnGenerar.addEventListener('click', () => {
        // generarRespuesta();
    });
});