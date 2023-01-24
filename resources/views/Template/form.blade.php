<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href={{asset('storage/favicon.ico')}} type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src={{ asset('js/Tailwind_conf.js') }}></script>
    <link rel="stylesheet" href={{ asset('css/multiSelect.css') }}>
    <title>Musica - ACL</title>
</head>
<body class="bg-color_oscuro_1 text-color_blanco_1 flex flex-col justify-center items-center">
    @yield('contenido')
    <a href={{ route('inicio') }} class="my-5 border-2 hover:bg-red-700 hover:text-white border-red-700 text-red-700 p-3 rounded-lg font-semibold flex justify-center items-center">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-auto w-6 mr-1">
            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
        </svg>              
        Ir al inicio</a>
</body>
</html>