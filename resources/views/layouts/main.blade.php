<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- logo title --}}
    <link rel="icon" href="{{ asset('assets/img/logo.png') }}">

    <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    {{-- icon --}}
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">

    {{-- style --}}
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.3/dist/chart.umd.min.js"></script>

    @livewireStyles

    <title>Admin Dashboard</title>
</head>

<body class="text-gray-800 font-inter">

    @include('layouts.sidebar')

    <main class="w-full md:w-[calc(100%-256px)] md:ml-64 bg-blue-50 min-h-screen transition-all main">
        <div
            class="py-2 px-6 bg-blue-500 flex justify-between items-center shadow-md shadow-black/5 sticky top-0 left-0 z-30">
            <button type="button" class="text-lg text-gray-50 sidebar-toggle">
                <i class="ri-menu-line"></i>
            </button>

            <div class="relative">
                <img src="{{ asset('assets/img/user.png') }}" alt="Profile Picture"
                    class="w-10 h-10 rounded-full cursor-pointer" id="profilePicture">
                <div id="dropdownMenu" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-2 hidden">
                    @auth
                        <a href="{{ route('logout') }}"
                            class="block w-full text-left px-4 py-2 text-gray-800 hover:bg-blue-200 text-sm">
                            <i class="ri-logout-box-line text-sm pl-3"></i>
                            Logout
                        </a>
                    @endauth
                    @guest
                        <a href="{{ route('login') }}"
                            class="block w-full text-left px-4 py-2 text-gray-800 hover:bg-blue-200 text-sm">
                            <i class="ri-login-box-line text-sm pl-3"></i>
                            Login Admin
                        </a>
                    @endguest
                </div>
            </div>
        </div>
        <div class="mt-5 pb-5 px-5">
            @yield('content')
        </div>
    </main>

    @livewireScripts

    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const profilePicture = document.getElementById('profilePicture');
            const dropdownMenu = document.getElementById('dropdownMenu');

            profilePicture.addEventListener('click', function() {
                dropdownMenu.classList.toggle('hidden');
            });

            document.addEventListener('click', function(event) {
                if (!profilePicture.contains(event.target) && !dropdownMenu.contains(event.target)) {
                    dropdownMenu.classList.add('hidden');
                }
            });
        });

        function hideAlert() {
            var alert = document.getElementById("alert-notification")
            alert.classList.add("hidden")
        }
    </script>

    {{-- script link --}}
    @stack('script')
</body>

</html>
