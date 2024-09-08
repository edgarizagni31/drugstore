<x-layouts.dashboard>
    <div class="container mx-auto p-6">
        <header class="flex justify-between items-center mb-4">
            <h1 class="text-3xl font-bold mb-4">Ventas Registradas</h1>


            <a href="{{ route('sales.create') }}" class="btn btn-primary">Registrar venta</a>
        </header>

        @if (session('success'))
            <div class="mb-4 p-4 bg-green-200 text-green-800 rounded">
                {{ session('success') }}
            </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">ID de Caja</th>
                    <th class="py-2 px-4 border-b">Tipo de Evento</th>
                    <th class="py-2 px-4 border-b">Datos del Evento</th>
                    <th class="py-2 px-4 border-b">Fecha de Creación</th>
                    <th class="py-2 px-4 border-b">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sales as $sale)
                    <tr>
                        <td class="py-2 px-4 border-b">{{ $sale->aggregate_id }}</td>
                        <td class="py-2 px-4 border-b">{{ $sale->event_type }}</td>
                        <td class="py-2 px-4 border-b">{{ $sale->event_data }}</td>
                        <td class="py-2 px-4 border-b">{{ $sale->created_at }}</td>
                        <td class="py-2 px-4 border-b">
                            <a href={{route('tickets.index', $sale->id)}} class="btn btn-secondary mx-2">Tickets</a>

                            @if ($sale->event_type === 'PENDIENTE')
                                <form action="{{ route('sales.updateStatus', [$sale, 'PAGADA']) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-success">Marcar como Pagada</button>
                                </form>
                            @endif
                            @if ($sale->event_type === 'PAGADA')
                                <form action="{{ route('sales.updateStatus', [$sale, 'DESPACHADA']) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-info">Marcar como Despachada</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layouts.dashboard>
