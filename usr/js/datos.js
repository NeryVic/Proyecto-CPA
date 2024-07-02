document.addEventListener('DOMContentLoaded', (event) => {
    const error = document.getElementById('error');
    const form = document.getElementById('form');
    const submit = document.getElementById('submit');
    const img = document.getElementById('img');
    const email = document.getElementById('email');
    const tel = document.getElementById('tel');
    const calle = document.getElementById('calle');
    const ciudad = document.getElementById('ciudad');
    

    submit.addEventListener('click', (event) => {
        event.preventDefault();
        validateAndSubmit();
    });

    function validateAndSubmit() {
        const emailInput = email.value.trim();
        const telInput = tel.value.trim();
        const calleInput = calle.value.trim();
        const ciudadInput = ciudad.value;

        if (!emailInput || !telInput || !calleInput || ciudadInput === '') {
            showError('Todos los campos son obligatorios.');
            return false;
        }

        // Patrón de validación del correo electrónico
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailPattern.test(emailInput)) {
            showError('El correo electrónico no es válido.');
            return false;
        }

        // Patrón de validación del teléfono (solo números)
        const telPattern = /^[0-9]+$/;
        if (!telPattern.test(telInput)) {
            showError('El teléfono solo debe contener caracteres numéricos.');
            return false;
        }

          // Validar tipo de archivo de imagen
        const file = img.files[0];
        if (file) {
            const allowedTypes = ['image/jpeg', 'image/png'];
            if (!allowedTypes.includes(file.type)) {
                showError('Solo se permiten imágenes en formato JPG o PNG.');
                return false;
            }
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