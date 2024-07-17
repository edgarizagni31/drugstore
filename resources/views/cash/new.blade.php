<x-layouts.dashboard>
    <header class="mb-4">

        <div class="flex items-center mb-4">
            <a href="{{ route('cash.index') }}" class="btn btn-circle btn-sm btn-ghost mr-2">
                <i class="fa-solid fa-arrow-left"></i>
            </a>
            <h1 class="text-2xl text-stone-900 font-sans"> Registrar pago </h1>
        </div>

        <p class="text-base text-stone-800">
            Indica el DNI del cliente. Si el metodo de pago no es efectivo no sera obligatorio ingresar el monto
            recibido.
        </p>
    </header>

    <form class="mb-4">
        <div class="grid grid-cols-2 gap-4 mb-4">
            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text text-md">D.N.I</span>
                </div>
                <input type="text" placeholder="D.N.I" class="input input-bordered w-full" />
            </label>

            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text  text-md">Monto a Pagar</span>
                </div>
                <input type="text" placeholder="" value="@money(35)" class="input input-bordered w-full"
                    disabled />
            </label>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <label class="form-control w-full">
                <div class="label text-md">
                    <span class="label-text">Metodo de pago</span>
                </div>
                <select class="select select-bordered">
                    <option disabled selected>Selecciona uno</option>
                    <option>YAPE/PLIN</option>
                    <option>Transferencia</option>
                    <option>Efectivo</option>
                </select>

            </label>
        </div>

    </form>


    <footer class="absolute bottom-[20px] left-[20px] right-[20px]">
        <a href="{{ route('cash.index') }}" class="btn btn-primary text-lg w-full"> Registrar pago </a>
    </footer>

</x-layouts.dashboard>
