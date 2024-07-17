<x-layouts.dashboard>
    <header class="mb-4">

        <div class="flex items-center mb-4">
            <a href="{{ route('report.index') }}" class="btn btn-circle btn-sm btn-ghost mr-2">
                <i class="fa-solid fa-arrow-left"></i>
            </a>
            <h1 class="text-2xl text-stone-900 font-sans"> Mis ventas </h1>
        </div>
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
                        {{ date('d-m-Y H:i', strtotime(date('Y-m-d H:i:s')) - 5 * 60) }}
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
                        {{ date('d-m-Y H:i', strtotime(date('Y-m-d H:i:s')) - 7 * 60) }}
                    </td>
                    <td class="text-stone-900">
                        1
                    </td>
                    <td class="text-stone-900">@money(32)</td>
                    <td class="text-stone-900">
                        <div class="badge badge-success gap-2">
                            Pagado
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
