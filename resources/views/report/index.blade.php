<x-layouts.dashboard>
    <header class="mb-4">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl text-stone-900 font-sans"> Reportes de venta </h1>
        </div>

    </header>

    <div class="overflow-x-auto mb-4">
        <table class="table">
            <thead class="text-base">
                <tr class="text-stone-400">
                    <th>Fecha y Hora </th>
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
                        <div class="badge badge-success gap-2">
                            Aceptada
                        </div>
                    </td>
                    <th class="text-stone-900">
                        <a href={{ route('report.sales', 1) }} class="btn btn-ghost btn-sm">Ventas</a>
                    </th>
                </tr>
                <tr class="text-base">
                    <td>
                        {{ date('d-m-Y H:i', strtotime(date('Y-m-d H:i:s')) - 900 * 60) }}
                    </td>

                    <td class="text-stone-900">
                        <div class="badge badge-success gap-2">
                            Aceptada
                        </div>
                    </td>
                    <th class="text-stone-900">
                        <a href={{ route('report.sales', 2) }} class="btn btn-ghost btn-sm">Ventas</a>
                    </th>
                </tr>


                <tr class="text-base">
                    <td>
                        {{ date('d-m-Y H:i', strtotime(date('Y-m-d H:i:s')) - 12000 * 60) }}
                    </td>

                    <td class="text-stone-900">
                        <div class="badge badge-success gap-2">
                            Aceptada
                        </div>
                    </td>
                    <th class="text-stone-900">
                        <a href={{ route('report.sales', 3) }} class="btn btn-ghost btn-sm">Ventas</a>
                    </th>
                </tr>

                


            </tbody>

        </table>
    </div>
</x-layouts.dashboard>
