@extends('Template.form')

@section('contenido')
    <form action={{ route('NuevoArtista') }} enctype="multipart/form-data" method="post" class="border-[1px] p-10 border-[#333] w-full max-w-[60em] flex flex-col flex-wrap justify-center items-center my-10 rounded-xl mx-3">@csrf
        <div class="max-w-[30em] w-full md:min-w-[23em]">
            <h1 class="w-full text-center font-semibold">Nombre del artista</h1>
            <input type="text" name="nombre" placeholder="Nombre del artista" class="w-full h-12 px-3 rounded-lg bg-color_oscuro_1 text-color_blanco_1 border-[#333] border-2 my-2" required>
        </div>
        <div class="md:min-w-[23em] max-w-[30em] w-full">
            <h1 class="w-full text-center font-semibold">Imagen del artista</h1>
            <input type="file" name="imagen" placeholder="Nombre imagen" accept=".jpg" class="w-full h-12 px-3 py-2 rounded-lg bg-color_oscuro_1 text-color_blanco_1 border-[#333] border-2 my-2" required>
        </div>
        <button type="submit" class="max-w-[30em] w-full md:min-w-[23em] h-12 mt-6 font-bold hover:scale-105 rounded-lg bg-[#555] text-white">Agregar</button>
    </form>
@endsection