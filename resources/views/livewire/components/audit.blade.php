<div class="min-h-auto flex flex-col justify-center items-center">
    Activity Log
    <table class="border-collapse border border-gray-400 mt-4">
        <thead>
            <tr>
                <th class="border border-gray-400 p-2">Activity</th>
                <th class="border border-gray-400 p-2">Date</th>
                <th class="border border-gray-400 p-2">Browser</th>
                <th class="border border-gray-400 p-2">IP</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="border border-gray-400 p-2">Login</td>
                <td class="border border-gray-400 p-2">2023-11-24 08:30:00</td>
                <td class="border border-gray-400 p-2">
                    {{ $_SERVER["HTTP_USER_AGENT"] }}
                </td>
                <td class="border border-gray-400 p-2">192.168.1.1</td>
            </tr>
            <tr>
                <td class="border border-gray-400 p-2">Logout</td>
                <td class="border border-gray-400 p-2">2023-11-24 18:45:00</td>
                <td class="border border-gray-400 p-2">
                    {{ $_SERVER["HTTP_USER_AGENT"] }}
                </td>
                <td class="border border-gray-400 p-2">192.168.1.2</td>
            </tr>
        </tbody>
    </table>
</div>
