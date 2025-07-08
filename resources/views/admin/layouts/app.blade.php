<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Panel</title>

        <!-- Tailwind CSS -->
        <script src="https://cdn.tailwindcss.com"></script>
    </head>

    <body class="bg-gray-100">
        <div class="flex h-screen bg-gray-200">
            <!-- Sidebar -->
            <div class="w-64 bg-gray-800 text-white p-5">
                <h1 class="text-2xl font-bold">Admin Panel</h1>
                <nav class="mt-10">
                    <a href="{{ route('admin.dashboard') }}"
                        class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700">Dashboard</a>
                    <!-- Tambah pautan admin lain di sini -->
                </nav>
            </div>

            <!-- Main Content -->
            <div class="flex-1 flex flex-col overflow-hidden">
                <header class="bg-white shadow p-4">
                    <h2 class="text-xl font-semibold">@yield('title')</h2>
                </header>
                <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100 p-6">
                    @yield('content')
                </main>
            </div>
        </div>
    </body>

</html>
