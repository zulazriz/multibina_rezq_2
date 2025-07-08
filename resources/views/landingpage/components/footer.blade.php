<!-- Footer -->
<footer class="bg-gray-900 dark:bg-black text-white py-12">
    <div class="container mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-12 text-center md:text-left">
            <!-- About -->
            <div>
                <h3 class="text-xl font-bold text-white mb-4">{{ env('TITLE_WEBSITE') ?? 'MRR' }}</h3>
                <p class="space-y-2 text-sm text-gray-400">
                    Membina perabot berkualiti yang direka khas untuk setiap ruang unik di rumah anda.
                </p>
            </div>

            <!-- Quick Links -->
            <div>
                <h3 class="text-xl font-bold text-white mb-4">Pautan Pantas</h3>
                <ul class="space-y-2 text-sm text-gray-400">
                    <li><a href="#home" class="hover:text-white transition">Home</a></li>
                    <li><a href="#about" class="hover:text-white transition">About</a></li>
                    <li><a href="#projects" class="hover:text-white transition">Project</a></li>
                    <li><a href="#quotation" class="hover:text-white transition">Quotation</a></li>
                </ul>
            </div>

            <div class="flex justify-center">
                <div class="w-max">
                    @php
                        $contactInfo = [
                            ['icon' => 'mail', 'title' => 'Email Us', 'info' => 'contact@mrr.com'],
                            ['icon' => 'phone', 'title' => 'Call Us', 'info' => '+1 (555) 123-4567'],
                            ['icon' => 'map-pin', 'title' => 'Visit Us', 'info' => '123 Innovation Street, Tech City'],
                        ];
                    @endphp

                    <div class="space-y-2">
                        @foreach ($contactInfo as $contact)
                            <div class="flex items-start space-x-4 group">
                                <i data-lucide="{{ $contact['icon'] }}" class="w-5 h-5 text-white mt-1"></i>
                                <div>
                                    <p class="text-sm font-medium text-white">{{ $contact['title'] }}</p>
                                    <p class="text-sm text-gray-400">{{ $contact['info'] }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Contact -->
            <div>
                <h3 class="text-xl font-bold text-white mb-4">Hubungi Kami</h3>
                <p class="text-sm text-gray-400 mb-1">123, Jalan Perabot, 50480 Kuala Lumpur</p>
                <p class="text-sm text-gray-400 mb-4">hello@perabotimpian.com</p>

                <div class="flex justify-center md:justify-start space-x-4 mb-4">
                    <!-- Facebook -->
                    <a href="#" class="text-gray-400 hover:text-white transition">
                        <i data-lucide="facebook" class="w-6 h-6 text-white"></i>
                    </a>

                    <!-- Instagram -->
                    <a href="#" class="text-gray-400 hover:text-white transition">
                        <i data-lucide="instagram" class="w-6 h-6 text-white"></i>
                    </a>

                    <!-- Youtube -->
                    <a href="#" class="text-gray-400 hover:text-white transition">
                        <i data-lucide="youtube" class="w-6 h-6 text-white"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="border-t border-gray-700 mt-12 pt-6 text-center text-sm text-gray-500">
            <p>&copy;{{ date('Y') }} {{ env('TITLE_WEBSITE') ?? 'MRR' }}. All rights reserved.</p>
        </div>
    </div>
</footer>

<script>
    // Initialize Lucide icons
    lucide.createIcons();
</script>
