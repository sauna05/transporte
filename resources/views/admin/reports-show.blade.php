<x-layout-admin title="Reportes">
    <h1 class="text-3xl font-bold mb-8 text-center text-gray-800">Reportes</h1>
    
    <h2 class="text-xl font-semibold mb-4 text-center text-gray-700">
        Dinero generado: <span class="text-green-600">${{ number_format($price_count, 2) }}</span>
        
    </h2>

    <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 p-6">

        <!-- Artículo de Pedidos -->
        <article class="bg-white shadow-lg rounded-lg p-5 transition-transform transform hover:scale-105 duration-300">
            <h2 class="text-2xl font-bold text-blue-600 mb-4">Pedidos</h2>

            <div class="flex justify-between mb-2">
                <h4 class="font-bold">Total pedidos:</h4>
                <p class="text-gray-700">{{ $orders->count() }}</p>
            </div>

            <div class="flex justify-between mb-2">
                <h4 class="font-bold">Pedidos entregados:</h4>
                <p class="text-gray-700">20</p>
            </div>

            <div class="flex justify-between mb-2">
                <h4 class="font-bold">Pedidos en curso:</h4>
                <p class="text-gray-700">{{ $order_pro->count() }}</p>
            </div>

            <div class="flex justify-between mb-2">
                <h4 class="font-bold">Pedidos pendientes:</h4>
                <p class="text-gray-700">{{ $order_pend->count() }}</p>
            </div>
        </article>

        <!-- Artículo de Vehículos -->
        <article class="bg-white shadow-lg rounded-lg p-5 transition-transform transform hover:scale-105 duration-300">
            <h2 class="text-2xl font-bold text-blue-600 mb-4">Vehículos</h2>

            <div class="flex justify-between mb-2">
                <h4 class="font-bold">Total Vehículos:</h4>
                <p class="text-gray-700 font-bold">{{ $vehicles_to->count() }}</p>
            </div>

            <div class="flex justify-between mb-2">
                <h4 class="font-bold">Vehículos ocupados:</h4>
                <p class="text-gray-700">{{ $vehicles_ocu->count() }}</p>
            </div>

            <div class="flex justify-between mb-2">
                <h4 class="font-bold">Vehículos disponibles:</h4>
                <p class="text-gray-700">{{ $vehicles->count() }}</p>
            </div>

            <div class="flex justify-between mb-2">
                <h4 class="font-bold">Vehículos en mantenimiento:</h4>
                <p class="text-gray-700">5</p> <!-- Cambiado para mayor claridad -->
            </div>
        </article>

        <!-- Artículo de Conductores -->
        <article class="bg-white shadow-lg rounded-lg p-5 transition-transform transform hover:scale-105 duration-300">
            <h2 class="text-2xl font-bold text-blue-600 mb-4">Conductores</h2>

            <div class="flex justify-between mb-2">
                <h4 class="font-bold">Total conductores:</h4>
                <p class="text-gray-700">{{ $driver->count() }}</p>
            </div>

            <div class="flex justify-between mb-2">
                <h4 class="font-bold">Conductores disponibles:</h4>
                <p class="text-gray-700">{{ $drivers->count() }}</p>
            </div>

            <div class="flex justify-between mb-2">
                <h4 class="font-bold">Conductores ocupados:</h4>
                <p class="text-gray-700">{{ $drivers_ocu->count() }}</p>
            </div>
        </article>

        <!-- Artículo de Clientes -->
        <article class="bg-white shadow-lg rounded-lg p-5 transition-transform transform hover:scale-105 duration=300">
            <h2 class="text-2xl font-bold text-blue-600 mb-4">Clientes</h2>

            <div class="flex justify-between mb-2">
                <h4 class="font-bold">Total clientes:</h4>
                <p class="text-gray-700">{{ $customer->count() }}</p>
            </div>    
        </article>

    </section>
</x-layout-admin>