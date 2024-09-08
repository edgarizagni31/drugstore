<x-layouts.dashboard>
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-4">Tickets para la Venta ID {{ $sale->aggregate_id }}</h1>

        <table class="table w-full">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">Producto</th>
                    <th class="py-2 px-4 border-b">Cantidad</th>
                    <th class="py-2 px-4 border-b">Valor Unitario</th>
                    <th class="py-2 px-4 border-b">Valor Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tickets as $ticket)
                    <tr>
                        <td class="py-2 px-4 border-b">
                            @php
                                $product = \App\Models\Product::find($ticket->product_id);
                            @endphp
                            {{ $product ? $product->name : 'Producto no encontrado' }}
                        </td>
                        <td class="py-2 px-4 border-b">{{ $ticket->quantity }}</td>
                        <td class="py-2 px-4 border-b">{{ $ticket->unit_value }}</td>
                        <td class="py-2 px-4 border-b">{{ number_format($ticket->total_value, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <a href="{{ route('sales.index') }}" class="btn  mt-4">Regresar a Ventas</a>
    </div>
</x-layouts.dashboard>
