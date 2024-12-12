<x-layouts.dashboard>
    <div class="container mx-auto p-6">
        <header class="flex items-center justify-between mb-4">
            <h1 class="text-3xl font-bold mb-4">Productos</h1>
            <a href="{{ route('products.create') }}" class="btn btn-primary mb-4">Crear Nuevo Producto</a>
        </header>


        @if (session('success'))
            <div class="alert alert-success mb-4">
                {{ session('success') }}
            </div>
        @endif

        <table class="table w-full">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Valor Unitario</th>
                    <th>Valor Total</th>
                    <th>Cantidad</th>
                    <th>Stock Actual</th>
                    <th>Fecha de Vencimiento</th>
                    <th>Proveedor</th>
                    <th>Categoría</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->unit_value }}</td>
                        <td>{{ $product->total_value }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>{{ $product->stock_actual }}</td>
                        <td>{{ $product->due_date}}</td>
                        <td>{{ $product->supplier->name }}</td>
                        <td>{{ $product->category->name }}</td>
                        <td>
                            <a href="{{ route('products.show', $product) }}" class="btn btn-info">Ver</a>
                            <a href="{{ route('products.edit', $product) }}" class="btn btn-success">Editar</a>
                            <a href="{{ route('products.stockReports.index', $product) }}" class="btn btn-secondary">Stock reportes</a>
                            <form action="{{ route('products.destroy', $product) }}" method="POST" class="inline"
                                onsubmit="return confirm('¿Estás seguro de eliminar este producto?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-error">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


</x-layouts.dashboard>
