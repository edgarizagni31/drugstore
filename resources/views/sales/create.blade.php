<x-layouts.dashboard>

    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-4">Registrar Venta</h1>

        @if (session('success'))
            <div class="mb-4 p-4 bg-green-200 text-green-800 rounded">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('sales.store') }}" method="POST" class="space-y-4">
            @csrf

            <div id="tickets-container">
                <div class="ticket-entry mb-4 p-4 border border-gray-300 rounded">
                    <div class="form-control">
                        <label for="product_id" class="label">
                            <span class="label-text">Producto</span>
                        </label>
                        <select name="tickets[0][product_id]"
                            class="input input-bordered w-full @error('tickets.*.product_id') border-red-500 @enderror"
                            required onchange="updateUnitValue(this)">
                            <option value="">Selecciona un producto</option>
                            @foreach ($products as $product)
                                <option value="{{ $product->id }}" data-unit-value="{{ $product->unit_value }}">
                                    {{ $product->name }}</option>
                            @endforeach
                        </select>
                        @error('tickets.*.product_id')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-control">
                        <label for="quantity" class="label">
                            <span class="label-text">Cantidad</span>
                        </label>
                        <input type="number" name="tickets[0][quantity]"
                            class="input input-bordered w-full @error('tickets.*.quantity') border-red-500 @enderror"
                            step="1" min="1" required>
                        @error('tickets.*.quantity')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-control">
                        <label for="unit_value" class="label">
                            <span class="label-text">Valor Unitario</span>
                        </label>
                        <input type="number" name="tickets[0][unit_value]"
                            class="input input-bordered w-full @error('tickets.*.unit_value') border-red-500 @enderror"
                            step="0.01" min="0" readonly>
                        @error('tickets.*.unit_value')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <button type="button" id="add-ticket" class="btn btn-secondary">Agregar Ticket</button>
            <button type="submit" class="btn btn-primary">Registrar Venta</button>
        </form>
    </div>

    <script>
        let ticketCount = 1;

        function updateUnitValue(selectElement) {
            const unitValueInput = selectElement.closest('.ticket-entry').querySelector('input[name$="[unit_value]"]');
            const selectedOption = selectElement.options[selectElement.selectedIndex];
            unitValueInput.value = selectedOption.getAttribute('data-unit-value') || '';
        }

        document.getElementById('add-ticket').addEventListener('click', function() {
            const container = document.getElementById('tickets-container');
            const newTicket = document.createElement('div');
            newTicket.classList.add('ticket-entry', 'mb-4', 'p-4', 'border', 'border-gray-300', 'rounded');
            newTicket.innerHTML = `
                <div class="form-control">
                    <label for="product_id" class="label">
                        <span class="label-text">Producto</span>
                    </label>
                    <select name="tickets[${ticketCount}][product_id]" class="input input-bordered w-full" required onchange="updateUnitValue(this)">
                        <option value="">Selecciona un producto</option>
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}" data-unit-value="{{ $product->unit_value }}">{{ $product->name }}</option>
                        @endforeach
                    </select>
                </div>
    
                <div class="form-control">
                    <label for="quantity" class="label">
                        <span class="label-text">Cantidad</span>
                    </label>
                    <input type="number" name="tickets[${ticketCount}][quantity]" class="input input-bordered w-full" step="1" min="1" required>
                </div>
    
                <div class="form-control">
                    <label for="unit_value" class="label">
                        <span class="label-text">Valor Unitario</span>
                    </label>
                    <input type="number" name="tickets[${ticketCount}][unit_value]" class="input input-bordered w-full" readonly>
                </div>
            `;
            container.appendChild(newTicket);
            ticketCount++;
        });
    </script>

</x-layouts.dashboard>
