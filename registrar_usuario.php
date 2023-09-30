<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir datos del formulario
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $correo = $_POST["correo"];
    $contrasena = password_hash($_POST["contrasena"], PASSWORD_BCRYPT); // Hashear la contraseña antes de almacenarla

    // Establecer la conexión a la base de datos (reemplaza con tus propios datos)
    $conexionn = new mysqli("tu-servidor", "tu-usuario", "tu-contraseña", "tu-base-de-datos");

    // Verificar la conexión
    if ($conexionn->connect_error) {
        die("La conexión a la base de datos falló: " . $conexionn->connect_error);
    }

    // Insertar datos en la tabla
    $query = "INSERT INTO registro_usuarios (nombre, apellido, correo_electronico, contrasena_hash) VALUES ('$nombre', '$apellido', '$correo', '$contrasena')";

    if ($conexionn->query($query) === TRUE) {
        echo "Registro exitoso";
    } else {
        echo "Error al registrar usuario: " . $conexionn->error;
    }

    // Cerrar la conexión
    $conexionn->close();
}
?>
