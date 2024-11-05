document.addEventListener('DOMContentLoaded', (e) => {
    console.log('Detalles');
    alert('Detalles');

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
        typeSpeed: 50,
        loop: false,
        loopCount: Infinity,
        showCursor: false,
        autoInsertCss: true,
    });

    let generarRespuesta = () =>{
        let respuesta = document.getElementById('respuesta');
    };
});