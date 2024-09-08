<x-layouts.dashboard>
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-4">Detalles del Proveedor</h1>
        <div class="mb-4">
            <p class="text-lg">Nombre: <span class="font-semibold">{{ $supplier->name }}</span></p>
        </div>
        <div class="flex space-x-4">
            <a href="{{ route('suppliers.edit', $supplier) }}" class="btn btn-secondary">Editar</a>
            <form action="{{ route('suppliers.destroy', $supplier) }}" method="POST"
                onsubmit="return confirm('¿Estás seguro de eliminar este proveedor?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-error">Eliminar</button>
            </form>
        </div>
        <a href="{{ route('suppliers.index') }}" class="btn btn-outline mt-4">Volver a Proveedores</a>
    </div>
</x-layouts.dashboard>
