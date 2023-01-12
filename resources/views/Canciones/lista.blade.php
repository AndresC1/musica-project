@extends('Template.main')

@section('contenido')
    <h1 class="w-full h-20 text-2xl flex justify-center items-center text-white font-bold mb-4">Canciones</h1>
    <div id="contenedor" class="w-full m-auto h-auto max-h-[75vh] flex flex-wrap lg:justify-start justify-center overflow-y-auto">
        @foreach ($Canciones as $cancion)
            <a href="" class="lg:w-5/12 xl:max-w-[25em] max-w-[30em] w-full h-20 bg-[#222] hover:bg-[#333] m-2 rounded-lg flex flex-row justify-start items-center group transition-all bg-gradient-to-r hover:from-[#333] from-[#222] to-[#222] hover:to-[{{$cancion->color}}]">
                <img class="w-14 h-14 m-3 rounded" src={{ asset('storage/img/Albumes/'.$cancion->album->imagen) }} alt={{$cancion->nombre}}>
                <h2 class="text-gray-400 text-md font-medium group-hover:text-white transition-all ml-4">{{$cancion->nombre}}</h2>
            </a>
        @endforeach
    </div>
@endsection