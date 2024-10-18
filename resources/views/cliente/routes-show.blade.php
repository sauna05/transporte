<x-layout-customer title="Ruta">

    <h1 class="text-3xl font-bold mb-5 text-gray-800">Nombre Cliente - Ruta</h1>

    @if($customer->orders->isEmpty())
        <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 rounded-md">
            <p class="font-bold">No tienes rutas o pedidos creados.</p>
            <p>Por favor, verifica más tarde.</p>
        </div>
    @else
        @foreach($customer->orders as $order)
            <section class="flex justify-between items-baseline py-5 hover:bg-gray-200 rounded-md transition duration-200 bg-white shadow-md mb-4">
                <div class="w-full">
                    <article class="space-y-3 rounded-md p-4">
                        <div class="flex">
                            <h4 class="w-24 text-right pr-4 font-bold text-gray-600">Cliente:</h4>
                            <p class="parrafo text-left">{{ $customer->user->name }}</p>
                        </div>

                        <div class="flex">
                            <h4 class="w-24 text-right pr-4 font-bold text-gray-600">Estado:</h4>
                            <p class="parrafo text-left">{{ $order->route->status }}</p>
                        </div>

                        <div class="flex">
                            <h4 class="w-24 text-right pr-4 font-bold text-gray-600">Carga:</h4>
                            <p class="parrafo text-left">{{ $order->charge }}</p>
                        </div>

                        <div class="flex">
                            <h4 class="w-24 text-right pr-4 font-bold text-gray-600">Fecha:</h4>
                            <p class="parrafo text-left">{{ $order->date }}</p>
                        </div>
                    </article>
                </div>

                <div class="flex justify-center items-center space-x-10 w-fit">
                    <form action="#" method="POST" class="flex flex-col space-y-1 justify-center items-center">
                        @csrf
                        @method("DELETE")
                        <p class="text-red-600 font-bold">Eliminar Ruta</p>
                        <button type="submit" class="btn flex justify-center items-center bg-red-500 hover:bg-red-600 text-white rounded-md transition duration-200 p-2">
                            <img src="{{ asset('images/icons/delete.svg') }}" alt="">
                        </button>
                    </form>

                    <div class="flex flex-col space-y-1 justify-center items-center w-fit">
                        <p>Modificar Ruta</p>
                        <a href="#" class="btn flex justify-center items-center bg-blue-500 hover:bg-blue-600 mr-10 text-white rounded-md transition duration=200 p=2">
                            <img src="{{ asset('images/icons/modify.svg') }}" alt="">
                        </a> <!-- Asegúrate de que esta ruta esté definida -->
                    </div>
                </div>

                <article class="space-y-3 rounded-md p-2 w-full bg-white shadow-md">
                    <div class="flex space-x-5">
                        <h4 class="w-24 text-right pr-4 font-bold text-gray-600">Origen:</h4>
                        <p class="parrafo text-left">{{ $order->route->origin }}</p>
                    </div>

                    <div class="flex space-x-5">
                        <h4 class="w-24 text-right pr-4 font-bold text-gray-600">Destino:</h4>
                        <p class="parrafo text-left">{{ $order->route->destination }}</p> 
                    </div>

                    <div class="flex space-x-5">
                        <h4 class="w-24 text-right pr-4 font-bold text-gray-600">Distancia:</h4>
                        <p class="parrafo text-left">{{ $order->route->distance }} km</p> 
                    </div>
                </article>
            </section>
        @endforeach
    @endif

</x-layout-customer>