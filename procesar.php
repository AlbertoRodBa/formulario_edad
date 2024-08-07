<?php
function mostrarError($mensaje) {
    echo "<!DOCTYPE html>";
    echo "<html lang='es'>";
    echo "<head>";
    echo "<meta charset='UTF-8'>";
    echo "<title>Error</title>";
    echo "<link rel='stylesheet' href='styles.css'>";
    echo "</head>";
    echo "<body>";
    echo "<div class='container'>";
    echo "<h2>Error</h2>";
    echo "<p>$mensaje</p>";
    echo "</div>";
    echo "</body>";
    echo "</html>";
    exit();
}

// Verificar si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $nombre = $_POST['nombre'];
    $edad = $_POST['edad'];

    // Validar los datos
    if (!empty($nombre) && !empty($edad) && is_numeric($edad)) {
        $nombre_sanitizado = htmlspecialchars($nombre);
        $edad_sanitizada = htmlspecialchars($edad);
        $mensaje = $edad >= 18 ? "Confirmaste que eres mayor de edad." : "Confirmaste que eres menor de edad.";

        echo "<!DOCTYPE html>";
        echo "<html lang='es'>";
        echo "<head>";
        echo "<meta charset='UTF-8'>";
        echo "<title>Resultados del Formulario</title>";
        echo "<link rel='stylesheet' href='styles.css'>";
        echo "</head>";
        echo "<body>";
        echo "<div class='container'>";
        echo "<h2>Resultados:</h2>";
        echo "Nombre: $nombre_sanitizado<br>";
        echo "Edad: $edad_sanitizada<br>";
        echo $mensaje;
        echo "</div>";
        echo "</body>";
        echo "</html>";
    } else {
        mostrarError("Datos inválidos. Por favor, vuelva a intentarlo.");
    }
} else {
    mostrarError("Formulario no enviado correctamente.");
}
?>
