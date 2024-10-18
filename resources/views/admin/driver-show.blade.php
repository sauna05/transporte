<x-layout-admin title="Conductor">
    <section class="flex space-x-20 p-6 bg-gray-50 rounded-lg shadow-md">
        @if($driver->imagen)
            <img src="{{ asset('storage/' . $driver->imagen) }}" class="w-96 rounded-lg shadow-lg" alt="Conductor">     
        @else        
            <img src="{{ asset('images/customers/Donna-sorridente-830x625.webp') }}" class="w-96 rounded-lg shadow-lg" alt="Conductor">
        @endif
        <article class="space-y-5">
            <article class="space-y-5 self-center items-center">
                <h1 class="text-3xl font-bold text-gray-800 mb-5">{{ $driver->user->name }}</h1>

                <div class="flex space-x-5">
                    <h4 class="w-28 text-right font-bold text-gray-600">Licencia:</h4>
                    <p class="parrafo text-gray-700">{{ $driver->licence->name }}</p>
                </div>

                <div class="flex space-x-5">
                    <h4 class="w-28 text-right font-bold text-gray-600">Experiencia:</h4>
                    <p class="parrafo text-gray-700">{{ $driver->experience }} {{ $driver->experience === 1 ? 'año' : 'años' }}</p>
                </div>

                <div class="flex space-x-5">
                    <h4 class="w-28 text-right font-bold text-gray-600">Disponibilidad:</h4>
                    <p class="parrafo text-gray-700">{{ $driver->availability }}</p>
                </div>
            </article>
        </article>

        {{-- Rendimiento --}}
        <div class="space-y-5 items-center ">
            <h1 class="text-3xl font-bold text-gray-800 mb-5">Rendimiento</h1>

            <div class="flex space-x-5">
                <h4 class="w-28 text-right font-bold text-gray-600">Entregas totales:</h4>
                <p class="parrafo text-gray-700">7</p> 
            </div>

            <div class="flex space-x-5">
                <h4 class="w-28 text-right font-bold text-gray-600">Entregas a tiempo:</h4>
                <p class="parrafo text-gray-700">4</p> 
            </div>

            <div class="flex space-x-5 items-center ">
                <h4 class="w-28 text-right font-bold text-gray-600">Accidentes:</h4>
                <form action="" method="POST" class="flex items-center">
                    @csrf
                    @method('PUT')
                    <input type="number" min="0" name="accidents" id="accidents" class="w-24 mr-5 bg-slate-200 rounded-md pl-2 border border-gray-300 focus:outline-none focus:ring focus:ring-blue-500">
                    <button type="submit" class="btn h-10 bg-blue-500 hover:bg-blue-600 text-white rounded-md transition duration-200">Actualizar Accidentes</button>
                </form>
            </div>

            <div class="flex space-x-5 items-center">
                <h4 class="w-28 text-right font-bold text-gray-600">Puntuación:</h4>
                {{-- ESTRELLAS --}}
                <div class="flex">
                    @for ($i = 0; $i < 3; $i++)
                        <img src="{{ asset('images/icons/estrella.svg') }}" alt="Estrella" />
                    @endfor
                </div>
            </div>
        </div>
    </section>

    <section class="flex justify-between px-28 py-5 items-center space-x-28 bg-white rounded-lg shadow-md mt-6">
        <div class="flex flex-col space-y-1 justify-center items-center ">
            <p>Ver ruta Asignada</p>
            <a href="#" class="btn flex justify-center items-center bg-blue-500 hover:bg-blue-600 text-white rounded-md transition duration-200 p-2">
                <img src="{{ asset('images/icons/route.svg') }}" alt="">
            </a> 
        </div>

        <div class="flex justify-between items-center space-x-10 ">
            <!-- Formulario de eliminación -->
            <form action="{{ route('admin.destroy_driver', $driver->id) }}" onclick="return eliminarConfirm();" method="POST" class="flex flex-col space-y-1 justify-center items-center">
                @csrf
                @method("DELETE")
                <p>Eliminar Conductor</p>
                <button type="submit" class="btn flex justify-center items-center bg-red-500 hover:bg-red-600 text-white rounded-md transition duration=200 p-2">
                    <img src="{{ asset('images/icons/delete.svg') }}" alt="">
                </button>
            </form>

            <!-- Modificar Conductor -->
            <div class="flex flex-col space-y-1 justify-center items-center">
                <p>Modificar Conductor</p>
                <a href="{{ route('admin.driver_edit',$driver->id) }}" class="btn flex justify-center items-center bg-yellow-500 hover:bg-yellow-600 text-white rounded-md transition duration=200 p=2">
                    <img src="{{ asset('images/icons/modify.svg') }}" alt="">
                </a> 
            </div>
        </div>
    </section>        

    <!-- Script de confirmación -->
    <script>
        function eliminarConfirm() {
            return confirm('¿Está seguro que desea eliminar a este conductor?');
        }
    </script>

</x-layout-admin>