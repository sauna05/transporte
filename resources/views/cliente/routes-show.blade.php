<x-layout-customer
title="Ruta">

<h1 class="text-2xl font-bold mb-5">Nombre Cliente - Route</h1>

   {{-- cada article es un registro --}}
   <section class="flex justify-between">

        <article class="w-1/2 space-y-3  rounded-md p-2 ">
            <div class="flex">
                <h4 class="w-16 text-right pr-4 font-bold">Cliente:</h4>
                <p class="parrafo">Nombre Cliente</p>
            </div>

            <div class="flex">
                <h4 class="w-16 text-right pr-4 font-bold">Estado:</h4>
                <p class="parrafo">Pendiente</p>
            </div>

            <div class="flex">
                <h4 class="w-16 text-right pr-4 font-bold">Carga:</h4>
                <p class="parrafo">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad distinctio doloribus quasi ducimus nam exercitationem voluptatem perferendis adipisci, architecto minus magnam obcaecati, libero quisquam accusamus tenetur. Rerum labore autem architecto sint numquam nisi totam debitis, praesentium possimus provident necessitatibus explicabo.</p>
            </div>
        </article>

        <article class=" space-y-3  rounded-md p-2">
            <div class="flex space-x-5">
                <h4 class="w-16 text-right pr-4 font-bold">Origen:</h4>
                <p class="parrafo">calle 19 # 32 avenida orameno valledupar</p>
            </div>

            <div class="flex space-x-5">
                <h4 class="w-16 text-right pr-4 font-bold">Destino:</h4>
                <p class="parrafo">carrera 49-43 curva cerrada en junto la avenida</p>
            </div>

            <div class="flex space-x-5">
                <h4 class="w-16 text-right pr-4 font-bold">Distancia:</h4>
                <p class="parrafo">5 km</p>
            </div>
            
        </article>
</section>


<h1 class="text-2xl font-bold my-5 ">Iniciar Ruta</h1>

<section>
    <form action="#" class="space-y-10">
        <div class="flex space-x-20">
            
            <div class="flex flex-col w-1/3">
                <label for="camion"  class="parrafo">Camion</label>
                <select name="camion" id="camion" class="bg-gray-400 h-10 parrafo rounded-md px-5 outline-none"></select>
            </div>

            <div class="flex flex-col w-1/3">
                <label for="conductor" class="parrafo">Conductor</label>
                <select name="conductor" id="conductor" class="bg-gray-400 h-10 parrafo rounded-md px-5 outline-none"></select>
            </div>
        </div>

        <button class="btn">
            Iniciar ruta
        </button>
    </form>
</section>



</x-layout-customer>
