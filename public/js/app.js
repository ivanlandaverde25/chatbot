document.addEventListener('DOMContentLoaded', (e) => {

    // Formulario para creacion de paciente
    let formCreateExp = document.getElementById('formCreateExp');
    let buttonFormCreateExp = document.getElementById('buttonFormCreateExp');
    let csrftoken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        formCreateExp.addEventListener('submit', (e) => {
            e.preventDefault();
            // Obtener los datos del formulario
            const formData = new FormData(formCreateExp);
            
            // Opcional: Convertir a un objeto JSON
            const data = Object.fromEntries(formData.entries());
            console.log(data);

            fetch('/crear-paciente', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': csrftoken
                },
                body: JSON.stringify(data)
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Error en el envío del formulario');
                }
                return response.json();
            })
            .then(data => {
                alert(data.message); // Mostrar el mensaje de éxito
            })
            .catch(error => {
                console.error('Hubo un problema con el envío:', error);
            });
        });
    
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