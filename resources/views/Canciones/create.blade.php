@extends('Template.form')

@section('contenido')
    <form action={{ route('NuevaCancion') }} enctype="multipart/form-data" method="post" class="border-[1px] p-10 border-[#333] w-full max-w-[60em] flex flex-col flex-wrap justify-center items-center my-10 rounded-xl mx-3">@csrf
        <div class="max-w-[30em] w-full md:min-w-[23em]">
            <h1 class="w-full text-center font-semibold">Nombre</h1>
            <input type="text" name="nombre" placeholder="Nombre de la cancion" class="w-full h-12 px-3 rounded-lg bg-color_oscuro_1 text-color_blanco_1 border-[#333] border-2 my-2" required>
        </div>
        <div class="md:min-w-[23em] max-w-[30em] w-full">
            <h1 class="w-full text-center font-semibold">Archivo</h1>
            <input type="file" name="archCancion" accept=".mp3" class="w-full h-12 px-3 py-2 rounded-lg bg-color_oscuro_1 text-color_blanco_1 border-[#333] border-2 my-2" required>
        </div>
        <div class="md:min-w-[23em] max-w-[30em] w-full">
            <h1 class="w-full text-center font-semibold">Color</h1>
            <input type="color" name="color" class="w-full h-12 px-3 py-2 rounded-lg bg-color_oscuro_1 text-color_blanco_1 border-[#333] border-2 my-2" required>
        </div>
        <div class="max-w-[30em] w-full md:min-w-[23em]">
            <h1 class="w-full text-center font-semibold">A&ntilde;o de lanzamiento</h1>
            <input type="number" name="anio" min=1900 max={{date('Y');}} value={{date('Y');}} class="w-full h-12 px-3 rounded-lg bg-color_oscuro_1 text-color_blanco_1 border-[#333] border-2 my-2" required>
        </div>
        <div class="max-w-[30em] w-full md:min-w-[23em]">
            <h1 class="w-full text-center font-semibold">Genero</h1>
            <select name="IdGenero" class="w-full h-12 px-3 py-2 rounded-lg bg-color_oscuro_1 text-color_blanco_1 border-[#333] border-2 my-2" required>
                <option selected>Selecciona un genero</option>
                @foreach ($Generos as $genero)
                    <option value={{$genero->id}}>{{$genero->nombre}}</option>
                @endforeach
            </select>
        </div>
        <div class="max-w-[30em] w-full md:min-w-[23em]">
            <h1 class="w-full text-center font-semibold">Album</h1>
            <select name="IdAlbum" class="w-full h-12 px-3 py-2 rounded-lg bg-color_oscuro_1 text-color_blanco_1 border-[#333] border-2 my-2" required>
                <option selected>Selecciona el album</option>
                @foreach ($Albumes as $album)
                    <option value={{$album->id}}>{{$album->nombre}}</option>
                @endforeach
            </select>
        </div>
        <div class="max-w-[30em] w-full md:min-w-[23em] flex flex-col justify-center">
            <h1 class="w-full text-center font-semibold">Artistas</h1>
            <div class="flex justify-between items-center">
                <select name="Artistas[]" class="w-full h-40 px-3 py-2 rounded-lg bg-color_oscuro_1 text-[#333] border-[#333] border-2 my-2" id="Artistas" multiple required>
                    @foreach ($Artistas as $artista)
                        <option value={{$artista->id}}>{{$artista->nombre}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        
        <button type="submit" class="max-w-[30em] w-full md:min-w-[23em] h-12 mt-6 font-bold hover:scale-105 rounded-lg bg-[#555] text-white">Agregar cancion</button>
    </form>
    <script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/js/multi-select-tag.js"></script>
    <script>
        new MultiSelectTag('Artistas')
    </script>
@endsection
