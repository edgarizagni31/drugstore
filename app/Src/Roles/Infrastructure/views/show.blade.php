<x-layouts.dashboard>
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-2xl font-semibold mb-4">Detalles del Rol</h1>
        <div class="mb-4">
            <strong>ID:</strong> {{ $role->id }}
        </div>
        <div class="mb-4">
            <strong>Nombre:</strong> {{ $role->name }}
        </div>
        <a href="{{ route('roles.index') }}" class="btn btn-secondary">Regresar</a>
    </div>
</x-layouts.dashboard>
