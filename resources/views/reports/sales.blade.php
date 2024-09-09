<x-layouts.dashboard>
    <div class="container mx-auto p-6">
        <header class="flex justify-between items-center mb-4">
            <h1 class="text-3xl font-bold mb-4">Ventas Registradas</h1>


        </header>


        <table class="table">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">ID de Caja</th>
                    <th class="py-2 px-4 border-b">Tipo de Evento</th>
                    <th class="py-2 px-4 border-b">Datos del Evento</th>
                    <th class="py-2 px-4 border-b">Fecha de Creación</th>
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
</x-layouts.dashboard>
