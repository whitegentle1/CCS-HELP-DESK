<div class="min-h-auto flex flex-col text-xs items-center justify-center">
    Activity Log
    <table class="mt-4 border-collapse border border-gray-400">
        <thead>
            <tr>
                <th class="border border-gray-400 p-2">Activity</th>
                <th class="border border-gray-400 p-2">Date</th>
                <th class="border border-gray-400 p-2">Browser</th>
                <th class="border border-gray-400 p-2">IP</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($activityLog as $item)
            <tr>
                <td class="border border-gray-400 p-2">
                    {{ $item->activity }}
                </td>
                <td class="border border-gray-400 p-2">
                    {{ $item->login_time ?: $item->logout_time }}
                </td>
                <td class="border border-gray-400 p-2">
                    {{ $item->user_agent }}
                </td>
                <td class="border border-gray-400 p-2">
                    {{ $item->ip_address }}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $activityLog->links() }}
</div>
