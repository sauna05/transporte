<x-layout-admin title="Vehiculos">
    <section class="space-y-8 my-5 relative">
        <div class="fixed right-36 top-40 font-bold text-2xl flex flex-col justify-center items-center space-y-5">
            <h2 class="mb-14">Vehiculos</h2>
            <img src="{{ asset('images/icons/anadir-camion.png') }}" alt="">
            <a href="{{ route('admin.create-vehicles') }}" class="btn flex justify-center items-center">Añadir Vehiculo</a>
        </div>

        {{-- Listado de Vehículos --}}
        @if ($vehicles->isEmpty())
            <div class="text-center text-lg font-semibold text-gray-700">
                No hay vehículos registrados.
            </div>
        @else
            @foreach ($vehicles as $vehicle)
                <a class="flex w-2/4 border-b-2 border-gray-500 hover:bg-gray-300/50 rounded-md p-2 space-x-5" href="{{route('admin.vehicle_show',$vehicle->id)}}">
                    <div class="flex justify-center items-center">
                        @if($vehicle->imagen) 
                            <img src="{{ asset('storage/' . $vehicle->imagen) }}" class="w-36" alt="{{ $vehicle->type }}">
                        @else
                             
                            <img src="{{ asset('images/camion-por-defecto.png') }}" class="w-36" alt="Conductor por defecto">
                        @endif
                      
                    </div>

                    <article class="space-y-5 self-center">
                        <div class="flex space-x-5">
                            <h4 class="w-20 text-right font-bold">Tipo:</h4>
                            <p class="parrafo">{{ $vehicle->type }}</p>
                        </div>

                        <div class="flex space-x-5">
                            <h4 class="w-20 text-right font-bold">Capacidad:</h4>
                            <p class="parrafo">{{ $vehicle->capacity }} kg</p>
                        </div>

                        <div class="flex space-x-5">
                            <h4 class="w-20 text-right font-bold">Estado:</h4>
                            <p class="parrafo">{{ $vehicle->status }}</p>
                        </div>  
                    </article>
                </a>
            @endforeach
        @endif

    </section>
</x-layout-admin>