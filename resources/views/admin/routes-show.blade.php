<x-layout-admin title="Ruta">

    <h1 class="text-2xl font-bold mb-5">Nombre Cliente - Route</h1>

    <section class="flex justify-between">
        <article class="w-1/2 space-y-3 rounded-md p-2">
            <div class="flex">
                <h4 class="w-16 text-right pr-4 font-bold">Cliente:</h4>
                <p class="parrafo">{{ $customer->user->name }}</p>
            </div>

            <div class="flex">
                <h4 class="w-16 text-right pr-4 font-bold">Estado:</h4>
                <p class="parrafo">{{ $order->route->status }}</p>
            </div>

            <div class="flex">
                <h4 class="w-16 text-right pr-4 font-bold">Carga:</h4>
                <p class="parrafo">{{ $order->charge }}</p>
            </div>
        </article>

        <article class="space-y-3 rounded-md p-2">
            <div class="flex space-x-5">
                <h4 class="w-16 text-right pr-4 font-bold">Origen:</h4>
                <p class="parrafo">{{ $order->route->origin }}</p>
            </div>

            <div class="flex space-x-5">
                <h4 class="w-16 text-right pr-4 font-bold">Destino:</h4>
                <p class="parrafo">{{ $order->route->destination }}</p>
            </div>

            <div class="flex space-x-5">
                <h4 class="w-16 text-right pr-4 font-bold">Distancia:</h4>
                <p class="parrafo">{{ $order->route->distance }} km</p>
            </div>
        </article>
    </section>

    <h1 class="text-2xl font-bold my-5">Iniciar Ruta</h1>

    <section>
        @if($order->route->status !== 'en curso')
            <form action="{{ route('admin.iniciar_ruta') }}" method="POST" class="space-y-10">
                @csrf
                <input type="hidden" name="route_id" value="{{ $order->route->id }}">
                <div class="flex space-x-20">

                    <div class="flex flex-col w-1/3">
                        <label for="camion" class="parrafo">Camión</label>
                        <select name="vehicle_id" id="vehicle_id" class="bg-gray-400 h-10 parrafo rounded-md px-5 outline-none">
                            @foreach ($vehicles as $vehicle)
                                <option value="{{ $vehicle->id }}">{{ $vehicle->type }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex flex-col w-1/3">
                        <label for="name" class="parrafo">Conductor</label>
                        <select name="driver_id" id="driver_id" class="bg-gray-400 h-10 parrafo rounded-md px-5 outline-none">
                            @foreach ($drivers as $driver)
                                <option value="{{ $driver->id }}">{{ $driver->user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <button class="btn">
                    Iniciar ruta
                </button>
            </form>
        @else
            <p class="parrafo text-green-500">La ruta ya está en curso.</p>
        @endif
    </section>

</x-layout-admin>
