// Validar los campos
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
        const nameInput = name.value.trim();
        const lastNameInput = lastName.value.trim();
        const dniInput = dni.value.trim();
        const emailInput = email.value.trim();
        const telInput = tel.value.trim();
        const cumpleInput = cumple.value.trim();
        const passwordInput = password.value.trim();
        const password2Input = password2.value.trim();

        // Validar que los campos no estén vacíos
        if (!nameInput || !lastNameInput || !dniInput || !emailInput || !telInput || !cumpleInput || !passwordInput || !password2Input) {
            showError('Todos los campos son obligatorios.');
            return false;
        }

        // Patrones de validación
        const namePattern = /^[a-zA-Z]+$/;
        const dniPattern = /^[0-9]+$/;
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        const telPattern = /^[0-9]+$/;
        const passPattern = /^[A-Za-z\d]{8,30}$/;

        // Validaciones
        if (!namePattern.test(nameInput) || !namePattern.test(lastNameInput)) {
            showError("El nombre y apellido solo deben contener caracteres alfabéticos.");
            return false;
        }

        if (!dniPattern.test(dniInput)) {
            showError("El DNI solo debe contener caracteres numéricos.");
            return false;
        }

        if (!emailPattern.test(emailInput)) {
            showError("El correo electrónico es incorrecto.");
            return false;
        }

        if (!telPattern.test(telInput)) {
            showError("El teléfono solo debe contener caracteres numéricos.");
            return false;
        }
        if (!passPattern.test(passwordInput)) {
            showError("La contraseña debe tener entre 8 y 30 caracteres y ser alfanumérico.");
            return false;
        }

        else {
            const [day, month, year] = cumpleInput.split('/').map(Number);
            const añoActual = new Date().getFullYear();
            if (day < 1 || day > 31) {
                showError("El día debe estar entre 1 y 31.");
                return false;
            }
            if (month < 1 || month > 12) {
                showError("El mes debe estar entre 1 y 12.");
                return false;
            }
            if (añoActual - year < 18) {
                showError("Debe ser mayor de 18 años.");
                return false;
        }
    }
    if (passwordInput !== password2Input) {
        showError("Las contraseñas no coinciden.");
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
    document.getElementById('birthDate').addEventListener('input', function(e) {
        let input = e.target.value.replace(/\D/g, '').substring(0, 8); // Elimina todo lo que no sean dígitos y limita a 8 caracteres
        let day = input.substring(0, 2) ;
        let month = input.substring(2, 4);
        let year = input.substring(4, 8);
    
        if (input.length > 4 ) {
            e.target.value = `${day} / ${month} / ${year}` ;
        } else if (input.length > 2) {
            e.target.value = `${day} / ${month}`;
        } else if (input.length > 0) {
            e.target.value = `${day}`;
        }
    });
});