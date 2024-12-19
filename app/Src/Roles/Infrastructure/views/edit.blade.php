<x-layouts.dashboard>
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-2xl font-semibold mb-4">Editar Rol</h1>
        <form action="{{ route('roles.update', $role) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="name" class="label">Nombre</label>
                <input type="text" name="name" id="name" value="{{ old('name', $role->name) }}"
                    class="input input-bordered w-full">
                @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
</x-layouts.dashboard>
