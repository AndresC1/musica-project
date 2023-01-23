@extends('Template.form')

@section('contenido')
    <div class="w-full min-h-[20rem] h-[100vh] flex flex-col justify-center items-center">
        <h1 class="w-11/12 max-w-[30rem] rounded-lg min-h-[5rem] bg-[#333] text-white font-semibold flex justify-center items-center p-4 grid grid-cols-6">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-auto w-7 text-green-400 mr-2 text-red-600 col-span-1">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
            </svg>
            <b class="col-span-5">
                @if (isset($informacion))
                    $informacion
                @else
                    Error
                @endif
            </b>              
            </h1>
        <a href={{ route('inicio') }} class="my-5 border-2 hover:bg-red-700 hover:text-white border-red-700 text-red-700 p-3 rounded-lg font-semibold flex justify-center items-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-auto w-6 mr-1">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
            </svg>              
            Ir al inicio</a>
    </div>
@endsection