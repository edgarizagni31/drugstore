<x-layouts.dashboard>
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-2xl font-semibold mb-4">Detalles del Usuario</h1>
        <div class="mb-4">
            <strong>ID:</strong> {{ $user->id }}
        </div>
        <div class="mb-4">
            <strong>Nombre:</strong> {{ $user->name }}
        </div>
        <div class="mb-4">
            <strong>Email:</strong> {{ $user->email }}
        </div>
        <div class="mb-4">
            <strong>Rol:</strong> {{ $user->role->name }}
        </div>
        <a href="{{ route('users.index') }}" class="btn btn-secondary">Regresar</a>
    </div>
</x-layouts.dashboard>
