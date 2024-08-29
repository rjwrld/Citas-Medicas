$(document).ready(function() {
    $("#registrationForm").on("submit", function(event) {
        event.preventDefault(); // Evita el envío automático del formulario

        let errores = [];
        let nombre = $("#nombre").val().trim();
        let apellidos = $("#apellidos").val().trim();
        let usuario = $("#usuario").val().trim();
        let contrasena = $("#contrasena").val().trim();
        let repetirContrasena = $("#repetir_contrasena").val().trim();
        let correo = $("#correo").val().trim();
        let telefono = $("#telefono").val().trim();
        let identificacion = $("#identificacion").val().trim();

        // Validaciones
        if (nombre.length === 0 || nombre.length > 15) {
            errores.push("El nombre es obligatorio y no puede exceder los 15 caracteres.");
        }
        if (apellidos.length === 0 || apellidos.length > 30) {
            errores.push("Los apellidos son obligatorios y no pueden exceder los 30 caracteres.");
        }
        if (usuario.length === 0 || usuario.length > 20) {
            errores.push("El nombre de usuario es obligatorio y no puede exceder los 20 caracteres.");
        }
        if (contrasena.length === 0 || contrasena.length > 20) {
            errores.push("La contraseña es obligatoria y no puede exceder los 20 caracteres.");
        }
        if (repetirContrasena !== contrasena) {
            errores.push("Las contraseñas no coinciden.");
        }
        if (!/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/.test(correo)) {
            errores.push("El correo electrónico no es válido.");
        }
        if (!/^\d{8}$/.test(telefono)) {
            errores.push("El teléfono debe tener 8 dígitos.");
        }
        if (!/^\d{9}$/.test(identificacion)) {
            errores.push("La identificación debe tener 9 dígitos.");
        }

        if (errores.length > 0) {
            alert(errores.join("\n"));
        } else {
            this.submit(); 
        }
    });
});
