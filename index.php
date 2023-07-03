<!DOCTYPE html>
<html>
<head>
    <title>Crear usuario en Moodle</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 20px;
        }

        h1 {
            color: #333;
            text-align: center;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="password"],
        input[type="email"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-bottom: 20px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
<body>
    <h1>Crear usuario en Moodle</h1>
    <form action="./moodle_create_user.php" method="post">
        <label for="username">Nombre de usuario:</label>
        <input type="text" id="username" name="username" required><br>

        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required><br>

        <label for="firstname">Nombre:</label>
        <input type="text" id="firstname" name="firstname" required><br>

        <label for="lastname">Apellido:</label>
        <input type="text" id="lastname" name="lastname" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="city">Ciudad:</label>
        <input type="text" id="city" name="city" required><br>

        <label for="country">País:</label>
        <input type="text" id="country" name="country" required><br>

        <input type="submit" value="Crear usuario">
    </form>
</body>
</html>
