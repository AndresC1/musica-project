@extends('Template.main')

@section('contenido')
    <h1 class="w-full h-20 text-2xl flex justify-center items-center text-white font-bold mb-4">Albumes</h1>
    <div id="contenedor" class="w-full m-auto h-auto max-h-[75vh] flex flex-row flex-wrap justify-center sm:justify-start overflow-y-auto">
        @foreach ($Albumes as $album)
            <a href="" class="sm:w-52 w-72 h-72 bg-[#222] hover:bg-[#333] m-2 text-gray-400 text-lg rounded-xl group hover:scale-105 transition-all">
                <img class="rounded-md transition-all w-40 h-40 mx-auto mt-10 mb-6 sm:m-6" src={{ asset('storage/img/Albumes/'.$album->imagen) }} alt="Album">
                <h3 class="w-full h-8 flex justify-center items-center font-medium group-hover:text-color_blanco_1 transition-all">{{$album->nombre}}</h3>
            </a>
        @endforeach
    </div>
    <button class="lg:w-auto lg:px-4 w-16 h-16 rounded-full fixed lg:bottom-14 bottom-5 right-5 lg:right-16 flex justify-center items-center hover:scale-110 bg-white">
        <h1 class="lg:block hidden">Agregar album</h1>
        <img src={{asset('storage/svg/add.svg')}} class="w-7 h-auto lg:ml-2" alt="">
    </button>
@endsection