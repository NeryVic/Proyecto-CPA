
//!«Su contraseña debe tener entre 8 y 30 caracteres y contener una letra mayúscula, un símbolo y un número». 
//!(Se requiere un formato de datos muy específico para tus datos).



document.addEventListener('DOMContentLoaded', (event) => {
    const error = document.getElementById('error');
    const form = document.getElementById('form');
    const submit = document.getElementById('btn');
    const name = document.getElementById('name');
    const lastName = document.getElementById('lastName');
    const dni = document.getElementById('dni');
    const email = document.getElementById('email');
    const tel = document.getElementById('tel');
    const cumple = document.getElementById('birthDate');

    const password = document.getElementById('password');
    const password2 = document.getElementById('password2');

    submit.addEventListener('click', (event) => {
        event.preventDefault();
        validateAndSubmit();
    });

    function validateAndSubmit() {
        const nameInput = name.value;
        const lastNameInput = lastName.value;
        const dniInput = dni.value;
        // Validar que el input no esté vacío
        if (nameInput.trim() === '' || lastNameInput.trim() === '' || dniInput.trim() === '') {
            showError('Todos los campos son obligatorios.');
            return false;
        }

        // Validar que el input solo contenga caracteres alfabéticos
        
        const namePattern = /^[a-zA-Z]+$/;
        const dniPattern = /^[0-9]+$/;
        if (!namePattern.test(nameInput) || !namePattern.test(lastNameInput)) {
            showError("El nombre solo debe contener caracteres alfabéticos.");
            return false;
        }
            else if (!dniPattern.test(dniInput)) {
                showError("El DNI solo debe contener caracteres numéricos.");
                return false;
            }
        





        // Si la validación es exitosa, proceder con el envío
        form.submit();
    }

    function showError(message) {
        error.textContent = message;
        error.style.display = 'inline';
        // Ocultar el mensaje de error después de 3 segundos (3000 ms)
        setTimeout(() => {
            error.style.display = 'none';
        }, 3000);
    }

});
