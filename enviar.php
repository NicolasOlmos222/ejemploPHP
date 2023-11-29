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

    $nombre = $_POST['nombre'];
    $email = $_POST['email'];

    $sql = "INSERT INTO datos (nombre, email) VALUES ('$nombre', '$email')";

    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("Envio Exitoso!");
                      window.location.href = "http://localhost/prueba/index.html";
              </script>';
        //header("Location: http://localhost/prueba/index.html");
    } else {
        echo "Error al insertar el registro: " . $conn->error;
    }
}
?>
