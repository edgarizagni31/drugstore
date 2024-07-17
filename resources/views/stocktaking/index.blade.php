<x-layouts.dashboard>
    <header class="mb-4">

        <div class="flex items-center mb-4">
        </div>

        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl text-stone-900 font-sans"> Inventario </h1>


            <a href="{{ route('stocktaking.product') }}" class="btn btn-primary text-base">Nuevo Producto</a>
        </div>

        <p class="text-base text-stone-800">
            Una lista de todos los medicamentos, incluido su nombre, categoria, stock y fecha de vencimiento.
        </p>
    </header>


    <div class="overflow-x-auto mb-4">
        <table class="table">
            <thead class="text-base">
                <tr class="text-stone-400">
                    <th>Codigo</th>
                    <th>Categoria</th>
                    <th>Medicamento</th>
                    <th>Cantidad</th>
                    <th>Fecha de vencimiento</th>
                    <th>Valor Unitario</th>
                    <th>Valor Total</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr class="text-base">
                    <td>
                        M0001
                    </td>
                    <td>
                        Gorros
                    </td>
                    <td>
                        Condones Piel Clasico
                    </td>
                    <td class="text-stone-900">
                        2
                    </td>
                    <td>
                        01/2027
                    </td>
                    <td class="text-stone-900">@money(2.5)</td>
                    <td class="text-stone-900">
                        @money(5)
                    </td>
                    @if (in_array(Auth::user()->role->name, ['ADMIN', 'ALMACENERO']))
                        <th class="text-stone-900">
                            <button class="btn btn-ghost btn-sm text-green-500">Actualizar stock</button>
                        </th>
                    @endif
                </tr>

                <tr class="text-base">
                    <td>
                        M0002
                    </td>
                    <td>
                        Gorros
                    </td>
                    <td>
                        Condones Piel Sabor Maracuya
                    </td>
                    <td class="text-stone-900">
                        2
                    </td>
                    <td>
                        01/2027
                    </td>
                    <td class="text-stone-900">@money(2.5)</td>
                    <td class="text-stone-900">
                        @money(5)
                    </td>

                    @if (in_array(Auth::user()->role->name, ['ADMIN', 'ALMACENERO']))
                        <th class="text-stone-900">
                            <button class="btn btn-ghost btn-sm text-green-500">Actualizar stock</button>
                        </th>
                    @endif

                </tr>

            </tbody>

        </table>
    </div>


</x-layouts.dashboard>
