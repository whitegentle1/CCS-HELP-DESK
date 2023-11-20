<x-app-layout>
    <!-- component -->
    <div
        class="flex h-4/5 w-4/5 antialiased text-gray-800 justify-self-center self-center"
    >
        <div class="flex flex-row h-full w-full overflow-x-hidden">
            <div class="flex flex-col flex-auto h-full p-6">
                <div
                    class="flex flex-col flex-auto flex-shrink-0 rounded-2xl bg-gray-100 h-full p-4"
                >
                    <p class="font-bold mb-4 text-xl">Chat with DHVSU-Bot</p>
                    <div
                        class="flex flex-col-reverse h-full"
                        id="chat-container"
                    >
                        <!-- Reverse the order of messages -->
                        <div class="grid grid-cols-12 gap-y-2 form">
                            <!-- Receive message -->
                            <div class="col-start-1 col-end-8 p-3 rounded-lg">
                                <div class="flex flex-row items-center">
                                    <div
                                        class="flex items-center justify-center h-10 w-10 rounded-full bg-indigo-500 flex-shrink-0"
                                    >
                                        <img
                                            src="{{
                                                asset('assets/imgs/cb.png')
                                            }}"
                                            alt=""
                                        />
                                    </div>
                                    <div
                                        class="relative ml-3 text-sm bg-white py-2 px-4 shadow rounded-xl"
                                    >
                                        <div>
                                            Good day! How may I help you?<br />To
                                            check the list of main commands,
                                            chat <b>'help'</b>!
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Send message -->
                        </div>
                    </div>
                    <div
                        class="flex flex-row items-center h-16 rounded-xl bg-white w-full px-4"
                    >
                        <div class="flex-grow ml-4">
                            <div class="relative w-full">
                                <input
                                    type="text"
                                    id="data"
                                    class="flex w-full border rounded-xl focus:outline-none focus:border-indigo-300 pl-4 h-10"
                                    placeholder="Type something here.."
                                    required
                                />
                            </div>
                        </div>
                        <div class="ml-4">
                            <button
                                class="flex items-center justify-center bg-indigo-500 hover:bg-indigo-600 rounded-xl text-white px-4 py-1 flex-shrink-0"
                                id="send-btn"
                            >
                                <span>Send</span>
                                <span class="ml-2">
                                    <svg
                                        class="w-4 h-4 transform rotate-45 -mt-px"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"
                                        ></path>
                                    </svg>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--  -->

    <!--  -->
    <script>
        $(document).ready(function () {
            $("#send-btn").on("click", function () {
                $value = $("#data").val();
                if ($value.trim() === "") {
                    return;
                }
                $msg =
                    '<div class="col-start-6 col-end-13 p-3 rounded-lg"><div class="flex items-center justify-start flex-row-reverse"><div class="flex items-center justify-center h-10 w-10 rounded-full bg-indigo-500 flex-shrink-0"><img class="flex rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}"/></div><div class="relative mr-3 text-sm bg-indigo-100 py-2 px-4 shadow rounded-xl"><div>' +
                    $value +
                    "</div></div></div></div>";
                $("#chat-container .form").append($msg);
                $("#data").val("");

                $.ajax({
                    url: "/chatbot",
                    type: "POST",
                    data: "text=" + $value,
                    dataType: "json",
                    success: function (response) {
                        $replay =
                            '<div class="col-start-1 col-end-8 p-3 rounded-lg"><div class="flex flex-row items-center"><div class="flex items-center justify-center h-10 w-10 rounded-full bg-indigo-500 flex-shrink-0"><img src="{{ asset('assets/imgs/cb.png') }}" alt=""/></div><div class="relative ml-3 text-sm bg-white py-2 px-4 shadow rounded-xl"><div>' +
                            response.message +
                            "</div></div></div></div>";
                        $("#chat-container .form").append($replay);
                        $("#chat-container").scrollTop(
                            $("#chat-container")[0].scrollHeight
                        );
                    },
                });
            });

        });
    </script>
</x-app-layout>
