<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href={{asset('storage/favicon.ico')}} type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src={{ asset('js/Tailwind_conf.js') }}></script>
    <link rel="stylesheet" href={{ asset('css/style.css')}}>
    <title>Musica - ACL</title>
</head>
<body class="bg-color_oscuro_1 transition-all flex flex-col lg:flex-row justify-start item-stretch">
    <nav class="bg-black w-2/12 lg:block hidden max-w-[18em] min-h-screen pt-4 h-auto text-color_blanco_2 border-r-[1px] border-none">
        <ul class="flex flex-col justify-center items-center mt-10">
            <a href={{ route('ListCanciones') }} class="w-full h-14 flex justify-center items-center hover:font-semibold transition-all hover:text-white">Canciones</a>
            <a href={{ route('ListAlbumes') }} class="w-full h-14 flex justify-center items-center hover:font-semibold transition-all hover:text-white">Albumes</a>
            <a href={{ route('ListArtistas') }} class="w-full h-14 flex justify-center items-center hover:font-semibold transition-all hover:text-white">Artistas</a>
            <a href={{ route('ListGeneros') }} class="w-full h-14 flex justify-center items-center hover:font-semibold transition-all hover:text-white">Generos</a>
        </ul>
    </nav>
    <div class="lg:hidden w-full h-auto flex flex-col justify-center items-center">
        <div class="w-full h-16 bg-[#222] flex justify-end items-center">
            <button id="btnNavbar" class="w-12 h-12 bg-[#333] mx-4 rounded flex flex-col space-y-1 justify-center items-center">
                <div class="w-8/12 h-1 bg-[#eee]"></div>
                <div class="w-8/12 h-1 bg-[#eee]"></div>
                <div class="w-8/12 h-1 bg-[#eee]"></div>
            </button>
        </div>
        <div class="bg-[#333] w-full h-auto text-[#eee] hidden" id="listRoute">
            <ul class="flex flex-col justify-center items-center w-full font-semibold">
                <a href={{ route('ListCanciones') }} class="w-full h-16 flex justify-center items-center">Canciones</a>
                <a href={{ route('ListAlbumes') }} class="w-full h-16 flex justify-center items-center">Albumes</a>
                <a href={{ route('ListArtistas') }} class="w-full h-16 flex justify-center items-center">Artistas</a>
                <a href={{ route('ListGeneros') }} class="w-full h-16 flex justify-center items-center">Generos</a>
            </ul>
        </div>
    </div>
    <div class="lg:w-10/12 w-full p-10 min-h-screen">
        @yield('contenido')
    </div>
    <script src={{ asset('js/app.js') }}></script>
</body>
</html>