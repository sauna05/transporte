<x-layout-admin title="Reportes">

    <h1 class="text-3xl font-bold mb-8 text-center text-gray-800">Reportes</h1>

    <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

        <article class="bg-white shadow-md rounded-lg p-5">

            <h2 class="text-2xl font-bold text-blue-600 mb-4">Pedidos</h2>

            <div class="flex justify-between mb-2">
                <h4 class="font-bold">Total pedidos:</h4>
                <p class="text-gray-700">39</p>
            </div>
    
            <div class="flex justify-between mb-2">
                <h4 class="font-bold">Pedidos entregados:</h4>
                <p class="text-gray-700">20</p>
            </div>

            <div class="flex justify-between mb-2">
                <h4 class="font-bold">Pedidos en proceso:</h4>
                <p class="text-gray-700">20</p>
            </div>

            <div class="flex justify-between mb-2">
                <h4 class="font-bold">Pedidos pendientes:</h4>
                <p class="text-gray-700">5</p>
            </div>
        </article>

        <article class="bg-white shadow-md rounded-lg p-5">

            <h2 class="text-2xl font-bold text-blue-600 mb-4">Vehiculos</h2>
            @php
                $contador=0;
            @endphp
                  
            @foreach ($vehicles as $vehicle)
                @php
                    $contador++; 
                @endphp
            @endforeach

            <div class="flex justify-between mb-2">
                <h4 class="font-bold">Total Vehiculos:</h4>
                <p class="text-gray-700 font-bold">{{ $contador }}</p>
            </div>
    
            <div class="flex justify-between mb-2">
                <h4 class="font-bold">Vehiculos ocupados:</h4>
                <p class="text-gray-700">20</p>
            </div>

            <div class="flex justify-between mb-2">
                <h4 class="font-bold">Vehiculos disponibles:</h4>
                <p class="text-gray-700">20</p>
            </div>

            <div class="flex justify-between mb-2">
                <h4 class="font-bold">Vehiculos en mantenimiento:</h4>
                <p class="text-gray-700">5</p> <!-- Changed label for clarity -->
            </div>
        </article>

        <article class="bg-white shadow-md rounded-lg p-5">

            @php
                $driver_cont=0;
            @endphp
            @foreach ($driver as $dri )
                    @php
                      $driver_cont++; 
                     @endphp
            @endforeach

            <h2 class="text-2xl font-bold text-blue-600 mb-4">Conductores</h2>

            <div class="flex justify-between mb-2">
                <h4 class="font-bold">Total conductores:</h4>
                <p class="text-gray-700">{{ $driver_cont }}</p>
            </div>
    
            <div class="flex justify-between mb-2">
                <h4 class="font-bold">Conductores disponibles:</h4>
                <p class="text-gray-700">20</p>
            </div>

            <div class="flex justify-between mb-2">
                <h4 class="font-bold">Conductores ocupados:</h4>
                <p class="text-gray-700">20</p>
            </div>

        </article>

        <article class="bg-white shadow-md rounded-lg p-5">

            <h2 class="text-2xl font-bold text-blue-600 mb-4">Clientes</h2>

            <div class="flex justify-between mb-2">
                <h4 class="font-bold">Total clientes:</h4>
                <p class="text-gray-700">39</p>
            </div>    
        </article>

    </section>

</x-layout-admin>