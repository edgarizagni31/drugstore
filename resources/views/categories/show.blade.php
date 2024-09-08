<x-layouts.dashboard>

    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-4">Detalle de categorias</h1>
        <div class="mb-4">
            <p class="text-lg">Nombre: <span class="font-semibold">{{ $category->name }}</span></p>
        </div>
        <div class="flex space-x-4">
            <a href="{{ route('categories.edit', $category) }}" class="btn btn-success">Editar</a>
            <form action="{{ route('categories.destroy', $category) }}" method="POST"
                onsubmit="return confirm('Are you sure?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-error">Eliminar</button>
            </form>
        </div>
        <a href="{{ route('categories.index') }}" class="btn btn-outline mt-4">Regresar a Categories</a>
    </div>

</x-layouts.dashboard>
