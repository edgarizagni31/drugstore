<x-layouts.dashboard>
    <header class="mb-4">

        <div class="flex items-center mb-4">
            <a href="{{ route('sales.index') }}" class="btn btn-circle btn-sm btn-ghost mr-2">
                <i class="fa-solid fa-arrow-left"></i>
            </a>
            <h1 class="text-2xl text-stone-900 font-sans"> Registrar venta </h1>
        </div>

        <p class="text-base text-stone-800">
            Busca el medicamento y luego indique la cantidad, si el nombre aparece en rojo es porque no hay stock.
        </p>
    </header>

    <form class="mb-4">
        <label class="input input-bordered flex items-center gap-2">
            <input type="text" class="grow" placeholder="Buscar por nombre" />
            <i class="fa-solid fa-magnifying-glass"></i>
        </label>
    </form>



    <div class="overflow-x-auto mb-4">
        <table class="table">
            <thead class="text-base">
                <tr class="text-stone-400">
                    <th>Medicamento</th>
                    <th>Cantidad</th>
                    <th>Precio Unitario</th>
                    <th>Precio Total</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>

                <tr class="text-base">
                    <td>
                        Condones Piel Clasico
                    </td>
                    <td class="text-stone-900">
                        2
                    </td>
                    <td class="text-stone-900">@money(2.5)</td>
                    <td class="text-stone-900">
                        @money(5)
                    </td>
                    <th class="text-stone-900">
                        <button class="btn btn-ghost btn-sm text-red-500">Eliminar</button>
                    </th>
                </tr>
                <tr class="text-base">
                    <td>
                        Condones Piel Sabor fresa
                    </td>
                    <td class="text-stone-900">
                        1
                    </td>
                    <td class="text-stone-900">@money(3.2)</td>
                    <td class="text-stone-900">
                        @money(3.2)
                    </td>
                    <th class="text-stone-900">
                        <button class="btn btn-ghost btn-sm text-red-500">Eliminar</button>
                    </th>
                </tr>


            </tbody>

        </table>
    </div>


    <footer class="absolute bottom-[20px] left-[20px] right-[20px]">
        <a href="{{ route('sales.index') }}" class="btn btn-primary text-lg w-full"> Generar ticket </a>
    </footer>

</x-layouts.dashboard>
