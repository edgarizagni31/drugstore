<x-layouts.dashboard>

    <h1 class="text-3xl font-bold mb-4">Crear Nuevo Producto</h1>
    <form action="{{ route('products.store') }}" method="POST" class="space-y-4">
        @csrf
        
        <div class="form-control">
            <label for="name" class="label">
                <span class="label-text">Nombre</span>
            </label>
            <input type="text" id="name" name="name" class="input input-bordered w-full @error('name') border-red-500 @enderror" value="{{ old('name') }}" required>
            @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-control">
            <label for="unit_value" class="label">
                <span class="label-text">Valor Unitario</span>
            </label>
            <input type="number" id="unit_value" name="unit_value" class="input input-bordered w-full @error('unit_value') border-red-500 @enderror" value="{{ old('unit_value') }}" step="0.01" required>
            @error('unit_value')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-control">
            <label for="total_value" class="label">
                <span class="label-text">Valor Total</span>
            </label>
            <input type="number" id="total_value" name="total_value" class="input input-bordered w-full @error('total_value') border-red-500 @enderror" value="{{ old('total_value') }}" step="0.01" required>
            @error('total_value')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-control">
            <label for="quantity" class="label">
                <span class="label-text">Cantidad</span>
            </label>
            <input type="number" id="quantity" name="quantity" class="input input-bordered w-full @error('quantity') border-red-500 @enderror" value="{{ old('quantity') }}" step="0.01" required>
            @error('quantity')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-control">
            <label for="due_date" class="label">
                <span class="label-text">Fecha de Vencimiento</span>
            </label>
            <input type="date" id="due_date" name="due_date" class="input input-bordered w-full @error('due_date') border-red-500 @enderror" value="{{ old('due_date') }}" required>
            @error('due_date')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-control">
            <label for="supplier_id" class="label">
                <span class="label-text">Proveedor</span>
            </label>
            <select id="supplier_id" name="supplier_id" class="select select-bordered w-full @error('supplier_id') border-red-500 @enderror" required>
                @foreach ($suppliers as $supplier)
                    <option value="{{ $supplier->id }}" {{ old('supplier_id') == $supplier->id ? 'selected' : '' }}>
                        {{ $supplier->name }}
                    </option>
                @endforeach
            </select>
            @error('supplier_id')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-control">
            <label for="category_id" class="label">
                <span class="label-text">Categoría</span>
            </label>
            <select id="category_id" name="category_id" class="select select-bordered w-full @error('category_id') border-red-500 @enderror" required>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Crear</button>
    </form>

</x-layouts.dashboard>
