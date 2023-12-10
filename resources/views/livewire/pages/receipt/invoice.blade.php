<div class="w-full rounded-lg bg-blue-600/70 px-6 md:px-10 dark:bg-blue-950/70">
    {{-- invoice --}}
    <div class="ml-10 mt-9 mb-3">
        <h1 class="text-3xl font-bold text-blue-800">PAYMENT RECEIPT</h1>
        <h2 class="text-2xl font-bold mt-3 ml-5 text-blue-500">INVOICE:</h2>
    </div>
    <div class="flex columns-2">
        <div class="ml-20 text-xl leading-relaxed text-white">
            <p>NAME OF STUDENT</p>
            <p>STUDENT NUMBER</p>
            <p>YEAR AND SECTION</p>
            <p>DATE OF TRANSACTION</p>
            <p class="mb-10">PAYMENT METHOD</p>
            <p>REQUESTED DOCUMENT</p>
            <p>NUMBER OF COPIES</p>
            <p class="font-bold">TOTAL AMOUNT</p>
        </div>
        <div class="ml-96 text-xl font-bold leading-relaxed text-left text-white">
            <span class="text-white" x-data="{ capitalize: function(value) { return value.charAt(0).toUpperCase() + value.slice(1); } }">
                <table>
                    <tr>
                        <td class="text-xl text-gray-800 dark:text-gray-200" x-data="{ firstname: '{{ ucfirst(auth()->user()->firstname) }}' }"
                            x-text="capitalize(firstname)"
                            x-on:profile-updated.window="firstname = capitalize($event.detail.firstname)"></td>
                        @if (Auth::user()->middlename)
                            <td class="text-xl text-gray-800 dark:text-gray-200" x-data="{ middlename: '{{ ucfirst(substr(auth()->user()->middlename, 0, 1)) }}.' }"
                                x-text="middlename"
                                x-on:profile-updated.window="middlename = $event.detail.middlename ? capitalize($event.detail.middlename[0]) + '.' : ''">
                            </td>
                        @endif

                        <td class="text-xl text-gray-800 dark:text-gray-200" x-data="{ lastname: '{{ ucfirst(auth()->user()->lastname) }}' }"
                            x-text="capitalize(lastname)"
                            x-on:profile-updated.window="lastname = capitalize($event.detail.lastname)"></td>
                    </tr>
                </table>
            </span>
            <p>
                {{ substr(Auth::user()->email, 0, strpos(Auth::user()->email, '@')) }}
            </p>

            <p>{{ Auth::user()->section }}</p>
            <p>{{ $invoice->transaction_date }}</p>
            <p class="mb-10">{{ $invoice->payment_method }}</p>
            <p>{{ $invoice->document }}</p>
            <p>{{ $invoice->no_copy }}</p>
            <p class="mb-10">{{ $invoice->amount }}</p>
        </div>
    </div>
</div>
