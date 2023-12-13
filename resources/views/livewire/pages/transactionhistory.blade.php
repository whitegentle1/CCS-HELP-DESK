<div class=" w-auto lg:w-[82.5rem] 3xl:w-[107rem] rounded-lg bg-blue-600/70 px-6 md:px-10 dark:bg-blue-950/70">
    <div class="ml-3 my-9 text-3xl lg:text-[40px] 3xl:text-[45px] font-bold text-blue-700">
        <h1>TRANSACTION HISTORY</h1>
    </div>
    <div class="flex columns-2 ml-5 text-[18px] lg:text-[25px] lg:leading-[30px] 3xl:text-[30px] 3xl:leading-[40px]">
        <div>
            <p class="text-blue-500">NAME OF STUDENT</p>
            <p class="text-blue-500">STUDENT NUMBER</p>
            <p class="text-blue-500">YEAR AND SECTION</p>
        </div>
        <div class="font-bold">
            <p class="text-white">
                {{ substr(Auth::user()->email, 0, strpos(Auth::user()->email, '@')) }}
            </p>
            <span
                class="text-white"
                x-data="{ capitalize: function(value) { return value.charAt(0).toUpperCase() + value.slice(1); } }"
            >
                <table>
                    <tr>
                        <td
                        class=" text-gray-800 dark:text-gray-200 text-[20px] w-auto lg:text-[25px] lg:leading-[30px] 3xl:text-[30px] 3xl:leading-[40px]"
                            x-data="{ firstname: '{{ ucfirst(auth()->user()->firstname) }}' }"
                            x-text="capitalize(firstname)"
                            x-on:profile-updated.window="firstname = capitalize($event.detail.firstname)"
                        ></td>
                        @if (Auth::user()->middlename)
                        <td>&nbsp;</td>
                        <td
                        class=" text-gray-800 dark:text-gray-200 text-[20px] w-auto lg:text-[25px] lg:leading-[30px] 3xl:text-[30px] 3xl:leading-[40px]"
                            x-data="{ middlename: '{{ ucfirst(substr(auth()->user()->middlename, 0, 1)) }}.' }"
                            x-text="middlename"
                            x-on:profile-updated.window="middlename = $event.detail.middlename ? capitalize($event.detail.middlename[0]) + '.' : ''"
                        ></td>
                        @endif
                        <td>&nbsp;</td>
                        <td
                        class=" text-gray-800 dark:text-gray-200  text-[20px] w-auto lg:text-[25px] lg:leading-[30px] 3xl:text-[30px] 3xl:leading-[40px]"
                            x-data="{ lastname: '{{ ucfirst(auth()->user()->lastname) }}' }"
                            x-text="capitalize(lastname)"
                            x-on:profile-updated.window="lastname = capitalize($event.detail.lastname)"
                        ></td>
                    </tr>
                </table>
            </span>
            <p class="text-white">{{ Auth::user()->section }}</p>
        </div>
    </div>

    <table class="mt-10 mb-10 w-auto text-[14px] text-white lg:w-[78rem] lg:text-[25px] 3xl:w-[102rem] 3xl:text-[30px]">
        <!-- Table header -->
        <thead>
            <tr class="border-2 border-black">
                <th class="p-2 border-2 lg:p-4 3xl:p-5 lg:border-4 3xl:border-4 text-center border-black">#</th>
                <th class="p-2 border-2 lg:p-4 3xl:p-5 lg:border-4 3xl:border-4 text-center border-black">DATE</th>
                <th class="p-2 border-2 lg:p-4 3xl:p-5 lg:border-4 3xl:border-4 text-center border-black">DOCUMENT</th>
                <th class="p-2 border-2 lg:p-4 3xl:p-5 lg:border-4 3xl:border-4 text-center border-black">AMOUNT</th>
                <th class="p-2 border-2 lg:p-4 3xl:p-5 lg:border-4 3xl:border-4 text-center border-black">STATUS</th>
                <th class="p-2 border-2 lg:p-4 3xl:p-5 lg:border-4 3xl:border-4 text-center border-black">RECEIPT</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transactionHistory as $item)
            <tr class="border-4 border-black">
                {{-- ID --}}
                <td class="p-10 text-center border-4 border-black">
                    {{ $item->id }}
                </td>
                {{-- DATE --}}
                <td class="p-10 text-center border-4 border-black">
                    {{ $item->transaction_date }}
                </td>
                {{-- DOCUMENT --}}
                <td class="p-10 text-center border-4 border-black">
                    {{ $item->document }}
                </td>
                {{-- AMOUNT --}}
                <td class="p-10 text-center border-4 border-black">
                    {{ $item->amount }}
                </td>
                {{-- STATUS --}}
                <td class="p-10 text-center border-4 border-black">
                    {{ $item->status }}
                </td>
                {{-- RECEIPT --}}
                <td class="p-10 text-center text-blue-700">
                    <a wire:navigate href="/invoice?page={{$item->id}}" class="cursor-pointer"><u>VIEW RECEIPT</u></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $transactionHistory->links() }}
</div>
