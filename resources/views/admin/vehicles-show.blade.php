<x-layout-admin title="Vehículo">
    {{-- Cada article es un registro --}}
    <section class="flex space-x-20 p-6 bg-gray-50 rounded-lg shadow-md">
        
        <img src="{{ asset('images/trucks/camion1.png') }}" class="w-96 rounded-lg shadow-lg" alt="">

        <article class="space-y-5">
            <h1 class="text-3xl font-bold text-gray-800 mb-5">{{ $vehicle->type }}</h1>

            <div class="flex space-x-5">
                <h4 class="w-28 text-right font-bold text-gray-600">Capacidad:</h4>
                <p class="parrafo text-gray-700">{{ $vehicle->capacity }}</p>
            </div>

            <div class="flex space-x-5">
                <h4 class="w-28 text-right font-bold text-gray-600">Estado:</h4>
                <p class="parrafo text-gray-700">{{ $vehicle->status }}</p>
            </div>  

            <div class="flex space-x-5">
                <h4 class="w-28 text-right font-bold text-gray-600">Mantenimiento:</h4>
                
                <form action="#" class="space-y-5">
                    <section class="flex space-x-10">
                        <div class="flex items-center space-x-2">
                            <input type="radio" name="si-no" id="yes" class="scale-150">
                            <label for="yes" class="text-gray-700">Sí</label>
                        </div>
                        <div class="flex items-center space-x-2">
                            <input type="radio" name="si-no" id="no" class="scale-150">
                            <label for="no" class="text-gray-700">No</label>
                        </div>
                    </section>

                    <section class="flex flex-col justify-start items-end space-y-5">
                        <div class="flex space-x-10 items-center">
                            <h4 class="text-right font-bold text-gray-600">Desde:</h4>
                            <input type="date" name="" id="" class="border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring focus:ring-blue-500">
                        </div>

                        <div class="flex space-x-10 items-center">
                            <h4 class="text-right font-bold text-gray-600">Hasta:</h4>
                            <input type="date" name="" id="" class="border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring focus:ring-blue-500">
                        </div>

                        
                        <button class="btn self-start">
                            Iniciar Mantenimiento
                        </button>
                    </section>
                </form>
            </div>  
        </article>

        {{-- En caso de que el camión se encuentre en ruta --}}
        <div class="flex flex-col items-center ">
            <h1 class="text-3xl font-bold text-gray-800 mb-5">Ruta Actual</h1>
            <a href="#" class="btn flex justify-center items-center bg-blue-500 hover:bg-blue-600 text-white rounded-md transition duration=200 px=4 py=2">Ver Ruta Asignada</a>
        </div>
    </section>
</x-layout-admin>


