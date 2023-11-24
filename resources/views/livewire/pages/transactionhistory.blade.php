<x-app-layout>
    <div
        class="w-full rounded-lg bg-blue-600/70 px-6 md:px-10 dark:bg-blue-950/70"
    >
        <div>
            <div>
                <div class="ml-10 my-9 text-3xl font-bold text-blue-800">
                    <h1>TRANSACTION HISTORY</h1>
                </div>
                <div class="flex columns-2">
                    <div class="ml-20 text-xl">
                        <p>NAME OF STUDENT</p>
                        <p>STUDENT NUMBER</p>
                        <p>YEAR AND SECTION</p>
                    </div>
                    <div class="ml-20 text-xl font-bold">
                        <p>2020112385</p>
                        <p>CYLIE GONZALES</p>
                        <p>3A</p>
                    </div>
                </div>
                <table class="mt-12 w-[91%] ml-20 h-10 text-2xl">
                    <tr class="border-4 border-black">
                        <th class="p-10 text-center border-4 border-black">
                            DATE
                        </th>
                        <th class="p-10 text-center border-4 border-black">
                            REQUEST
                        </th>
                        <th class="p-10 text-center border-4 border-black">
                            AMOUNT
                        </th>
                        <th class="p-10 text-center border">RECEIPT</th>
                    </tr>
                    <tr class="border-4 border-black">
                        <td class="p-10 text-center border-4 border-black">
                            12/11/2023
                        </td>
                        <td class="p-10 text-center border-4 border-black">
                            CERTIFICATE OF GRADES
                        </td>
                        <td class="p-10 text-center border-4 border-black">
                            200
                        </td>
                        <td class="p-10 text-center text-blue-700">
                            <u href="#" class="cursor-pointer">VIEW RECEIPT</u>
                        </td>
                    </tr>
                    <tr class="border-4 border-black">
                        <td class="p-10 text-center border-4 border-black">
                            19/12/2023
                        </td>
                        <td class="p-10 text-center border-4 border-black">
                            CERTIFICATE OF ENROLLMENT
                        </td>
                        <td class="p-10 text-center border-4 border-black">
                            100
                        </td>
                        <td class="p-10 text-center text-blue-700">
                            <u href="#" class="cursor-pointer">VIEW RECEIPT</u>
                        </td>
                    </tr>
                    <tr class="border-4 border-black">
                        <td class="p-10 text-center border-4 border-black">
                            19/01/2024
                        </td>
                        <td class="p-10 text-center border-4 border-black">
                            CCERTIFICATE OF ENROLLED
                        </td>
                        <td class="p-10 text-center border-4 border-black">
                            100
                        </td>
                        <td class="p-10 text-center text-blue-700">
                            <u href="#" class="cursor-pointer">VIEW RECEIPT</u>
                        </td>
                    </tr>
                </table>
                <div class="mt-10 ml-[80%]">
                    <button
                        type="button"
                        class="text-white text-xl font-bold rounded-full py-2 px-12 cursor-pointer bg-indigo-900 hover:bg-indigo-950"
                    >
                        CONTINUE
                    </button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
