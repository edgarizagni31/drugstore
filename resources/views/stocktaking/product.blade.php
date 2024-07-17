<x-layouts.dashboard>
    <header class="mb-4">

        <div class="flex items-center mb-4">
            <a href="{{ route('stocktaking.index') }}" class="btn btn-circle btn-sm btn-ghost mr-2">
                <i class="fa-solid fa-arrow-left"></i>
            </a>
            <h1 class="text-2xl text-stone-900 font-sans"> Registrar producto </h1>
        </div>

        <p class="text-base text-stone-800">
            Registra un producto, el codigo es generado automaticamente. La fecha de vencimiento debe indicarse solo mes y año
        </p>
    </header>

    <form class="mb-4">
        <div class="grid grid-cols-2 gap-4 mb-4">
            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text text-md">Medicamento</span>
                </div>
                <input type="text" placeholder="Medicamento" class="input input-bordered w-full" />
            </label>

            <label class="form-control w-full">
                <div class="label text-md">
                    <span class="label-text">Categoria</span>
                </div>
                <select class="select select-bordered">
                    <option disabled selected>Selecciona uno</option>
                    <option>Gorro</option>
                    <option>Categoria 2</option>
                    <option>Categoria 3</option>
                </select>

            </label>
        </div>

        <div class="grid grid-cols-2 gap-4 mb-4">
            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text  text-md">Valor unitario</span>
                </div>
                <input placeholder="@money(0)" class="input input-bordered w-full" type="number" />
            </label>

            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text  text-md">Valor total</span>
                </div>
                <input placeholder="@money(0)" class="input input-bordered w-full" type="number" />
            </label>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text  text-md">Fecha de vencimiento</span>
                </div>
                <input class="input input-bordered w-full" type="month" />
            </label>

            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text  text-md">Cantidad</span>
                </div>
                <input placeholder="0" value="1" class="input input-bordered w-full" type="number" />
            </label>
        </div>

    </form>


    <footer class="absolute bottom-[20px] left-[20px] right-[20px]">
        <a href="{{ route('stocktaking.index') }}" class="btn btn-primary text-lg w-full"> Registrar producto </a>
    </footer>

</x-layouts.dashboard>
