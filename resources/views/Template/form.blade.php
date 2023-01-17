<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src={{ asset('js/Tailwind_conf.js') }}></script>
    <title>Musica - ACL</title>
</head>
<body class="bg-color_oscuro_1 text-color_blanco_1 flex justify-center items-center">
    @yield('contenido')
</body>
</html>