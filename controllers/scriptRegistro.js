document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('registrationForm');

    form.addEventListener('submit', function (event) {
        event.preventDefault();

        const formData = new FormData(form);
        fetch('registro_usuario_DB.php', {
            method: 'POST',
            body: formData,
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert("¡Usuario registrado correctamente!");
                window.location.href = 'login.php'; 
            } else {
                let errorMsg = "Errores en el registro:\n";
                data.errors.forEach(error => {
                    errorMsg += `- ${error}\n`;
                });
                alert(errorMsg); 
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert("Ocurrió un error inesperado. Por favor, intente de nuevo.");
        });
    });
});
