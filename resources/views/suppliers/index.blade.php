<x-layouts.dashboard title="Provedores">
    <div class="container mx-auto p-6">
        <header class="flex items-center justify-between">
            <h1 class="text-3xl font-bold mb-4">Proveedores</h1>
            <a href="{{ route('suppliers.create') }}" class="btn btn-primary mb-4">Crear Nuevo Proveedor</a>
        </header>


        @if (session('success'))
            <div class="alert alert-success mb-4">
                {{ session('success') }}
            </div>
        @endif

        <ul class="list-disc pl-5">
            @foreach ($suppliers as $supplier)
                <li class="flex justify-between items-center mb-2">
                    <a href="{{ route('suppliers.show', $supplier) }}"
                        class="text-blue-500 hover:underline">{{ $supplier->name }}</a>
                    <div class="flex space-x-2">
                        <a href="{{ route('suppliers.edit', $supplier) }}" class="btn btn-success">Editar</a>
                        <form action="{{ route('suppliers.destroy', $supplier) }}" method="POST"
                            onsubmit="return confirm('¿Estás seguro de eliminar este proveedor?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-error">Eliminar</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</x-layouts.dashboard>
