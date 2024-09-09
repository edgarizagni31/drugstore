<x-layouts.dashboard>
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-2xl font-semibold mb-4">Editar Usuario</h1>
        <form action="{{ route('users.update', $user) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-control mb-4">
                <label for="name" class="label">
                    <span class="label-text">Nombre</span>
                </label>
                <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}"
                    class="input input-bordered">
                @error('name')
                    <p class="text-error text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-control mb-4">
                <label for="email" class="label">
                    <span class="label-text">Email</span>
                </label>
                <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}"
                    class="input input-bordered">
                @error('email')
                    <p class="text-error text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-control mb-4">
                <label for="password" class="label">
                    <span class="label-text">Contraseña (dejar en blanco para no cambiar)</span>
                </label>
                <input type="password" name="password" id="password" class="input input-bordered">
                @error('password')
                    <p class="text-error text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-control mb-4">
                <label for="password_confirmation" class="label">
                    <span class="label-text">Confirmar Contraseña</span>
                </label>
                <input type="password" name="password_confirmation" id="password_confirmation"
                    class="input input-bordered">
            </div>
            <div class="form-control mb-4">
                <label for="role_id" class="label">
                    <span class="label-text">Rol</span>
                </label>
                <select name="role_id" id="role_id" class="select select-bordered">
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}" {{ $role->id == $user->role_id ? 'selected' : '' }}>
                            {{ $role->name }}</option>
                    @endforeach
                </select>
                @error('role_id')
                    <p class="text-error text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
</x-layouts.dashboard>
