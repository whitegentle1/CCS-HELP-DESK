<div {{ $attributes->
    merge(['class' => 'font-medium text-base text-gray-800 dark:text-gray-200'])
    }}>
    <table>
        <tr>
            <td
                x-data="{ capitalize: function(value) { return value.charAt(0).toUpperCase() + value.slice(1); } }"
                x-data="{ firstname: '{{ ucfirst(auth()->user()->firstname) }}' }"
                x-text="capitalize(firstname)"
                x-on:profile-updated.window="firstname = capitalize($event.detail.firstname)"
            ></td>
            @if (Auth::user()->middlename)
            <td
                x-data="{ middlename: '{{ ucfirst(substr(auth()->user()->middlename, 0, 1)) }}.' }"
                x-text="middlename"
                x-on:profile-updated.window="middlename = $event.detail.middlename ? capitalize($event.detail.middlename[0]) + '.' : ''"
            ></td>
            @endif

            <td
                x-data="{ lastname: '{{ ucfirst(auth()->user()->lastname) }}' }"
                x-text="capitalize(lastname)"
                x-on:profile-updated.window="lastname = capitalize($event.detail.lastname)"
            ></td>
        </tr>
    </table>
</div>
