<hr class="w-full text-white" />

<!-- Main Menu -->
<div
    class="px-2 mt-4 items-center font-mono whitespace-nowrap transition-all duration-200"
>
    <button
        class="flex items-center w-full text-white px-2 py-1 mt-5 space-x-6 hover:bg-blue-800"
    >
        <img
            src="{{ asset('assets/imgs/home.png') }}"
            alt=""
            class="h-12 flex-shrink-0"
        />
        <p class="group-hover:block hidden transition-all duration-200">Home</p>
    </button>

    <button
        class="flex items-center w-full text-white px-2 py-1 mt-8 space-x-6 hover:bg-blue-800"
    >
        <img
            src="{{ asset('assets/imgs/chatbot.png') }}"
            alt=""
            class="h-12 flex-shrink-0"
        />
        <p class="group-hover:block hidden transition-all duration-200">
            Chat-Bot
        </p>
    </button>

    <div class="group">
        <!-- Payments button -->
        <button
            class="flex items-center w-full text-white px-2 py-1 mt-8 space-x-6 hover:bg-blue-800"
        >
            <img
                src="{{ asset('assets/imgs/wallet.png') }}"
                alt=""
                class="h-12 flex-shrink-0"
            />
            <p class="group-hover:block hidden transition-all duration-200">
                Payments
            </p>
        </button>

        <!-- Dropdown for Request and Transaction History -->
        <div class="flex-col group-hover:flex hidden">
            <!-- Request button -->
            <button class="text-white w-full py-1 hover:bg-blue-800">
                <p class="text-left ml-12">Request</p>
            </button>

            <!-- Transaction History button -->
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
        <p class="group-hover:block hidden transition-all duration-200">
            Setting
        </p>
    </button>

    <button
        class="flex items-center w-full text-white px-2 py-1 mt-8 space-x-6 hover:bg-blue-800"
    >
        <img
            src="{{ asset('assets/imgs/question.png') }}"
            alt=""
            class="h-12 flex-shrink-0"
        />
        <p class="group-hover:block hidden transition-all duration-200">Help</p>
    </button>
</div>
