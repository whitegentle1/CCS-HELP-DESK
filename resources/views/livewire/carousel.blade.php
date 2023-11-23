<div
    class="m-10 relative max-w-auto flex flex-1 rounded-md align-center items-center justify-center"
>
    <div class="w-auto h-auto relative">
        <img
            src="{{ asset($imagePath.$images[$currentIndex]) }}"
            alt="Slide"
            class="w-full h-[40vh] sm:h-[45vh] md:h-[50vh] lg:h-[60vh] rounded-lg"
        />
        <div class="absolute inset-0 flex items-center justify-between px-4">
            <button
                wire:click="prev"
                class="p-1 bg-slate-500/10 text-3xl text-white border-[none] cursor-pointer rounded-full transition ease-in-out hover:-translate-x-1 hover:scale-110 z-10"
            >
                &lt;
            </button>
            <button
                wire:click="next"
                class="p-1 bg-slate-500/10 text-3xl text-white border-[none] cursor-pointer rounded-full transition ease-in-out hover:translate-x-1 hover:scale-110 z-10"
            >
                &gt;
            </button>
        </div>
    </div>
</div>
