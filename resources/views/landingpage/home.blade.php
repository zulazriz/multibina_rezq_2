@extends('landingpage.layouts.app')

@section('content')
    {{-- <!-- 1. Hero Section with Autoslideshow -->
    <section id="home" class="relative h-[60vh] md:h-[80vh] w-full overflow-hidden" x-data="{ activeSlide: 1, slideCount: {{ count($slides) }} }"
        x-init="setInterval(() => { activeSlide = activeSlide < slideCount ? activeSlide + 1 : 1 }, 5000)">

        <!-- Slides -->
        @foreach ($slides as $index => $slide)
            <div x-show="activeSlide === {{ $index + 1 }}"
                class="absolute inset-0 transition-opacity duration-1000 ease-in-out" x-transition:enter="opacity-0"
                x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="opacity-100"
                x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                <!-- Background Image -->
                <img src="{{ $slide['image'] }}" alt="{{ $slide['title'] }}" class="w-full h-full object-cover">
                <!-- Overlay -->
                <div class="absolute inset-0 bg-black/50"></div>
                <!-- Text Content -->
                <div class="absolute inset-0 flex flex-col justify-center items-center text-center text-white p-6">
                    <h1 class="text-4xl md:text-6xl font-display font-bold mb-4 animate-fade-in-down">{{ $slide['title'] }}
                    </h1>
                    <p class="text-lg md:text-xl max-w-2xl animate-fade-in-up">{{ $slide['subtitle'] }}</p>
                </div>
            </div>
        @endforeach

        <!-- Slide Indicators -->
        <div class="absolute bottom-5 left-1/2 -translate-x-1/2 flex space-x-2">
            @for ($i = 1; $i <= count($slides); $i++)
                <button @click="activeSlide = {{ $i }}" class="w-3 h-3 rounded-full transition"
                    :class="{ 'bg-white': activeSlide === {{ $i }}, 'bg-white/50': activeSlide !==
                            {{ $i }} }"></button>
            @endfor
        </div>
    </section> --}}

    <!-- Hero Section -->
    <section id="home" class="pt-20 pb-16 bg-gradient-to-br from-indigo-50 to-white dark:from-gray-900 dark:to-gray-800">
        <div class="container mx-auto px-6">
            <div class="flex flex-col lg:flex-row items-center min-h-screen">
                <div class="lg:w-1/2 lg:pr-12 mb-12 lg:mb-0">
                    <div class="animate-fade-in-up">
                        <h1 class="text-5xl lg:text-6xl font-bold text-gray-900 dark:text-white mb-6 leading-tight">
                            Creating Digital
                            <span class="text-indigo-600 dark:text-indigo-400"> Excellence</span>
                        </h1>
                        <p class="text-xl text-gray-600 dark:text-gray-300 mb-8 leading-relaxed">
                            We transform your ideas into powerful digital solutions with cutting-edge technology and
                            creative design.
                        </p>
                        <div class="flex flex-col sm:flex-row gap-4">
                            <button onclick="document.getElementById('projects').scrollIntoView({ behavior: 'smooth' })"
                                class="bg-indigo-600 hover:bg-indigo-700 text-white px-8 py-4 rounded-lg font-semibold transition-all duration-200 flex items-center justify-center group">
                                View Our Work
                                <i data-lucide="arrow-right"
                                    class="ml-2 w-5 h-5 group-hover:translate-x-1 transition-transform duration-200"></i>
                            </button>
                            <button onclick="document.getElementById('quotation').scrollIntoView({ behavior: 'smooth' })"
                                class="border-2 border-indigo-600 text-indigo-600 dark:text-indigo-400 hover:bg-indigo-600 hover:text-white px-8 py-4 rounded-lg font-semibold transition-all duration-200">
                                Get Quote
                            </button>
                        </div>
                    </div>
                </div>

                <div class="w-full max-w-5xl mx-auto">
                    <div x-data="{
                        images: (function() {
                            let imgs = {{ json_encode(array_column($slides, 'image')) }};
                            for (let i = imgs.length - 1; i > 0; i--) {
                                const j = Math.floor(Math.random() * (i + 1));
                                [imgs[i], imgs[j]] = [imgs[j], imgs[i]];
                            }
                            return imgs;
                        })(),
                        currentIndex: 0,
                        init() {
                            this.startAutoSlide();
                        },
                        startAutoSlide() {
                            this.interval = setInterval(() => {
                                this.next();
                            }, 5000);
                        },
                        stopAutoSlide() {
                            clearInterval(this.interval);
                        },
                        next() {
                            this.currentIndex = (this.currentIndex + 1) % this.images.length;
                        },
                        goTo(index) {
                            this.currentIndex = index;
                        }
                    }" x-init="init()" class="relative animate-slide-in-right">
                        <!-- Image slideshow -->
                        <template x-for="(image, index) in images" :key="index">
                            <img x-show="index === currentIndex" x-transition:enter="transition-opacity duration-1000"
                                x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                                :src="image" alt="Slideshow Image"
                                class="rounded-2xl shadow-2xl animate-float w-full h-[600px] object-cover">
                        </template>

                        <!-- Pagination Dots -->
                        <div class="absolute bottom-4 inset-x-0 flex justify-center space-x-2">
                            <template x-for="(image, index) in images" :key="'dot-' + index">
                                <button @click="goTo(index)"
                                    :class="{
                                        'bg-white': currentIndex !== index,
                                        'bg-indigo-600 scale-125': currentIndex === index
                                    }"
                                    class="w-3 h-3 rounded-full transition-all duration-300 border border-white">
                                </button>
                            </template>
                        </div>

                        <!-- Decorative circles -->
                        <div
                            class="absolute -top-12 -right-12 w-24 h-24 bg-indigo-600 rounded-full opacity-20 animate-pulse-slow">
                        </div>
                        <div class="absolute -bottom-14 -left-14 w-32 h-32 bg-emerald-500 rounded-full opacity-20 animate-pulse-slow"
                            style="animation-delay: 300ms;"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-20 bg-white dark:bg-gray-900">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 dark:text-white mb-4 opacity-0 animate-fade-in-up delay-0">
                    Tentang Kami
                </h2>
                <p
                    class="text-xl text-gray-600 dark:text-gray-300 max-w-3xl mx-auto opacity-0 animate-fade-in-up delay-200">
                    Di Perabot Impian, kami percaya setiap ruang mempunyai potensi untuk menjadi luar biasa. Dengan
                    pengalaman bertahun-tahun dalam pertukangan kayu dan rekaan dalaman, kami komited untuk menghasilkan
                    perabot tempahan khas yang bukan sahaja cantik, tetapi juga berfungsi dan mencerminkan personaliti anda.
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                @php
                    $services = [
                        [
                            'icon' => 'code',
                            'title' => 'Web Development',
                            'desc' => 'Full-stack development with modern frameworks',
                        ],
                        [
                            'icon' => 'smartphone',
                            'title' => 'Mobile Apps',
                            'desc' => 'Native and cross-platform mobile solutions',
                        ],
                        [
                            'icon' => 'palette',
                            'title' => 'UI/UX Design',
                            'desc' => 'User-centered design that converts',
                        ],
                        [
                            'icon' => 'globe',
                            'title' => 'Digital Strategy',
                            'desc' => 'Comprehensive digital transformation',
                        ],
                    ];
                @endphp

                @foreach ($services as $index => $service)
                    <div
                        class="group p-8 rounded-xl bg-gray-50 dark:bg-gray-800 transition duration-300 ease-in-out transform hover:scale-[1.03] hover:-translate-y-2 hover:shadow-2xl">
                        <i data-lucide="{{ $service['icon'] }}"
                            class="w-12 h-12 text-indigo-600 dark:text-indigo-400 mb-4 group-hover:scale-110 transition-transform duration-300"></i>
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">
                            {{ $service['title'] }}</h3>
                        <p class="text-gray-600 dark:text-gray-300">{{ $service['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Projects Section - Enhanced Animation -->
    <section id="projects" class="py-20 bg-gray-50 dark:bg-gray-800">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 dark:text-white mb-4 animate-fade-in-up">Hasil Kerja
                    Kami</h2>
                <p class="text-xl text-gray-600 dark:text-gray-300 max-w-3xl mx-auto animate-fade-in-up animate-delay-200">
                    Lihat beberapa projek yang telah kami siapkan.
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($projects as $index => $project)
                    <div class="group bg-white dark:bg-gray-900 rounded-xl overflow-hidden shadow-lg transition duration-300 ease-in-out transform hover:scale-[1.03] hover:-translate-y-2 hover:shadow-2xl"
                        x-transition:enter="transition ease-out duration-600"
                        x-transition:enter-start="opacity-0 transform translate-y-8 scale-95"
                        x-transition:enter-end="opacity-100 transform translate-y-0 scale-100">

                        <div class="relative overflow-hidden">
                            <img src="{{ $project['image'] }}" alt="{{ $project['title'] }}"
                                class="w-full h-48 object-cover group-hover:scale-110 transition-transform duration-500">
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            </div>
                            <div
                                class="absolute top-4 right-4 opacity-0 group-hover:opacity-100 transition-all duration-300 transform translate-x-4 group-hover:translate-x-0">
                                <span class="bg-indigo-600 text-white px-3 py-1 rounded-full text-sm font-medium">
                                    {{ $project['category'] }}
                                </span>
                            </div>
                            <div
                                class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-all duration-300">
                                <button
                                    class="bg-white/90 dark:bg-gray-900/90 text-gray-900 dark:text-white px-6 py-2 rounded-lg font-medium transform scale-90 group-hover:scale-100 transition-transform duration-300 flex items-center">
                                    <i data-lucide="external-link" class="w-4 h-4 mr-2"></i>
                                    View Project
                                </button>
                            </div>
                        </div>

                        <div class="p-6">
                            <h3
                                class="text-xl font-semibold text-gray-900 dark:text-white mb-2 group-hover:text-indigo-600 dark:group-hover:text-indigo-400 transition-colors duration-300">
                                {{ $project['title'] }}
                            </h3>
                            <p class="text-gray-600 dark:text-gray-300 mb-4 line-clamp-3">
                                {{ $project['description'] }}
                            </p>

                            <div class="flex flex-wrap gap-2 mb-4">
                                @foreach ($project['technologies'] as $tech)
                                    <span
                                        class="bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 px-3 py-1 rounded-full text-sm transform group-hover:scale-105 transition-transform duration-200">
                                        {{ $tech }}
                                    </span>
                                @endforeach
                            </div>

                            <div
                                class="flex items-center text-indigo-600 dark:text-indigo-400 hover:text-indigo-700 dark:hover:text-indigo-300 font-medium group cursor-pointer">
                                <span class="group-hover:translate-x-1 transition-transform duration-200">Learn
                                    More</span>
                                <i data-lucide="arrow-right"
                                    class="ml-2 w-4 h-4 group-hover:translate-x-1 transition-transform duration-200"></i>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section id="gallery" class="py-20 bg-white dark:bg-gray-900">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 dark:text-white mb-4 animate-fade-in-up">Galeri Projek</h2>
                <p class="text-xl text-gray-600 dark:text-gray-300 max-w-3xl mx-auto animate-fade-in-up animate-delay-200">
                    Jelajahi lebih banyak inspirasi dari koleksi rekaan kami yang pelbagai.
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-4">
                @foreach ($galleries as $index => $gallery)
                    <div class="group relative overflow-hidden rounded-lg aspect-square cursor-pointer animate-scale-in animate-delay-{{ ($index + 1) * 100 }}"
                        x-transition:enter="transition ease-out duration-500"
                        x-transition:enter-start="opacity-0 transform scale-90"
                        x-transition:enter-end="opacity-100 transform scale-100">
                        <img src="{{ $gallery['image'] }}" alt="Gallery {{ $index + 1 }}"
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div
                            class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                            <div
                                class="text-white text-center transform translate-y-4 group-hover:translate-y-0 transition-transform duration-300">
                                <i data-lucide="external-link" class="w-8 h-8 mx-auto mb-2"></i>
                                <span class="text-sm font-medium">View Full Size</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Quotation Section -->
    <section id="quotation" class="py-20 bg-gray-50 dark:bg-gray-800">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 dark:text-white mb-4 animate-fade-in-up">
                    Sedia Untuk Memulakan Projek?
                </h2>
                <p class="text-xl text-gray-600 dark:text-gray-300 max-w-3xl mx-auto animate-fade-in-up animate-delay-200">
                    Hubungi kami hari ini untuk mendapatkan sebut harga percuma dan konsultasi tanpa komitmen.
                    Mari realisasikan rumah idaman anda.
                </p>
            </div>

            <div class="flex flex-col items-center lg:flex-row lg:justify-center gap-6 max-w-4xl mx-auto">
                <a href="https://wa.me/60123456789" target="_blank"
                    class="bg-green-600 text-white text-lg font-semibold py-3 px-8 rounded-full hover:bg-green-700 transition duration-300 shadow-lg flex items-center space-x-3">

                    <span>Dapatkan Sebut Harga di WhatsApp</span>
                    <svg class="w-8 h-8 fill-current" viewBox="0 0 32 32">
                        <path
                            d="M16.003 3c-7.18 0-13 5.82-13 13 0 2.29.61 4.52 1.77 6.48L3 29l6.68-1.74a12.94 12.94 0 006.32 1.62h.01c7.18 0 13-5.82 13-13s-5.82-13-13-13zm0 23.4c-2.05 0-4.05-.55-5.8-1.6l-.41-.24-3.97 1.03 1.06-3.87-.26-.4a10.37 10.37 0 01-1.62-5.62c0-5.73 4.67-10.4 10.4-10.4 2.78 0 5.39 1.09 7.36 3.06a10.37 10.37 0 013.04 7.34c0 5.73-4.67 10.4-10.4 10.4zm5.83-7.98c-.32-.16-1.89-.93-2.18-1.04-.29-.11-.5-.16-.71.16-.21.32-.82 1.04-1.01 1.25-.18.21-.37.23-.69.08a8.43 8.43 0 01-2.48-1.54 9.38 9.38 0 01-1.75-2.18c-.18-.31-.02-.48.14-.64.15-.15.32-.37.48-.56.16-.19.21-.32.32-.53.11-.21.05-.4-.03-.56-.08-.16-.71-1.71-.97-2.35-.26-.64-.52-.55-.71-.56h-.61c-.2 0-.52.08-.79.4s-1.04 1.02-1.04 2.5 1.07 2.89 1.22 3.09c.16.21 2.1 3.21 5.1 4.5.71.3 1.26.48 1.69.61.71.23 1.35.2 1.86.12.57-.08 1.89-.77 2.15-1.51.27-.75.27-1.39.19-1.51-.08-.13-.29-.21-.61-.37z" />
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <script>
        // Initialize Lucide icons
        lucide.createIcons();

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Scroll-triggered animation using IntersectionObserver
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const animationClass = entry.target.dataset.animate;
                    entry.target.classList.remove('opacity-0');
                    entry.target.classList.add(animationClass);
                    observer.unobserve(entry.target); // optional: only animate once
                }
            });
        }, {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        });

        // Target all elements with data-animate
        document.querySelectorAll('[data-animate]').forEach(el => {
            el.classList.add('opacity-0'); // hide initially
            observer.observe(el);
        });
    </script>
@endsection
