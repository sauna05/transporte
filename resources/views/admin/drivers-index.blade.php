<x-layout-admin title="Conductores">
    <section class="space-y-8 my-5 relative">
        <div class="fixed right-36 top-40 font-bold text-2xl flex flex-col justify-center items-center space-y-5">
            <h2 class="mb-14">Conductores</h2>
            <img src="{{ asset('images/icons/anadir-conductor.png') }}" alt="">
            <a href="{{ route('admin.driverForm') }}" class="btn flex justify-center items-center">Añadir Conductor</a>
        </div>

        @if (session('message'))
        <div class="bg-green-500 text-white p-4 rounded mb-4">
            {{ session('message') }}
        </div>
        @endif
        {{-- Listado de Conductores --}}
        @if ($drivers && $drivers->isNotEmpty())
            @foreach ($drivers as $driver)
                <a class="flex w-2/4 border-b-2 border-gray-500 hover:bg-gray-300/50 rounded-md p-2 space-x-5" href="{{route('admin.driver_show',$driver->id)}}">
                    <div class="flex justify-center items-center">
                        {{-- @if($driver->imagen) 
                            <img src="{{ asset('storage/' . URL('')) }}" class="w-36" alt="{{ $driver->user->name }}">
                            <img src="{{ asset('storage/images/0sHSp7lEYukbc2SDDuIV6aVDqy1i7C6RBnpf8l0j.jpg') }}" alt="">
                        @else
                            <img src="{{ asset('images/conductor-por-defecto.png') }}" class="w-36" alt="Conductor por defecto">
                        @endif --}}
                        <img id="driver-image" class="w-36" alt="Conductor">

                            <script>
                                const driverImage = '{{ $driver->imagen }}';
                                const defaultImage = '{{ asset('images/conductor-por-defecto.png') }}';

                                document.getElementById('driver-image').src = driverImage ? '{{ asset('storage/') }}' + driverImage : defaultImage;
                            </script>
                                                    
                    </div>
                    <article class="space-y-5 self-center">
                        <div class="flex space-x-5">
                            <h4 class="w-28 text-right font-bold">Nombre:</h4>
                            <p class="parrafo">{{ $driver->user->name }}</p>
                        </div>

                        <div class="flex space-x-5">
                            <h4 class="w-28 text-right font-bold">Licencia:</h4>
                            <p class="parrafo">{{ $driver->licence->name }}</p> <!-- Mostrar el tipo de licencia -->
                        </div>

                        <div class="flex space-x-5">
                            <h4 class="w-28 text-right font-bold">Experiencia:</h4>
                            <p class="parrafo">{{ $driver->experience }} {{ $driver->experience === 1 ? 'año' : 'años' }}</p> <!-- Mostrar la experiencia -->
                        </div>

                        <div class="flex space-x-5">
                            <h4 class="w-28 text-right font-bold">Disponibilidad:</h4>
                            <p class="parrafo">{{ $driver->availability }}</p> <!-- Mostrar disponibilidad -->
                        </div>
                    </article>
                </a>
           +
            @endforeach
        @else
        <div class="text-center text-lg font-semibold text-gray-700 bg-yellow-200 border border-yellow-400 rounded p-4">
            No hay conductores registrados.
        </div>
        @endif
    </section>
</x-layout-admin>