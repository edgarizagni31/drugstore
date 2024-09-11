<x-layouts.dashboard>
    <header class="mb-4">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl text-stone-900 font-sans"> Reportes de venta </h1>

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
                    <th>Fecha y Hora </th>
                    <th>Estado</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reports as $report)
                    <tr>
                        <th> {{ $report->created_at }} </th>
                        <th> {{ $report->event_type }} </th>
                        <th>
                            <a href={{ route('reports.sales', $report->id) }} class="btn btn-secondary">Ventas</a>
                        </th>
                    </tr>
                @endforeach


            </tbody>

        </table>
    </div>
</x-layouts.dashboard>
