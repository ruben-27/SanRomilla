<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        @livewireStyles
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
        <!-- /Styles -->

        <!-- Scripts -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js" defer></script>
        @if($script != '')
        <script src=<?php echo'"'. asset('js/'."{$script}". '.js').'"'?> defer></script>
        @endif
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js" defer></script>
        <script src="https://unpkg.com/filepond@^4/dist/filepond.js" defer></script>
        <!-- /Scripts -->
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Content -->
            <main class="min-h-screen flex flex-col flex-auto flex-shrink-0 antialiased bg-gray-100 text-gray-800 ml-14 lg:ml-64">
                {{ $slot }}
            </main>
        </div>
        @livewire('livewire-ui-modal')
        @livewireScripts
    </body>
</html>
