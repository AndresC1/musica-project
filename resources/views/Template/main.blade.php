<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src={{ asset('js/Tailwind_conf.js') }}></script>
    <link rel="stylesheet" href={{ asset('css/style.css')}}>
    <title>Musica - ACL</title>
</head>
<body class="bg-color_oscuro_1 transition-all flex justify-start item-stretch">
    <nav class="bg-black w-2/12 lg:block hidden max-w-[18em] min-h-screen pt-4 h-auto text-color_blanco_2 border-r-[1px] border-none">
        <ul class="flex flex-col justify-center items-center mt-10">
            <a href={{ route('ListCanciones') }} class="w-full h-14 flex justify-center items-center hover:font-semibold transition-all hover:text-white">Canciones</a>
            <a href={{ route('ListAlbumes') }} class="w-full h-14 flex justify-center items-center hover:font-semibold transition-all hover:text-white">Albumes</a>
            <a href={{ route('ListArtistas') }} class="w-full h-14 flex justify-center items-center hover:font-semibold transition-all hover:text-white">Artistas</a>
            <a href={{ route('ListGeneros') }} class="w-full h-14 flex justify-center items-center hover:font-semibold transition-all hover:text-white">Generos</a>
        </ul>
    </nav>
    <div class="lg:w-10/12 w-full p-10 min-h-screen">
        @yield('contenido')
    </div>
    <script src={{ asset('js/app.js') }}></script>
</body>
</html>