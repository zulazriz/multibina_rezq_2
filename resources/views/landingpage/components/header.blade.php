<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="{ darkMode: false }" x-init="darkMode = localStorage.getItem('theme') === 'dark' || (!localStorage.getItem('theme') && window.matchMedia('(prefers-color-scheme: dark)').matches);
$watch('darkMode', val => {
    localStorage.setItem('theme', val ? 'dark' : 'light');
    if (val) {
        document.documentElement.classList.add('dark');
    } else {
        document.documentElement.classList.remove('dark');
    }
});
if (darkMode) document.documentElement.classList.add('dark');"
    :class="{ 'dark': darkMode }">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'MRR') }}</title>

        <link rel="icon" type="image/x-icon" href="/favicon.ico">
        <link rel="icon" type="image/png" sizes="40x40" href="{{ asset('images/mrr_2.png') }}">
        <link rel="icon" type="image/png" sizes="20x20" href="{{ asset('images/mrr_2.png') }}">
        <link rel="apple-touch-icon" sizes="220x220" href="{{ asset('images/mrr_2.png') }}">

        <!-- Alpine.js with Intersect Plugin -->
        <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/intersect@3.x.x/dist/cdn.min.js"></script>
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap"
            rel="stylesheet">

        <!-- Lucide Icons -->
        <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>

        <!-- Tailwind CSS -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body class="min-h-screen bg-white dark:bg-gray-900 transition-colors duration-300">
        <!-- Header -->
        <header x-data="{ isOpen: false, scrolled: false }" x-init="window.addEventListener('scroll', () => scrolled = window.scrollY > 20)"
            :class="scrolled ? 'bg-white/80 dark:bg-gray-900/80 backdrop-blur-md shadow-lg' : 'bg-transparent'"
            class="fixed top-0 left-0 right-0 z-50 transition-all duration-300">
            <nav class="container mx-auto px-1">
                <div class="flex items-center justify-between">
                    <!-- Logo -->
                    <div class="flex items-center space-x-4 cursor-pointer"
                        onclick="document.getElementById('home').scrollIntoView({ behavior: 'smooth' })"
                        style="min-height: 112px;">

                        <img src="{{ asset('images/mrr_2.png') }}" alt="Logo" class="w-28 h-28 object-contain">

                        <div class="text-2xl font-extrabold text-gray-800 dark:text-white leading-tight">
                            {{ env('TITLE_WEBSITE', 'MRR') }}
                        </div>
                    </div>

                    <!-- Desktop Navigation -->
                    <div class="hidden md:flex items-center space-x-8">
                        <a href="#home"
                            class="text-gray-600 dark:text-gray-300 hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors duration-200">Home</a>
                        <a href="#about"
                            class="text-gray-600 dark:text-gray-300 hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors duration-200">About</a>
                        <a href="#projects"
                            class="text-gray-600 dark:text-gray-300 hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors duration-200">Projects</a>
                        <a href="#gallery"
                            class="text-gray-600 dark:text-gray-300 hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors duration-200">Gallery</a>
                        <a href="#quotation"
                            class="text-gray-600 dark:text-gray-300 hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors duration-200">Quotation</a>

                        <!-- Dark Mode Toggle -->
                        <button @click="darkMode = !darkMode"
                            class="p-2 rounded-full text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 transition-all duration-200">
                            <i x-show="!darkMode" data-lucide="sun" class="w-5 h-5"></i>
                            <i x-show="darkMode" data-lucide="moon" class="w-5 h-5"></i>
                        </button>
                    </div>

                    <!-- Mobile Menu Button -->
                    <div class="md:hidden flex items-center space-x-2">
                        <button @click="darkMode = !darkMode"
                            class="p-2 rounded-full text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 transition-all duration-200">
                            <i x-show="!darkMode" data-lucide="sun" class="w-5 h-5"></i>
                            <i x-show="darkMode" data-lucide="moon" class="w-5 h-5"></i>
                        </button>
                        <button @click="isOpen = !isOpen" class="p-2 text-gray-600 dark:text-gray-300">
                            <i x-show="!isOpen" data-lucide="menu" class="w-6 h-6"></i>
                            <i x-show="isOpen" data-lucide="x" class="w-6 h-6"></i>
                        </button>
                    </div>
                </div>

                <!-- Mobile Menu -->
                <div x-show="isOpen" x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="opacity-0 transform -translate-y-2"
                    x-transition:enter-end="opacity-100 transform translate-y-0"
                    x-transition:leave="transition ease-in duration-150"
                    x-transition:leave-start="opacity-100 transform translate-y-0"
                    x-transition:leave-end="opacity-0 transform -translate-y-2"
                    class="md:hidden mt-4 py-4 bg-white dark:bg-gray-800 rounded-lg shadow-lg">
                    <a href="#home" @click="isOpen = false"
                        class="block w-full text-left py-2 px-4 text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200">Home</a>
                    <a href="#about" @click="isOpen = false"
                        class="block w-full text-left py-2 px-4 text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200">About</a>
                    <a href="#projects" @click="isOpen = false"
                        class="block w-full text-left py-2 px-4 text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200">Projects</a>
                    <a href="#gallery" @click="isOpen = false"
                        class="block w-full text-left py-2 px-4 text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200">Gallery</a>
                    <a href="#quotation" @click="isOpen = false"
                        class="block w-full text-left py-2 px-4 text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200">Quotation</a>
                </div>
            </nav>
        </header>
    </body>

</html>
