<x-layout-admin title="Editar conductor">
    <h2 class="text-2xl font-bold mb-6 text-center">Editar Conductor</h2>

    <!-- Mostrar Mensajes de Éxito o Error -->
    @if ($errors->any())
        <div class="mb-4">
            <ul class="text-red-600">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div class="mb-4 text-green-600">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.driver.update',$driver->id) }}" method="POST" enctype="multipart/form-data">
        @csrf 
        @method('PUT')

        <div class="flex justify-center items-center">
            <section class="grid grid-cols-2 items-center gap-x-5 gap-y-2">

                <div class="mb-4 flex flex-col items-center w-fit">
                    <label for="document" class="font-medium text-gray-700 self-start py-1">Número de Documento</label>
                    <input type="text" name="document" id="document" value="{{ old('document',$driver->user->document) }}" required class="py-2 px-3 border-2 border-black rounded-md focus:outline-none w-[25rem]" placeholder="Ingrese su documento">
                </div>

                <div class="mb-4 flex flex-col items-center w-fit">
                    <label for="name" class="text-gray-700 self-start py-1">Nombre</label>
                    <input type="text" name="name" id="name" value="{{ old('name',$driver->user->name) }}" required class="py-2 px-3 border-2 border-black rounded-md focus:outline-none w-[25rem]" placeholder="Ingrese su nombre">
                </div>

                <div class="mb-4 flex flex-col items-center w-fit">
                    <label for="email" class="text-gray-700 self-start py-1">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email',$driver->user->email) }}" required class="py-2 px-3 border-2 border-black rounded-md focus:outline-none w-[25rem]" placeholder="Ingrese su email">
                </div>

                {{-- <div class="mb-4 flex flex-col items-center w-fit">
                    <label for="password" class="text-gray-700 self-start py-1">Contraseña</label>
                    <input type="password" name="password" id="password" required class="py-2 px-3 border-2 border-black rounded-md focus:outline-none w-[25rem]" placeholder="Ingrese su contraseña">
                </div>

                <div class="mb-4 flex flex-col items-center w-fit">
                    <label for="password_confirmation" class="font-medium text-gray-700 self-start py-1">Confirmar Contraseña</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" required class="py-2 px-3 border-2 border-black rounded-md focus:outline-none w-[25rem]" placeholder="Confirme su contraseña">
                </div> --}}

                <div class="mb-4 flex flex-col items-center w-fit">
                    <label for="license_id" class="font-medium text-gray-700 self-start py-1">Licencia</label>
                    <select name="license_id" id="license_id" required class="py-2 px-3 border-2 border-black rounded-md focus:outline-none w-[25rem]">
                        @foreach ($licences as $licence)
                            <option value="{{ $licence->id }}">{{ $licence->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4 flex flex-col items-center w-fit">
                    <label for="experience" class="font-medium text-gray-700 self-start py-1">Experiencia (en años)</label>
                    <input type="number" name="experience" id="experience" value="{{ old('experience',$driver->experience) }}" required min="1" class="py-2 px-3 border-2 border-black rounded-md focus:outline-none w-[25rem]">
                </div>

                <div class="mb-4 flex flex-col items-center w-fit">
                    <label for="imagen" class="font-medium text-gray-700 self-start py-1">Imagen</label>
                    <input type="file" name="imagen" id="imagen" accept="image/*"  class="py-2 px-3 border-2 border-black rounded-md focus:outline-none w-[25rem]">
                </div>

            </section>
        </div>

        <button type ="submit" class="btn">Actualizar</button>
    </form>  
</x-layout-admin> 