</html>
<!DOCTYPE html>
<html data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'Farmacia' }}</title>
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/gh/Loopple/loopple-public-assets@main/riva-dashboard-tailwind/riva-dashboard.css"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body class="bg-white">
    <div class="container flex flex-row mx-auto bg-white">
        <aside
            class="group/sidebar flex flex-col shrink-0 lg:w-[300px] w-[250px] transition-all duration-300 ease-in-out m-0 fixed z-40 inset-y-0 left-0 bg-white border-r border-r-dashed border-r-neutral-200 sidenav fixed-start loopple-fixed-start"
            id="sidenav-main">
            <div class="flex shrink-0 px-8 items-center justify-between h-[96px]">
                <a class="transition-colors duration-200 ease-in-out" href="https://www.loopple.com">
                    <img alt="Logo"
                        src="https://raw.githubusercontent.com/Loopple/loopple-public-assets/main/riva-dashboard-tailwind/img/logos/loopple.svg"
                        class="inline">
                </a>
            </div>

            <div class="hidden border-b border-dashed lg:block dark:border-neutral-700/70 border-neutral-200"></div>

            <div class="flex items-center justify-between px-8 py-5">
                <div class="flex items-center mr-5">
                    <div class="mr-5">
                        <div class="inline-block relative shrink-0 cursor-pointer rounded-[.95rem]">
                            <img class="w-[40px] h-[40px] shrink-0 inline-block rounded-[.95rem]"
                                src="https://ui-avatars.com/api/?background=c7d2fe&color=3730a3&bold=true&name={{ Auth::user()->name }}"
                                alt="avatar image">
                        </div>
                    </div>
                    <div class="mr-2 ">
                        <a href="javascript:void(0)"
                            class="dark:hover:text-primary hover:text-primary transition-colors duration-200 ease-in-out text-[1.075rem] font-medium dark:text-neutral-400/90 text-secondary-inverse">
                            {{ Auth::user()->name }}
                        </a>
                        <span class="text-secondary-dark dark:text-stone-500 font-medium block text-[0.85rem]">
                            {{ Auth::user()->role->name }}
                        </span>
                    </div>
                </div>
            </div>

            <div class="hidden border-b border-dashed lg:block dark:border-neutral-700/70 border-neutral-200"></div>

            <div class="relative pl-3 my-5 overflow-y-scroll">
                <div class="flex flex-col w-full font-medium">

                    @foreach (config('sidebar.items') as $item)
                        @hasPermissionsTo($item['roles'])
                            <x-layouts.sidebar-item :route="route($item['route'])" :label="$item['label']" :type="$item['type']" />
                        @endhasPermissionsTo
                    @endforeach


                    <div>
                        <form action="{{ route('logout') }}" method="POST"
                            class="select-none flex items-center px-4 py-[.775rem] cursor-pointer my-[.4rem] rounded-[.95rem]">
                            @csrf
                            <button type="submit"
                                class="flex items-center flex-grow text-[1.15rem] dark:text-neutral-400/75 text-stone-500 hover:text-dark">
                                Cerrar sessión </button>
                        </form>
                    </div>
                </div>
            </div>

        </aside>


        <div class="absolute lg:left-[300px] left-[250px] top-0 bottom-0 right-0 p-4">
            {{ $slot }}
        </div>

    </div>

</body>
<html>
