<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

// URL del servidor Moodle
$url = 'http://localhost/moodle401home/webservice/rest/server.php';

// Token de acceso
$token = '9a200a16420d1e5343aa68adc3548404';

// Función del webservice
$function = 'core_user_create_users';

// Formato de respuesta
$format = 'json';

// Obtener los datos del formulario
$username = $_POST['username'];
$password = $_POST['password'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$city = $_POST['city'];
$country = $_POST['country'];

// Datos del usuario
$data = array(
    'users[0][username]' => $username,
    'users[0][auth]' => 'manual',
    'users[0][password]' => $password,
    'users[0][firstname]' => $firstname,
    'users[0][lastname]' => $lastname,
    'users[0][email]' => $email,
    'users[0][maildisplay]' => '1',
    'users[0][city]' => $city,
    'users[0][country]' => $country,
    'users[0][lang]' => 'es'
);

// Construir la URL completa con los parámetros
$params = array(
    'wstoken' => $token,
    'wsfunction' => $function,
    'moodlewsrestformat' => $format
);

$url .= '?' . http_build_query($params);

// Configurar las opciones de la petición
$options = array(
    'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => http_build_query($data),
    ),
);

// Realizar la petición
$response = file_get_contents($url, false, stream_context_create($options));

// Manejar la respuesta
if ($response === false) {
    // Error en la petición
    echo "Error al enviar la petición a Moodle";
} else {
    // Decodificar la respuesta
    $result = json_decode($response, true);

    // Manejar el resultado
    if ($result === null) {
        // Error al decodificar la respuesta
        echo "Error al decodificar la respuesta de Moodle";
    } else {
        // Verificar si ocurrió un error en Moodle
        if (isset($result['exception'])) {
            // Error en Moodle
            echo "Error en Moodle: " . $result['message'];
        } else {
            // Éxito
            echo "Usuario creado exitosamente en Moodle";
        }
    }
}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>