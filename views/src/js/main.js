
            // Obtenemos todos los checkboxes de justificación
            const justificacionCheckboxes = document.querySelectorAll('.justificacion-checkbox');

            // Iteramos sobre cada checkbox
            justificacionCheckboxes.forEach(justificacionCheckbox => {
                // Obtenemos el checkbox de asistencia correspondiente a este checkbox de justificación
                const asistenciaCheckboxId = justificacionCheckbox.id.replace('_2', '_1');
                const asistenciaCheckbox = document.getElementById(asistenciaCheckboxId);

                // Añadimos un event listener para detectar clics en el checkbox de justificación
                justificacionCheckbox.addEventListener('click', function() {
                    // Si el checkbox de justificación está marcado
                    if (this.checked) {
                        // Deshabilitamos el checkbox de asistencia
                        asistenciaCheckbox.disabled = true;
                    } else {
                        // Si se desmarca el checkbox de justificación, habilitamos el checkbox de asistencia
                        asistenciaCheckbox.disabled = false;
                    }
                });

                // Añadimos un event listener para detectar clics en el checkbox de asistencia
                asistenciaCheckbox.addEventListener('click', function() {
                    // Si el checkbox de asistencia está marcado
                    if (this.checked) {
                        // Deshabilitamos el checkbox de justificación
                        justificacionCheckbox.disabled = true;
                    } else {
                        // Si se desmarca el checkbox de asistencia, habilitamos el checkbox de justificación
                        justificacionCheckbox.disabled = false;
                    }
                });
            });
        