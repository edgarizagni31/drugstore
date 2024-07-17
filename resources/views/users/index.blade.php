<x-layouts.dashboard title="Usuarios">
    <header class="mb-4">
        <div class="flex justify-between items-center">
            <h1 class="text-2xl text-stone-900 mb-4 font-sans"> Usuarios </h1>

            <button class="btn btn-primary">Crear</button>
        </div>

        <p class="text-base text-stone-800">
            Una lista de todos los usuarios de su cuenta, incluido su nombre, cargo y correo electrónico.
        </p>
    </header>

    <table>
        <div class="overflow-x-auto">
            <table class="table">
                <thead class="text-base">
                    <tr class="text-stone-400">
                        <th>Nombre</th>
                        <th>Rol</th>
                        <th>Email</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($users as $user)
                        <tr class="text-base">
                            <td>
                                <div class="flex items-center gap-3">
                                    <div class="avatar">
                                        <div class="mask mask-squircle h-12 w-12">
                                            <img src="https://ui-avatars.com/api/?background=c7d2fe&color=3730a3&bold=true&name={{ $user->name }}"
                                                alt="Avatar Tailwind CSS Component" />
                                        </div>
                                    </div>
                                    <div>
                                        <p class="text-stone-900"> {{ $user->name }} </p>
                                    </div>
                                </div>
                            </td>
                            <td class="text-stone-900">
                                {{ $user->role->name }}
                            </td>
                            <td class="text-stone-900">{{ $user->email }}</td>
                            <th class="text-stone-900">
                                <button class="btn btn-ghost btn-sm text-green-700">Editar</button>
                            </th>
                        </tr>
                    @endforeach


                </tbody>

            </table>
        </div>
    </table>
</x-layouts.dashboard>
