<div class=" w-[22.6rem] lg:w-[83rem] 3xl:w-[103rem]">
    <form wire:submit="submitRequest">
        <div class="ml-3 my-5 lg:my-10 w-auto lg:text-[40px] 3xl:text-[45px] text-[1.7rem] font-bold text-blue-800">
            <h1>REQUEST AND PAYMENT INFORMATION</h1>
        </div>

        <div class="flex justify-center mb-10 leading-[3rem] w-auto lg:w-[83rem] 3xl:w-[100rem] font-bold">
            <div>
                <div>
                    <x-input-label for="firstname" :value="__('Full name')" />
                    <x-text-input
                        wire:model="fullname"
                        id="fullname"
                        name="fullname"
                        type="text"
                        class="w-[11rem] lg:w-[25rem] 3xl:w-[30rem] mr-[1rem] text-[1rem] lg:text-[1.5rem] 3xl:text-[2rem] rounded-md border py-2 pl-3 focus:border-blue-500 focus:outline-none"
                        readonly
                        :value="auth()->user()->firstname . ' ' . (auth()->user()->middlename ? auth()->user()->middlename . ' ' : '') . auth()->user()->lastname"
                    />
                </div>

                <div>
                    <x-input-label
                        for="firstname"
                        :value="__('Student Number')"
                    />
                    <x-text-input
                        wire:model="student_id"
                        id="student_id"
                        name="student_id"
                        type="text"
                        class="w-[11rem] lg:w-[25rem] 3xl:w-[30rem] text-[1rem] lg:text-[1.5rem] 3xl:text-[2rem] rounded-md border py-2 pl-3 focus:border-blue-500 focus:outline-none"
                        readonly
                        :value="substr(Auth::user()->email, 0, strpos(Auth::user()->email, '@'))"
                    />
                </div>

                <div>
                    <x-input-label
                        for="firstname"
                        :value="__('Year and Section')"
                    />
                    <x-text-input
                        wire:model="year_section"
                        id="year_section"
                        name=""
                        type="text"
                        class="w-[11rem] lg:w-[25rem] 3xl:w-[30rem] text-[1rem] lg:text-[1.5rem] 3xl:text-[2rem] rounded-md border py-2 pl-3 focus:border-blue-500 focus:outline-none"
                        readonly
                    />
                </div>
            </div>

            <div>
                <div>
                    <x-input-label
                        for="document"
                        :value="__('Select Request Document')"
                    />
                    <select
                        wire:model="document"
                        name="document"
                        class="text-[0.8rem] lg:text-[1.41rem] 3xl:text-[1.4rem] w-[13rem] lg:w-[30rem] 3xl:w-[30rem] ml-[-0.7rem] py-[0.51rem] lg:py-[0.67rem] 3xl:py-[0.95rem] pl-3 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                        wire:change="updateFormValues"
                    >
                        @foreach($doctype as $doctypeOptions)
                        <option value="{{ $doctypeOptions }}">
                            {{ $doctypeOptions }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <x-input-label
                        for="no_copy"
                        :value="__('Number of Copies')"
                    />
                    <select
                        wire:model="no_copy"
                        name="no_copy"
                        class="text-[1rem] lg:text-[1.5rem] 3xl:text-[1.4rem] w-[13rem] lg:w-[30rem] 3xl:w-[30rem] ml-[-0.7rem] py-[0.51rem] lg:py-[0.67rem] 3xl:py-[0.95rem] pl-3 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                        wire:change="updateFormValues"
                    >
                        @foreach($copy as $copyOptions)
                        <option value="{{ $copyOptions }}">
                            {{ $copyOptions }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <x-input-label
                        for="payment_method"
                        :value="__('Payment Method')"
                    />
                    <select
                        wire:model="payment_method"
                        name="payment_method"
                        class="text-[1rem] lg:text-[1.5rem] 3xl:text-[1.4rem] w-[13rem] lg:w-[30rem] 3xl:w-[30rem] ml-[-0.7rem] py-[0.51rem] lg:py-[0.67rem] 3xl:py-[0.95rem] pl-3 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                        wire:change="updateFormValues"
                    >
                        @foreach($method as $methodOptions)
                        <option value="{{ $methodOptions }}">
                            {{ $methodOptions }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        {{-- invoice --}}
        <div class="flex-grow border-t-2 border-dashed border-blue-500"></div>
        <div class="ml-3 mt-5 mb-2">
            <h1 class="text-[1.7rem] lg:text-[2rem] 3xl:text-[2.1rem] font-bold text-blue-800">PAYMENT RECEIPT</h1>
            <h2 class="text-[1.5rem] lg:text-[1.7rem] 3xl:text-[1.8rem] font-bold mt-1 text-blue-500">INVOICE TO:</h2>
        </div>
        <div class="flex columns-auto gap-">
            <div class=" text-xl lg:text-2xl 3xl:text-3xl leading-relaxed text-white">
                <p>NAME OF STUDENT</p>
                <p>STUDENT NUMBER</p>
                <p>YEAR AND SECTION</p>
                <p class="mb-10">PAYMENT METHOD</p>
                <p>SELECT REQUEST DOCUMENT</p>
                <p>HOW MANY COPIES</p>
                <p class="font-bold">AMOUNT</p>
            </div>
            <div
                class=" text-center lg:text-left lg:ml-80 3xl:ml-96 text-xl lg:text-2xl 3xl:text-3xl font-bold leading-relaxed text-white"
            >
                <span
                    class="text-white"
                    x-data="{ capitalize: function(value) { return value.charAt(0).toUpperCase() + value.slice(1); } }"
                >
                    <table class="text-center">
                        <tr class="text-center">
                            <td
                                class="text-xl text-gray-800 dark:text-gray-200"
                                x-data="{ firstname: '{{ ucfirst(auth()->user()->firstname) }}' }"
                                x-text="capitalize(firstname)"
                                x-on:profile-updated.window="firstname = capitalize($event.detail.firstname)"
                            ></td>
                            @if (Auth::user()->middlename)
                            <td
                                class="text-xl text-gray-800 dark:text-gray-200"
                                x-data="{ middlename: '{{ ucfirst(substr(auth()->user()->middlename, 0, 1)) }}.' }"
                                x-text="middlename"
                                x-on:profile-updated.window="middlename = $event.detail.middlename ? capitalize($event.detail.middlename[0]) + '.' : ''"
                            ></td>
                            @endif

                            <td
                                class="text-xl text-gray-800 dark:text-gray-200"
                                x-data="{ lastname: '{{ ucfirst(auth()->user()->lastname) }}' }"
                                x-text="capitalize(lastname)"
                                x-on:profile-updated.window="lastname = capitalize($event.detail.lastname)"
                            ></td>
                        </tr>
                    </table>
                </span>
                <p>
                    {{ substr(Auth::user()->email, 0, strpos(Auth::user()->email, '@')) }}
                </p>
                <!-- pending -->
                <p>{{Auth::user()->section}}</p>
                <p class="mb-10">{{ $payment_method }}</p>
                <p>{{ $document }}</p>
                <p>{{ $no_copy }}</p>
                <p>{{ $amount }}</p>
            </div>
        </div>
        <div class="mt-5 lg:ml-[80%] 3xl:[80%]">
            <div class="flex justify-center">
                <x-primary-button
                    class="mb-5 h-14 lg:h-14 3xl:h-14 text-white text-xl font-bold rounded-full px-5 cursor-pointer bg-indigo-900 hover:bg-indigo-950"
                >
                    PROCEED
                </x-primary-button>
                <x-action-message class="me-3" on="request_submitted">
                    {{ __("Request Submitted") }}
                </x-action-message>
            </div>
        </div>
    </form>
</div>
