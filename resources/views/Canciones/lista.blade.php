@extends('Template.main')

@section('contenido')
    <h1 class="w-full h-20 text-2xl flex justify-center items-center text-white font-bold mb-4">Canciones</h1>
    <div id="contenedor" class="w-full m-auto h-auto max-h-[70vh] flex flex-wrap lg:justify-start justify-center overflow-y-auto">
        @if (count($Canciones)!=0)
            @foreach ($Canciones as $cancion)
                <div class="lg:w-5/12 xl:max-w-[25em] max-w-[30em] w-full h-20 bg-[#222] hover:bg-[#333] m-2 rounded-lg flex flex-row justify-start items-center group transition-all bg-gradient-to-r hover:from-[#333] from-[#222] to-[#222] hover:to-[{{$cancion->color}}]">
                    <img class="w-14 h-14 m-3 rounded" src={{ asset('storage/img/Albumes/'.$cancion->imagen) }} alt={{$cancion->nombre}}>
                    <h2 class="text-gray-400 text-md font-medium group-hover:text-white transition-all ml-4">{{$cancion->nombre}}</h2>
                </div>
            @endforeach
        @else
            <h1 class="w-9/12 max-w-[30rem] font-semibold mt-10 m-auto rounded-lg flex justify-center items-center h-20 bg-[#222] text-[#eee]">Lista vacia</h1>
        @endif
    </div>
    <a href={{ route('CreateCancion') }} class="lg:w-auto lg:px-4 w-16 h-16 rounded-full fixed lg:bottom-10 bottom-5 right-5 lg:right-16 flex justify-center items-center hover:scale-110 bg-white">
        <h1 class="lg:block hidden">Agregar cancion</h1>
        <img src={{asset('storage/svg/add.svg')}} class="w-7 h-auto lg:ml-2" alt="">
    </a>
@endsection