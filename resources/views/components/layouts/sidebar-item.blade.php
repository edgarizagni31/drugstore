@if ($type == 'item')
    <div>
        <span class="select-none flex items-center px-4 py-[.775rem] cursor-pointer my-[.4rem] rounded-[.95rem]">
            <a href="{{ $route }}"
                class="flex items-center flex-grow text-[1.15rem] dark:text-neutral-400/75 text-stone-500 hover:text-dark">{{ $label }}</a>
        </span>
    </div>
@endif

@if ($type == 'principal')
    <div class="block pt-5 pb-[.15rem]">
        <div class="px-4 py-[.65rem]">
            <span
                class="font-semibold text-[0.95rem] uppercase dark:text-neutral-500/80 text-secondary-dark">{{ $label }}</span>
        </div>
    </div>
@endif
