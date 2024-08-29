document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('loginForm');

    form.addEventListener('submit', function (event) {
        event.preventDefault();

        const formData = new FormData(form);
        fetch('login_DB.php', {
            method: 'POST',
            body: formData,
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert("¡Inicio de sesión exitoso!");
                window.location.replace('index.php'); 
            } else {
                let errorMsg = "Errores en el inicio de sesión:\n";
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
