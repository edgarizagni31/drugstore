<x-layouts.dashboard>
    <h1 class="text-3xl font-bold mb-4">Editar Proveedor</h1>
    <form action="{{ route('suppliers.update', $supplier) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')
        <div class="form-control">
            <label for="name" class="label">
                <span class="label-text">Nombre</span>
            </label>
            <input type="text" id="name" name="name" class="input input-bordered w-full" value="{{ old('name', $supplier->name) }}" required>
        </div>
        <button type="submit" class="btn btn-primary w-full">Actualizar</button>
    </form>
</x-layouts.dashboard>
