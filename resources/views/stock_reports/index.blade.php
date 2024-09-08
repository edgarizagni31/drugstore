<x-layouts.dashboard>
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-4">Reportes de Stock para el Producto: {{ $product->name }}</h1>

        @if (session('success'))
            <div class="mb-4 p-4 bg-green-200 text-green-800 rounded">
                {{ session('success') }}
            </div>
        @endif

        <table class="table w-full">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">Cantidad</th>
                    <th class="py-2 px-4 border-b">Estado</th>
                    <th class="py-2 px-4 border-b">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($stockReports as $report)
                    <tr>
                        <td class="py-2 px-4 border-b">{{ $report->quanty }}</td>
                        <td class="py-2 px-4 border-b">
                            @if ($report->status)
                                <span class="text-green-600">CREADO</span>
                            @else
                                <span class="text-red-600">ELIMINADO</span>
                            @endif
                        </td>
                        <td class="py-2 px-4 border-b">
                            @if ($report->status)
                                <form action="{{ route('stockReports.destroy', $report) }}" method="POST"
                                    class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline">Eliminar</button>
                                </form>
                            @else
                                N/A
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="py-2 px-4 border-b text-center">No hay reportes de stock.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-layouts.dashboard>
