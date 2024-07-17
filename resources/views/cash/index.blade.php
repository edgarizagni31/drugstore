<x-layouts.dashboard>
    <header class="mb-4">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl text-stone-900 font-sans"> Caja - Dia {{ date('d-m-Y') }}. </h1>

            <a href="{{ route('sales.new') }}" class="btn btn-error text-base">Cerrar caja</a>
        </div>

        <div class="flex justify-center">
            <div class="stats shadow">
                <div class="stat">
                    <div class="stat-figure">
                        <i class="fa-solid fa-box text-2xl"></i>
                    </div>
                    <div class="stat-title">Total Ventas</div>
                    <div class="stat-value">3</div>
                    <div class="stat-desc">1 venta pendiente de pago</div>
                </div>

                <div class="stat">
                    <div class="stat-figure">
                        <i class="fa-solid fa-money-bill text-2xl"></i>
                    </div>
                    <div class="stat-title">Saldo Actual</div>
                    <div class="stat-value">@money(300)</div>
                    <div class="stat-desc">+ @money(220) del saldo inicial</div>
                </div>

                <div class="stat">
                    <div class="stat-title">Saldo inicial</div>
                    <div class="stat-value">@money(80)</div>
                    <div class="stat-desc">
                        Caja abierta el {{ date('d-m-Y H:i', strtotime(date('Y-m-d H:i:s')) - 120 * 60) }}
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="overflow-x-auto mb-4">
        <table class="table">
            <thead class="text-base">
                <tr class="text-stone-400">
                    <th>Fecha y Hora </th>
                    <th>Precio Total</th>
                    <th>Metodo de pago</th>
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
                        @money(5)
                    </td>
                    <td class="text-stone-900">
                        -
                    </td>
                    <td class="text-stone-900">
                        <div class="badge badge-warning gap-2">
                            Pendiente
                        </div>
                    </td>
                    <th class="text-stone-900">
                        <a href={{ route('cash.new', 2) }} class="btn btn-ghost btn-sm">Pagar</a>
                    </th>
                </tr>
                <tr class="text-base">
                    <td>
                        {{ date('d-m-Y H:i', strtotime(date('Y-m-d H:i:s')) - 5 * 60) }}
                    </td>

                    <td class="text-stone-900">@money(3.2)</td>
                    <td class="text-stone-900">
                        Efectivo
                    </td>
                    <td class="text-stone-900">
                        <div class="badge badge-success gap-2">
                            Pagado
                        </div>
                    </td>
                    <th class="text-stone-900">
                    </th>
                </tr>


                <tr class="text-base">
                    <td>
                        {{ date('d-m-Y H:i', strtotime(date('Y-m-d H:i:s')) - 7 * 60) }}
                    </td>
                    <td class="text-stone-900">@money(32)</td>
                    <td class="text-stone-900">
                        Yape
                    </td>
                    <td class="text-stone-900">
                        <div class="badge badge-info gap-2">
                            Despachado
                        </div>
                    </td>
                    <th class="text-stone-900">
                    </th>
                </tr>

            </tbody>

        </table>
    </div>
</x-layouts.dashboard>
