<html>
    <head>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @livewireStyles

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        livewireテスト <span class="text-red-500">register</span>
        {{-- <livewire:counter /> --}}
        @livewire('register')
        
        @livewireScripts
    </body>
</html>