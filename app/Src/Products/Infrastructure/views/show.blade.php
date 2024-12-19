<x-layouts.dashboard>
    <h1 class="text-3xl font-bold mb-4">Detalles del Producto</h1>
    <div class="mb-4">
        <p class="text-lg">Nombre: <span class="font-semibold">{{ $product->name }}</span></p>
        <p class="text-lg">Valor Unitario: <span class="font-semibold">{{ $product->unit_value }}</span></p>
        <p class="text-lg">Valor Total: <span class="font-semibold">{{ $product->total_value }}</span></p>
        <p class="text-lg">Cantidad: <span class="font-semibold">{{ $product->quantity }}</span></p>
        <p class="text-lg">Stock Actual: <span class="font-semibold">{{ $product->stock_actual }}</span></p>
        <p class="text-lg">Fecha de Vencimiento: <span
                class="font-semibold">{{ $product->due_date }}</span></p>
        <p class="text-lg">Proveedor: <span class="font-semibold">{{ $product->supplier->name }}</span></p>
        <p class="text-lg">Categoría: <span class="font-semibold">{{ $product->category->name }}</span></p>
    </div>
    <div class="flex space-x-4">
        <a href="{{ route('products.edit', $product) }}" class="btn btn-secondary">Editar</a>
        <form action="{{ route('products.destroy', $product) }}" method="POST"
            onsubmit="return confirm('¿Estás seguro de eliminar este producto?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-error">Eliminar</button>
        </form>
    </div>
    <a href="{{ route('products.index') }}" class="btn btn-outline mt-4">Volver a Productos</a>
</x-layouts.dashboard>
