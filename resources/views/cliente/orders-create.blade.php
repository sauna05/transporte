<x-layout-customer title="Hacer Pedido">

    <h1 class="text-2xl font-bold mb-6">Crear Pedido</h1>

    @if(session('message'))
        <div class="bg-green-500 text-white p-4 rounded mb-4">
            {{ session('message') }}
        </div>
    @endif

    <form action="{{ route('cliente.registerOrder') }}" method="POST">
        @csrf

        <div class="flex justify-center items-center">
            <section class="grid grid-cols-2 items-center gap-x-5 gap-y-2">

                <div class="mb-4 flex flex-col items-center w-fit">
                    <label for="charge" class="font-medium text-gray-700 self-start py-1">Carga</label>
                    <input type="text" name="charge" id="charge" class="py-2 px-3 border-2 border-black rounded-md focus:outline-none w-[25rem]" required>
                </div>

                <div class="mb-4 flex flex-col items-center w-fit">
                    <label for="origin" class="font-medium text-gray-700 self-start py-1">Origen</label>
                    <input type="text" name="origin" id="origin" class="py-2 px-3 border-2 border-black rounded-md focus:outline-none w-[25rem]" required>
                </div>

                <div class="mb-4 flex flex-col items-center w-fit">
                    <label for="destination" class="font-medium text-gray-700 self-start py-1">Destino</label>
                    <input type="text" name="destination" id="destination" class="py-2 px-3 border-2 border-black rounded-md focus:outline-none w-[25rem]" required>
                </div>

                <div class="mb-4 flex flex-col items-center w-fit">
                    <label for="distance" class="font-medium text-gray-700 self-start py-1">Distancia (km)</label>
                    <input type="number" name="distance" id="distance" step="0.01" class="py-2 px-3 border-2 border-black rounded-md focus:outline-none w-[25rem]" required>
                </div>

                <div class="mb-4 flex flex-col items-center w-fit">
                    <label class="font-medium text-gray-700 self-start py-1">Precio</label>
                    <span id="price" class="py-2 px-3 border-2 border-black rounded-md w-[25rem] text-gray-700 bg-gray-200 text-center">$ 0.00</span>
                </div>

            </section>
        </div>

        <button type="submit" class="btn mt-10">Crear Pedido</button>
    </form>

    <script>
        const pricePerKilometer = 5000; // Precio por kilómetro

        document.getElementById('distance').addEventListener('input', function() {
            const distance = parseFloat(this.value);
            const priceLabel = document.getElementById('price');

            if (!isNaN(distance) && distance >= 0) {
                const totalPrice = distance * pricePerKilometer;
                priceLabel.textContent = totalPrice.toFixed(2); 
            } else {
                priceLabel.textContent = '0.00'; 
            }
        });
    </script>

</x-layout-customer>