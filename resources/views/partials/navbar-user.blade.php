<nav class="bg-white shadow-sm border-b border-gray-200 sticky top-0 z-50 w-full">
    <div class="px-6 py-3 flex justify-end items-center">
        <div class="flex items-center space-x-5">
            <div class="relative">
                <button class="flex items-center space-x-2 text-gray-700 hover:text-blue-600 focus:outline-none p-1 rounded-full hover:bg-blue-50 transition-colors">
                    <img class="h-9 w-9 rounded-full object-cover border-2 border-transparent group-hover:border-blue-300 transition" src="{{ $user->profile_picture ?? 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name) . '&background=EBF4FF&color=3B82F6&font-size=0.5&bold=true' }}" alt="{{ Auth::user()->name }}">
                    <span class="hidden md:inline-block font-medium">{{ Auth::user()->name }}</span>
                </button>
            </div>
        </div>
    </div>
</nav>