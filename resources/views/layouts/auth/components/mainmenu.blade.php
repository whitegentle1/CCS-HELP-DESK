<hr class="w-full text-white" />

<!-- Main Menu -->
<div class="px-2 mt-4 items-center font-mono whitespace-nowrap">
    <button
        class="flex items-center w-full text-white px-2 py-1 mt-5 space-x-6 hover:bg-blue-800"
    >
        <img
            src="{{ asset('assets/imgs/home.png') }}"
            alt=""
            class="h-12 flex-shrink-0"
        />
        <p>Home</p>
    </button>

    <button
        class="flex items-center w-full text-white px-2 py-1 mt-8 space-x-6 hover:bg-blue-800"
    >
        <img
            src="{{ asset('assets/imgs/chatbot.png') }}"
            alt=""
            class="h-12 flex-shrink-0"
        />
        <p>Chat-Bot</p>
    </button>

    <div class="group">
        <button
            class="flex items-center w-full text-white px-2 py-1 mt-8 space-x-6 hover:bg-blue-800"
        >
            <img
                src="{{ asset('assets/imgs/wallet.png') }}"
                alt=""
                class="h-12 flex-shrink-0"
            />
            <p>Payments</p>
        </button>

        <div class="flex-col hidden group-hover:flex">
            <button class="text-white w-full py-1 hover:bg-blue-800">
                <p class="text-left ml-12">Request</p>
            </button>

            <button class="text-white w-full py-1 hover:bg-blue-800">
                <p class="text-left ml-12">Transaction History</p>
            </button>
        </div>
    </div>

    <button
        class="flex items-center w-full text-white px-2 py-1 mt-8 space-x-6 hover:bg-blue-800"
    >
        <img
            src="{{ asset('assets/imgs/settings.png') }}"
            alt=""
            class="h-12 flex-shrink-0"
        />
        <p>Setting</p>
    </button>

    <button
        class="flex items-center w-full text-white px-2 py-1 mt-8 space-x-6 hover:bg-blue-800"
    >
        <img
            src="{{ asset('assets/imgs/question.png') }}"
            alt=""
            class="h-12 flex-shrink-0"
        />
        <p>Help</p>
    </button>
</div>
