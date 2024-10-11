<x-layout-admin title="Clientes">
    <section class="space-y-8 my-5 relative">
        <div class="fixed right-36 top-40 font-bold text-2xl flex flex-col justify-center items-center space-y-5">
            <h2 class="mb-14">Clientes</h2>
            <img src="{{ asset('images/icons/anadir-cliente.png') }}" alt="Añadir Cliente">
            <a href="{{ route('admin.clienteForm') }}" class="btn flex justify-center items-center">Añadir Cliente</a>
        </div>

        
    @if (session('message'))
    <div class="bg-green-500 text-white p-4 rounded mb-4">
        {{ session('message') }}
    </div>
    @endif

        {{-- Listado de Clientes --}}
        @if ($customers && $customers->isNotEmpty())
            @foreach ($customers as $customer)
                <a class="flex w-2/4 border-b-2 border-gray-500 hover:bg-gray-300/50 rounded-md p-2 space-x-5" href="{{ route('admin.customer_show', $customer->id) }}">
                    <div class="flex justify-center items-center">
                        <img src="{{ asset('images/cliente-por-defecto.png') }}" class="w-36" alt="Cliente por defecto">
                    </div>

                    <article class="space-y-2 self-center">
                        <div class="flex space-x-5">
                            <h4 class="w-28 text-right font-bold">Documento:</h4>
                            <p class="parrafo">{{ $customer->user->document }}</p>
                        </div>

                        <div class="flex space-x-5">
                            <h4 class="w-28 text-right font-bold">Nombre:</h4>
                            <p class="parrafo">{{ $customer->user->name }}</p>
                        </div>

                        <div class="flex space-x-5">
                            <h4 class="w-28 text-right font-bold">Correo:</h4>
                            <p class="parrafo">{{ $customer->user->email }}</p>
                        </div>
                        <div class="flex space-x-5">
                            <h4 class="w-28 text-right font-bold">Telefono:</h4>
                            <p class="parrafo">{{ $customer->phone_number }}</p>
                        </div>
                    </article>
                </a>
            @endforeach
        @else
            <div class="text-center text-lg font-semibold text-gray-700 bg-yellow-200 border border-yellow-400 rounded p-4">
                No hay clientes registrados.
            </div>
        @endif
    </section>
</x-layout-admin>