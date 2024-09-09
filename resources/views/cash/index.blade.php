<x-layouts.dashboard>
    @if ($status == 'ABIERTO')
        <header class="mb-4">
            <div class="flex justify-between items-center mb-4">
                <h1 class="text-2xl text-stone-900 font-sans"> Caja - Dia {{ date('d-m-Y') }}. </h1>
                <form action="{{ route('reports.update', $report->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-error">Cerrar Caja</button>
                </form>
            </div>

            <div class="flex justify-center">
                <div class="stats shadow">
                    <div class="stat">
                        <div class="stat-figure">
                            <i class="fa-solid fa-box text-2xl"></i>
                        </div>
                        <div class="stat-title">Total Ventas</div>
                        <div class="stat-value">{{ $report->event_data['total_sales'] }}</div>
                    </div>

                    <div class="stat">
                        <div class="stat-figure">
                            <i class="fa-solid fa-money-bill text-2xl"></i>
                        </div>
                        <div class="stat-title">Saldo Actual</div>
                        <div class="stat-value">{{ $report->event_data['current_balance'] }}</div>
                        <div class="stat-desc">
                            {{ $report->event_data['current_balance'] - $report->event_data['initial_balance'] }} del
                            saldo inicial</div>
                    </div>

                    <div class="stat">
                        <div class="stat-title">Saldo inicial</div>
                        <div class="stat-value">
                            {{ $report->event_data['initial_balance'] }}
                        </div>
                        <div class="stat-desc">
                            Caja abierta el {{ date('d-m-Y H:i', strtotime(date('Y-m-d H:i:s')) - 120 * 60) }}
                        </div>
                    </div>
                </div>
            </div>
        </header>

        @if (session('success'))
            <div class="mb-4 p-4 bg-green-200 text-green-800 rounded">
                {{ session('success') }}
            </div>
        @endif


        <div class="overflow-x-auto mb-4">
            <table class="table">
                <thead class="text-base">
                    <tr class="text-stone-400">
                        <th>ID</th>
                        <th>Estado</th>
                        <th>Event Data</th>
                        <th>Fecha y Hora </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sales as $sale)
                        <tr>
                            <td class="py-2 px-4 border-b">{{ $sale->aggregate_id }}</td>
                            <td class="py-2 px-4 border-b">{{ $sale->event_type }}</td>
                            <td class="py-2 px-4 border-b">{{ $sale->event_data }}</td>
                            <td class="py-2 px-4 border-b">{{ $sale->created_at }}</td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    @else
        <a href={{ route('reports.create') }} class="w-full btn-primary btn">Abrir Caja</a>
    @endif



</x-layouts.dashboard>
