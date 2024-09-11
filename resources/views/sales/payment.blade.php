<x-layouts.dashboard>
    <div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-lg">
        <h1 class="text-2xl font-semibold mb-4">Registrar Pago</h1>

        <p class="text-md mb-4 font-bold"> Monto a pagar {{$sale->event_data['amount']}} </p>

        <form action="{{ route('payment.store', $sale->id) }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="payment_method" class="block text-sm font-medium text-gray-700">Metodo de Pago:</label>
                <select id="payment_method" name="payment_method" onchange="toggleEfectivoField()"
                    class="select select-bordered w-full max-w-xs mt-1" required>
                    <option value="">Seleccione una opción</option>
                    <option value="YAPE">YAPE</option>
                    <option value="EFECTIVO">EFECTIVO</option>
                </select>
            </div>

            <div id="cash_amount_field" class="hidden mb-4">
                <label for="cash_amount" class="block text-sm font-medium text-gray-700">Monto Entregado:</label>
                <input type="number" id="cash_amount" name="cash_amount" step="0.01" min="0"
                    placeholder="Ingrese monto entregado" class="input input-bordered w-full mt-1" />
            </div>

            <button type="submit" class="btn btn-primary">Registrar Pago</button>
        </form>
    </div>


    <script defer>
        function toggleEfectivoField() {
            const payment_method = document.getElementById('payment_method').value;
            const montoField = document.getElementById('cash_amount_field');

            if (payment_method === 'EFECTIVO') {
                montoField.classList.remove('hidden');
            } else {
                montoField.classList.add('hidden');
            }
        }
    </script>
</x-layouts.dashboard>
