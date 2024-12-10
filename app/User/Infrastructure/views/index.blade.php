<x-layouts.dashboard title="Usuarios">
    <div class="container mx-auto px-4 py-6">
        <header class="flex items-center justify-between">
            <h1 class="text-2xl font-semibold mb-4">Usuarios</h1>
            <a href="{{ route('users.create') }}" class="btn btn-primary mb-4">Agregar Nuevo Usuario</a>
        </header>

        <table class="table w-full">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role->name }}</td>
                        <td>
                            <a href="{{ route('users.show', $user) }}" class="btn btn-info">Ver</a>
                            <a href="{{ route('users.edit', $user) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('users.destroy', $user) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-error">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layouts.dashboard>
