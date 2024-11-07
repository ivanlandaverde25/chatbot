document.addEventListener('DOMContentLoaded', (e) => {

    // Funcion para convertir texto a voz
    function convertirTextoAVoz() {
            
        const texto = document.getElementById("texto").value;
        
        if (texto != ''){
            responsiveVoice.speak(texto, "Spanish Female");
        } else {
            alert("Debe ingresar un texto");
        }
    }
    
    

});