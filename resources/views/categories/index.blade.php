<x-layouts.dashboard title="Categorias">
    <div class="container mx-auto p-6">
        <header class="w-full flex justify-between mb-4">
            <h1 class="text-3xl font-bold mb-4">Categorias</h1>
            <a href="{{ route('categories.create') }}" class="btn btn-primary mb-4">Crear nueva categoria</a>
        </header>

        @if (session('success'))
            <div class="alert alert-success mb-4">
                {{ session('success') }}
            </div>
        @endif

        <ul class="list-disc pl-5">
            @foreach ($categories as $category)
                <li class="flex justify-between items-center mb-2">
                    <a href="{{ route('categories.show', $category) }}"
                        class="text-blue-500 hover:underline">{{ $category->name }}</a>
                    <div class="flex space-x-2">
                        <a href="{{ route('categories.edit', $category) }}" class="btn btn-success mx-4">Editar</a>
                        <form action="{{ route('categories.destroy', $category) }}" method="POST"
                            onsubmit="return confirm('Are you sure?');">
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
