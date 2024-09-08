<x-layouts.dashboard>
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-4">Abrir Caja</h1>



        <form action="{{ route('reports.store') }}" method="POST" class="space-y-4">
            @csrf

            <div class="form-control">
                <label for="initial_balance" class="label">
                    <span class="label-text">Balance Inicial</span>
                </label>
                <input type="number" id="initial_balance" name="initial_balance"
                    class="input input-bordered w-full @error('initial_balance') border-red-500 @enderror"
                    value="{{ old('initial_balance') }}" step="0.01" required>
                @error('initial_balance')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary w-full">Abrir Caja</button>
        </form>
    </div>
</x-layouts.dashboard>
