    {{-- filepath: /c:/xampp/htdocs/hexigon_filament/resources/views/components/layouts/app.blade.php --}}
    <!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8" />

        <meta name="application-name" content="{{ config('app.name') }}" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <title>{{ config('app.name') }} - Trang Tin tức</title>

        <style>
            /* Base styles for x-cloak, keeping it for Livewire/Alpine */
            [x-cloak] {
                display: none !important;
            }

            /* Custom scrollbar for a smoother look (optional, consider browser compatibility) */
            body::-webkit-scrollbar {
                width: 8px;
            }

            body::-webkit-scrollbar-track {
                background: #f0f0f0;
            }

            body::-webkit-scrollbar-thumb {
                background: #999;
                border-radius: 4px;
            }

            body::-webkit-scrollbar-thumb:hover {
                background: #666;
            }
        </style>
        @livewireStyles
        @filamentStyles
        @vite('resources/css/app.css')
    </head>

    <body class="antialiased bg-gray-100 text-gray-800 font-sans min-h-screen flex flex-col">
        @livewire('partials.header', ['search' => $search ?? ''])

        @livewire('partials.navbar')

        {{-- @livewireNavigate  --}}

        
            {{ $slot }}
    

        @livewire('partials.footer')

        @livewireScripts
        @filamentScripts
        @vite('resources/js/app.js')
    </body>

    </html>
