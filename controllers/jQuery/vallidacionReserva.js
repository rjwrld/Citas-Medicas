$(document).ready(function() {
    $('#reservationForm').submit(function(event) {
        // Obtener los valores de los campos
        const nombre = $('#nombre').val().trim();
        const fecha = $('#fecha').val();
        const hora = $('#hora').val();
        const especialidad = $('#especialidad').val();
        const motivo = $('#motivo').val().trim();

        // Validar campos vacíos
        if (nombre === '' || fecha === '' || hora === '' || motivo === '') {
            alert('Por favor, completa todos los campos obligatorios.');
            event.preventDefault(); // Evitar el envío del formulario
            return false;
        }

        // Validar que la fecha no sea en domingo
        const fechaSeleccionada = new Date(fecha);
        const diaSemana = fechaSeleccionada.getDay();

        if (diaSemana === 0) {
            alert('No se pueden hacer reservas los domingos.');
            event.preventDefault();
            return false;
        }

        // Validar que la hora esté entre 05:00 y 15:00
        const horaSplit = hora.split(':');
        const horaSeleccionada = parseInt(horaSplit[0]);
        const minutoSeleccionado = parseInt(horaSplit[1]);

        if (horaSeleccionada < 5 || horaSeleccionada > 15 || (horaSeleccionada === 15 && minutoSeleccionado > 0)) {
            alert('La hora de la cita debe estar entre las 05:00 AM y las 03:00 PM.');
            event.preventDefault();
            return false;
        }

        // Validar que el motivo tenga al menos 10 caracteres
        if (motivo.length < 10) {
            alert('El motivo debe contener al menos 10 caracteres.');
            event.preventDefault();
            return false;
        }

        // Si todas las validaciones pasan, el formulario se enviará
        return true;
    });
});
