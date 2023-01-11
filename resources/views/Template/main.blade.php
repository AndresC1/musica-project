<!DOCTYPE html>
<html lang="es" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src={{ asset('js/Tailwind_conf.js') }}></script>
    <link rel="stylesheet" href={{ asset('css/style.css')}}>
    <title>Musica - ACL</title>
</head>
<body class="bg-white dark:bg-color_oscuro_1 dark:text-color-blanco_1 transition-all flex justify-start item-stretch">
    <nav class="dark:bg-black bg-white w-2/12 min-h-screen pt-4 h-auto dark:text-color_blanco_2 border-r-[1px] dark:border-none">
        <div class="flex justify-center items-center mb-4">
            <img class="w-4 h-auto" src={{ asset('storage/svg/Oscuro.svg') }} alt="Modo Oscuro">
            <button id="btnMode" class="bg-white w-14 h-auto rounded-full border-[1px] mx-3 bg-white border-gray-500 dark:border-none dark:bg-[#30343F] flex transition-all justify-end">
                <div class="dark:bg-color_oscuro_1 bg-green-600 rounded-full w-5 h-5 m-1 transition-all"></div>
            </button>
            <img class="w-5 h-auto" src={{ asset('storage/svg/Claro.svg') }} alt="Modo Claro">
        </div>
        <ul class="flex flex-col justify-center items-center mt-10">
            <a href="http://" class="w-full h-14 flex justify-center items-center hover:font-semibold transition-all dark:hover:text-white">Canciones</a>
            <a href="http://" class="w-full h-14 flex justify-center items-center hover:font-semibold transition-all dark:hover:text-white">Albumes</a>
            <a href="http://" class="w-full h-14 flex justify-center items-center hover:font-semibold transition-all dark:hover:text-white">Artistas</a>
            <a href={{ route('ListGeneros') }} class="w-full h-14 flex justify-center items-center hover:font-semibold transition-all dark:hover:text-white">Generos</a>
        </ul>
    </nav>
    <div class="w-10/12 p-10 min-h-screen">
        @yield('contenido')
    </div>
    <script src={{ asset('js/app.js') }}></script>
</body>
</html>