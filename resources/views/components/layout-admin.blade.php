<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title}}</title>
    @vite('resources/css/app.css')

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&display=swap" rel="stylesheet">
</head>
<body class="min-h-screen flex flex-col font-sans">

    <header class="flex flex-col ">
        <div class="py-2 px-4 flex justify-between items-center">
            <img src="{{ asset('images/icons/logo.svg') }}" alt="" class="h-20">
            <h3 class="text-2xl font-semibold">Administrator</h3>
            <form action="{{route('admin.logout')}}" method="POST" onclick="return confirmarEliminacion();" >
                @csrf
                <button type="submit" class="btn">Cerrar sesión</button>
                
            </form>
        </div>

        <nav class="flex text-center h-11 bg-azul-principal-0 justify-between items-center">
            <a href="{{ route('admin.routesForm') }}" class="text-fondo-0 parrafo font-medium w-full h-full flex items-center justify-center hover:bg-[#2B71B7] transition-all">Rutas</a>
            <a href="{{route('admin.drivers')}}" class="text-fondo-0 parrafo font-medium w-full h-full flex items-center justify-center hover:bg-[#2B71B7] transition-all">Conductores</a>
            <a href="{{ route('admin.vehicles') }}" class="text-fondo-0 parrafo font-medium w-full h-full flex items-center justify-center hover:bg-[#2B71B7] transition-all">Vehiculos</a>
            <a href="{{ route('admin.cliente_index') }}" class="text-fondo-0 parrafo font-medium w-full h-full flex items-center justify-center hover:bg-[#2B71B7] transition-all">Clientes</a>
            <a href="{{ route('admin.reports') }}" class="text-fondo-0 parrafo font-medium w-full h-full flex items-center justify-center hover:bg-[#2B71B7] transition-all">Reportes</a>
        </nav>
        {{-- <button class="flex items-center text-gray-700 focus:outline-none" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
            <img class="w-10 h-10 rounded-full border-2 border-indigo-600" src="{{ asset('storage/' . auth()->user()->imagen) }}" alt="Profile Picture">
            <span class="ml-2 text-lg font-medium">{{ auth()->user()->name}}</span>
            <svg class="w-5 h-5 ml-2 text-indigo-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
        </button> --}}
    </header>

    {{-- Contenido principal --}}
    <main class="flex-grow p-6 text-center">
        {{$slot}}
       
    </main>

    <footer class="h-11 bg-azul-principal-0 text-center p-2">
        <p class="text-fondo-0 font-medium">@TransportFast</p> 
    </footer>

    <script>
        function confirmarEliminacion(){
            return confirm('¿Está seguro que desea cerrar sesión?');
        }
    </script>

</body>
</html>
