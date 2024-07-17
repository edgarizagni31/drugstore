<x-layouts.dashboard>
    <header class="mb-4">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl text-stone-900 font-sans"> Ventas </h1>

            <a href="{{ route('sales.new') }}" class="btn btn-primary text-base">Registrar</a>
        </div>

        <p class="text-base text-stone-800">
            Una lista de todas las ventas del dia {{ date('d-m-Y') }}.
        </p>
    </header>

    <div class="overflow-x-auto mb-4">
        <table class="table">
            <thead class="text-base">
                <tr class="text-stone-400">
                    <th>Fecha y Hora </th>
                    <th>Cantidad de medicamentos</th>
                    <th>Precio Total</th>
                    <th>Estado</th>

                    <th></th>
                </tr>
            </thead>
            <tbody>

                <tr class="text-base">
                    <td>
                        {{ date('d-m-Y H:i') }}
                    </td>
                    <td class="text-stone-900">
                        2
                    </td>
                    <td class="text-stone-900">
                        @money(5)
                    </td>
                    <td class="text-stone-900">
                        <div class="badge badge-warning gap-2">
                            Pendiente
                        </div>
                    </td>
                    <th class="text-stone-900">
                        <button class="btn btn-ghost btn-sm">Detalles</button>
                    </th>
                </tr>
                <tr class="text-base">
                    <td>
                        {{ date('d-m-Y H:i', strtotime(date("Y-m-d H:i:s")) - (5*60)) }}
                    </td>
                    <td class="text-stone-900">
                        4
                    </td>
                    <td class="text-stone-900">@money(3.2)</td>
                    <td class="text-stone-900">
                        <div class="badge badge-success gap-2">
                            Pagado
                        </div>
                    </td>
                    <th class="text-stone-900">
                        <button class="btn btn-ghost btn-sm">Detalles</button>
                    </th>
                </tr>


                <tr class="text-base">
                    <td>
                        {{ date('d-m-Y H:i', strtotime(date("Y-m-d H:i:s")) - (7*60)) }}
                    </td>
                    <td class="text-stone-900">
                        1
                    </td>
                    <td class="text-stone-900">@money(32)</td>
                    <td class="text-stone-900">
                        <div class="badge badge-info gap-2">
                            Despachado
                        </div>
                    </td>
                    <th class="text-stone-900">
                        <button class="btn btn-ghost btn-sm">Detalles</button>
                    </th>
                </tr>

            </tbody>

        </table>
    </div>
</x-layouts.dashboard>
