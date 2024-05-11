<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation Email</title>
</head>
<body>
    <h1>Confirmación de Correo Electrónico</h1>
    <p>Gracias por registrarte en nuestro sitio. Por favor, haz clic en el siguiente enlace para confirmar tu dirección de correo electrónico:</p>
    <p><a href="{{ $confirmationLink }}">Confirmar Correo Electrónico</a></p>
    <p>Si no has solicitado este correo electrónico, puedes ignorarlo.</p>
    <p>Gracias,</p>
    <p>Tu equipo de [Nombre del Sitio]</p>
</body>
</html>
