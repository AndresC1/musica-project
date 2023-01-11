@extends('Template.main')

@section('contenido')
    <h1 class="w-full h-20 text-2xl flex justify-center items-center text-white font-bold mb-4">Albumes</h1>
    <div id="contenedor" class="w-11/12 m-auto h-auto max-h-[75vh] flex flex-row flex-wrap justify-start overflow-y-auto">
        @foreach ($Albumes as $album)
            <a href="" class="w-52 h-72 bg-[#222] m-2 text-gray-400 text-lg rounded-xl group hover:scale-105 transition-all">
                <img class="opacity-40 rounded-t-xl group-hover:opacity-100 transition-all w-full h-52" src={{ asset('storage/img/Albumes/'.$album->imagen) }} alt="Album">
                <h3 class="w-full h-14 flex justify-center items-center font-medium group-hover:text-color_blanco_1 transition-all group-hover:font-bold">{{$album->nombre}}</h3>
            </a>
        @endforeach
    </div>
@endsection