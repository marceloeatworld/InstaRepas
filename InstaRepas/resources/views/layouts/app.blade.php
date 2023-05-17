<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-5XrIIr7wLr0oGwZmLk5n6nuTj3rMlUz5nBwvxOeVgK8eZa4a1YXoGzFpFYeXZg9L" crossorigin="anonymous">
        <link href="css/welcome.css" rel="stylesheet">
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            /* Admin Menu Styles */
            .admin-menu {
                list-style: none;
                padding: 0;
                margin: 0;
            }

            .admin-menu li {
                display: inline-block;
                margin-right: 10px;
            }

            .admin-menu li a {
                text-decoration: none;
                padding: 5px 10px;
                border-radius: 3px;
                background-color: #f0f0f0;
                color: #333;
            }

            .admin-menu li a:hover {
                background-color: #ddd;
            }

            /* Additional Admin Styles */
            /* Add your custom styles for the admin theme here */

        </style>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading Jai enlever le header
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif-->

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        <!-- Bootstrap Scripts -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-TzVq1XJwJf8HqpZlZ3KdA5VJq8OYB5Qz+7SHI++/J0OqyE9Lw1mK0FfQ2xjHnY5L" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/7fdee4801e.js" crossorigin="anonymous"></script>

        {{-- TAILWIND SCRIPT --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>


    </body>
</html>
