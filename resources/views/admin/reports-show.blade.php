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
                  
            @foreach ($vehicles_to as $vehicle)
                @php
                    $contador++; 
                @endphp
            @endforeach

            <div class="flex justify-between mb-2">
                <h4 class="font-bold">Total Vehiculos:</h4>
                <p class="text-gray-700 font-bold">{{ $contador }}</p>
            </div>
    
            <div class="flex justify-between mb-2">
              @php
                  $vh_oc=0;
              @endphp

              @foreach ($vehicles_ocu as $veh_oc)
                @php
                    $vh_oc++;
                @endphp
                  
              @endforeach
                <h4 class="font-bold">Vehiculos ocupados:</h4>
                <p class="text-gray-700">{{$vh_oc}}</p>
            </div>


            @php
                $vehicle_dis = 0;
            @endphp
            @foreach ($vehicles as  $vehi)
             @php
                $vehicle_dis++;
             @endphp
                
            @endforeach
            <div class="flex justify-between mb-2">
                <h4 class="font-bold">Vehiculos disponibles:</h4>
                <p class="text-gray-700">{{$vehicle_dis}}</p>
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
                @php
                    $disponible=0;
                @endphp
                @foreach ($drivers as $driv )
                    @php
                        $disponible++;
                    @endphp
                    
                @endforeach
                <p class="text-gray-700">{{$disponible}}</p>
            </div>

            <div class="flex justify-between mb-2">
                @php
                    $driver_oc=0;
                @endphp
                @foreach ($drivers_ocu as $driver_o )
                    @php
                        $driver_oc ++;
                    @endphp
                @endforeach
                <h4 class="font-bold">Conductores ocupados:</h4>
                <p class="text-gray-700">{{$driver_oc}}</p>
            </div>

        </article>

        <article class="bg-white shadow-md rounded-lg p-5">

            @php
                $clientes=0;  
            @endphp
            @foreach ($customer as $custo)
                 @php
                     $clientes ++;
                 @endphp
            @endforeach
            <h2 class="text-2xl font-bold text-blue-600 mb-4">Clientes</h2>

            <div class="flex justify-between mb-2">
                <h4 class="font-bold">Total clientes:</h4>
                <p class="text-gray-700">{{$clientes}}</p>
            </div>    
        </article>

    </section>

</x-layout-admin>