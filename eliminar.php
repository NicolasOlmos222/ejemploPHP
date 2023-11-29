<?php
// Datos de conexión a la base de datos
$servername = "localhost";
$username = "admin";
$password = "admin";
$database = "prueba";

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    $nombre = $_POST['nombreEliminar'];

    $sql = "DELETE FROM datos WHERE nombre='$nombre'";

    // Ejecutar la consulta
    if ($conn->query($sql) === TRUE) {
        if ($conn->affected_rows > 0) {
            echo '<script>alert("Usuario eliminado!");
                      window.location.href = "http://localhost/prueba/index.html";
              </script>';
        } else {
            echo '<script>alert("No se encontro el nombre!");
                      window.location.href = "http://localhost/prueba/index.html";
              </script>';
        }
    } else {
        echo "Error al actualizar el email: " . $conn->error;
    }

}
?>
