<footer class="bg-gray-900 text-white">
    <div class="max-w-screen-xl mx-auto px-4 py-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Logo & Description -->
            <div>
                <div class="flex items-center mb-3">
                    <img src="{{ asset('assets/icons/aceed.png') }}" alt="ACEED EXPO Logo" class="w-8 h-8 mr-2">
                    <span class="text-lg font-bold text-yellow-300">ACEED EXPO</span>
                </div>
                <p class="text-gray-300 text-xs">Job Fair Universitas Andalas untuk mahasiswa, alumni, dan perusahaan ternama.</p>
            </div>

            <!-- Quick Links -->
            <div>
                <h3 class="text-base font-semibold text-white mb-3">Menu</h3>
                <ul class="space-y-2">
                    <li><a href="{{ route('home') }}#home" class="text-gray-300 hover:text-yellow-300 transition text-xs">Beranda</a></li>
                    <li><a href="{{ route('home') }}#events" class="text-gray-300 hover:text-yellow-300 transition text-xs">Acara</a></li>
                    <li><a href="{{ route('home') }}#sponsors" class="text-gray-300 hover:text-yellow-300 transition text-xs">Sponsor</a></li>
                    <li><a href="{{ route('home') }}#faq" class="text-gray-300 hover:text-yellow-300 transition text-xs">FAQ</a></li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div>
                <h3 class="text-base font-semibold text-white mb-3">Kontak</h3>
                <div class="space-y-2">
                    <div class="flex items-start">
                        <svg class="w-4 h-4 text-yellow-300 mt-0.5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                        </svg>
                        <p class="text-gray-300 text-xs">aceedexpo@unand.ac.id</p>
                    </div>
                    <div class="flex items-start">
                        <svg class="w-4 h-4 text-yellow-300 mt-0.5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"></path>
                        </svg>
                        <p class="text-gray-300 text-xs">+62 812-3456-7890</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bottom Section with Social Media -->
        <div class="border-t border-gray-700 mt-6 pt-6">
            <div class="flex flex-col items-center gap-4">
                <div class="flex justify-center gap-4">
                    <!-- Instagram -->
                    <a href="#" class="group p-2 hover:bg-gray-700 rounded-lg transition duration-200">
                        <div class="w-8 h-8 bg-gradient-to-br from-purple-600 to-pink-500 rounded-lg flex items-center justify-center group-hover:scale-105 transition">
                            <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                            </svg>
                        </div>
                    </a>

                    <!-- LinkedIn -->
                    <a href="#" class="group p-2 hover:bg-gray-700 rounded-lg transition duration-200">
                        <div class="w-8 h-8 bg-blue-700 rounded-lg flex items-center justify-center group-hover:scale-105 transition">
                            <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                            </svg>
                        </div>
                    </a>

                    <!-- Twitter/X -->
                    <a href="#" class="group p-2 hover:bg-gray-700 rounded-lg transition duration-200">
                        <div class="w-8 h-8 bg-gray-950 rounded-lg flex items-center justify-center group-hover:scale-105 transition">
                            <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>
                            </svg>
                        </div>
                    </a>

                    <!-- YouTube -->
                    <a href="#" class="group p-2 hover:bg-gray-700 rounded-lg transition duration-200">
                        <div class="w-8 h-8 bg-red-700 rounded-lg flex items-center justify-center group-hover:scale-105 transition">
                            <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                            </svg>
                        </div>
                    </a>
                </div>
                <p class="text-center text-gray-300 text-xs">
                    © 2025 <a href="#" class="text-yellow-300 hover:text-yellow-200 transition">ACEED EXPO</a>. All rights reserved.
                </p>
            </div>
        </div>
    </div>
</footer>