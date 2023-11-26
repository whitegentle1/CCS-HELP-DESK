<button {{ $attributes->
    merge(['type' => 'submit', 'class' => 'mb-1.5 block w-full transform
    rounded-md bg-blue-800 px-2 py-1.5 text-center text-white transition
    duration-200 ease-in hover:-translate-y-1 hover:border-transparent
    hover:bg-blue-600 hover:text-black active:translate-y-0 dark:bg-blue-500
    dark:text-white-900']) }}>
    {{ $slot }}
</button>
