<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <title>{{ $title ?? "CCS Help Desk" }}</title>
        @vite('resources/css/app.css') @livewireStyles
        @vite('resources/js/app.js')
        <link
            rel="stylesheet"
            href="{{ asset('assets/css/styles.css') }}"
            class="styles"
        />
        <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css"
        />
        <link
            href="https://cdn.lineicons.com/4.0/lineicons.css"
            rel="stylesheet"
        />
    </head>
    <body>
        {{ $slot }}
        @livewireScripts
    </body>
</html>
