<x-layouts.dashboard>
    <div class="container mx-auto px-4 py-6">
        <header class="w-full flex items-center justify-between">
            <h1 class="text-2xl font-semibold mb-4">Roles</h1>
            <a href="{{ route('roles.create') }}" class="btn btn-primary mb-4">Agregar Nuevo Rol</a>
        </header>

        <table class="table w-full">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">ID</th>
                    <th class="py-2 px-4 border-b">Nombre</th>
                    <th class="py-2 px-4 border-b">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                    <tr>
                        <td class="py-2 px-4 border-b">{{ $role->id }}</td>
                        <td class="py-2 px-4 border-b">{{ $role->name }}</td>
                        <td class="py-2 px-4 border-b">
                            <a href="{{ route('roles.show', $role) }}" class="btn btn-info">Ver</a>
                            <a href="{{ route('roles.edit', $role) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('roles.destroy', $role) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layouts.dashboard>
