$(document).ready(function() {
    // Realizar una solicitud AJAX al cargar la página para obtener todos los temas
    $.ajax({
        url: 'buscar_temas.php',
        method: 'POST',
        data: {},
        success: function(response) {
            $('#resultados').html(response); // Mostrar los resultados en el elemento con id "results"
        },
        error: function(xhr, status, error) {
            console.error(error); // Mostrar el mensaje de error en la consola
        }
    });
});