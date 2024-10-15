<x-layout-admin title="Reportes">

    <h1 class="text-2xl font-bold mb-5 text-center">Reportes</h1>

    <section>

        <article class="w-80 space-y-3 rounded-md p-2 ">

            <h2 class="text-2xl font-bold">PEDIDOS</h2>

            <div class="flex">
                <h4 class="w-52 text-right pr-4 font-bold">Total pedidos:</h4>
                <p class="parrafo text-left">39</p>
            </div>
    
            <div class="flex">
                <h4 class="w-52 text-right pr-4 font-bold">Pedidos entregados:</h4>
                <p class="parrafo text-left">20</p>
            </div>

            <div class="flex">
                <h4 class="w-52 text-right pr-4 font-bold">Pedidos en proceso:</h4>
                <p class="parrafo text-left">20</p>
            </div>

            <div class="flex">
                <h4 class="w-52 text-right pr-4 font-bold">Pedidos pendientes:</h4>
                <p class="parrafo text-left">5</p>
            </div>
        </article>

        <article class="w-80 space-y-3 rounded-md p-2 ">

            <h2 class="text-2xl font-bold">VEHICULOS</h2>
            @php
                $contador=0;
          
            @endphp
                  
            @foreach ($vehicles as $vehicle)
                @php
                    $contador++; 
                @endphp
            @endforeach

            

            <div class="flex">
                <h4 class="w-52 text-right pr-4 font-bold">Total Vehiculos:</h4>
                <p class="parrafo text-left font-bold ">{{ $contador }}</p>
            </div>
    
            <div class="flex">
                <h4 class="w-52 text-right pr-4 font-bold">Vehiculos ocupados:</h4>
                <p class="parrafo text-left">20</p>
            </div>

            <div class="flex">
                <h4 class="w-52 text-right pr-4 font-bold">Vehiculos disponibles:</h4>
                <p class="parrafo text-left">20</p>
            </div>

            <div class="flex">
                <h4 class="w-52 text-right pr-4 font-bold">Vehiculos ocupados:</h4>
                <p class="parrafo text-left">5</p>
            </div>
        </article>
    
        <article class="w-80 space-y-3 rounded-md p-2 ">
            @php
            $driver_cont=0;
            @endphp
            @foreach ($driver as $dri )
                    @php
                      $driver_cont++; 
                     @endphp
            @endforeach

            <h2 class="text-2xl font-bold">CONDUCTORES</h2>

            <div class="flex">
                <h4 class="w-52 text-right pr-4 font-bold">Total conductores:</h4>
                <p class="parrafo text-left">{{ $driver_cont }}</p>
            </div>
    
            <div class="flex">
                <h4 class="w-52 text-right pr-4 font-bold">Conductores disponibles:</h4>
                <p class="parrafo text-left">20</p>
            </div>

            <div class="flex">
                <h4 class="w-52 text-right pr-4 font-bold">Conductores ocupados:</h4>
                <p class="parrafo text-left">20</p>
            </div>

        </article>

        <article class="w-80 space-y-3 rounded-md p-2 ">

            <h2 class="text-2xl font-bold">CLIENTES</h2>

            <div class="flex">
                <h4 class="w-52 text-right pr-4 font-bold">Total clientes:</h4>
                <p class="parrafo text-left">39</p>
            </div>
    
        </article>


    </section>
   


</x-layout-admin>