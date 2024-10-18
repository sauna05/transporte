<x-layout-admin title="Cliente">
    {{-- Cada article es un registro --}}
    <section class="flex space-x-20 justify-between p-6 bg-gray-50 rounded-lg shadow-md">
        
        <img src="{{ asset('images/customers/Donna-sorridente-830x625.webp') }}" class="w-96 h-80 rounded-lg shadow-lg" alt="">

        <article class="space-y-5 pr-10">
            <h1 class="text-3xl font-bold text-gray-800 mb-5">{{ $customer->user->name }}</h1>

            <div class="flex space-x-5">
                <h4 class="w-28 text-right font-bold text-gray-600">Documento:</h4>
                <p class="parrafo text-gray-700">{{ $customer->user->document }}</p>
            </div>  

            <div class="flex space-x-5">
                <h4 class="w-28 text-right font-bold text-gray-600">Correo:</h4>
                <p class="parrafo text-gray-700">{{ $customer->user->email }}</p>
            </div>  

            <div class="flex space-x-5">
                <h4 class="w-28 text-right font-bold text-gray-600">Teléfono:</h4>
                <p class="parrafo text-gray-700">{{ $customer->phone_number }}</p>
            </div> 
        </article>
    </section>

    <section class="flex justify-between px-28 py-5 items-center space-x-28 bg-white rounded-lg shadow-md mt-6">
        <div class="flex flex-col space-y-1 justify-center items-center ">
            <p>Ver Pedidos</p>
            <a href="#" class="btn flex justify-center items-center bg-blue-500 hover:bg-blue-600 text-white rounded-md transition duration-200 p-2">
                <img src="{{ asset('images/icons/route.svg') }}" alt="">
            </a> <!-- Asegúrate de que esta ruta esté definida -->
        </div>

        <div class="flex justify-between items-center space-x-10 pr-56">
            <form onclick="return returnEliminar();" action="{{ route('admin.destroy_customer', $customer->id) }}" method="POST" class="flex flex-col space-y-1 justify-center items-center">
                @csrf
                @method("DELETE")
                <p>Eliminar Cliente</p>
                <button type="submit" class="btn flex justify-center items-center bg-red-500 hover:bg-red-600 text-white rounded-md transition duration=200 p=2">
                    <img src="{{ asset('images/icons/delete.svg') }}" alt="">
                </button>
            </form>

            <div class="flex flex-col space-y-1 justify-center items-center">
                <p>Modificar Cliente</p>
                <a href="{{ route('admin.customer_edit', $customer->id) }}" class="btn flex justify-center items-center bg-yellow-500 hover:bg-yellow-600 text-white rounded-md transition duration=200 p=2">
                    <img src="{{ asset('images/icons/modify.svg') }}" alt="">
                </a> <!-- Asegúrate de que esta ruta esté definida -->
            </div>
        </div>
    </section>

    <!-- Script de confirmación -->
    <script>
        function returnEliminar() {
            return confirm('¿Está seguro que desea eliminar al cliente?');
        }
    </script>
</x-layout-admin>