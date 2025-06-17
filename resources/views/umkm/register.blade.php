<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi UMKM</title>

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>

<body class="min-h-screen bg-gray-100 flex items-center justify-center p-4">
    
    <div class="bg-white w-full max-w-4xl mx-auto p-6 md:p-8 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold text-center mb-6">Registrasi UMKM</h1>
        
        <form id="registrationForm" novalidate>
            <div class="flex flex-col md:flex-row justify-between mb-6 gap-6">
                
                <div class="space-y-4 w-full md:w-1/2">
                    <div>
                        <label for="name" class="block text-sm font-medium">Nama UMKM <span class="text-red-500">*</span></label>
                        <input type="text" id="name" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Masukkan nama UMKM" required>
                    </div>
                    <div>
                        <label for="address" class="block text-sm font-medium">Alamat <span class="text-red-500">*</span></label>
                        <input type="text" id="address" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Masukkan alamat lengkap" required>
                    </div>
                    <div>
                        <label for="phone" class="block text-sm font-medium">Nomor Telepon <span class="text-red-500">*</span></label>
                        <input type="tel" id="phone" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Contoh: 08123456789" required>
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium">Email <span class="text-red-500">*</span></label>
                        <input type="email" id="email" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Masukkan email aktif" required>
                    </div>
                </div>

                <div class="space-y-4 w-full md:w-1/2">
                    <div>
                        <label for="type" class="block text-sm font-medium">Bidang UMKM <span class="text-red-500">*</span></label>
                        <input type="text" id="type" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Masukkan bidang UMKM" required>
                    </div>
                    <div>
                        <label for="description" class="block text-sm font-medium">Deskripsi UMKM <span class="text-red-500">*</span></label>
                        <input type="text" id="description" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Masukkan Deskripsi UMKM" required>
                    </div>
                    <div>
                        <label for="logo" class="block text-sm font-medium">Upload Logo <span class="text-red-500">*</span></label>
                        <input type="file" id="logo" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100" required>
                    </div>
                </div>
            </div>
            <button type="submit" class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Daftar</button>
        </form>
    </div>

    <div id="errorModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden p-4">
        <div class="bg-white p-8 rounded-lg shadow-xl max-w-sm w-full text-center">
            <h3 class="text-xl font-bold text-gray-800 mb-4">Peringatan</h3>
            <p class="text-gray-600 mb-6">Semua kolom yang ditandai dengan bintang merah (<span class="text-red-500">*</span>) wajib diisi.</p>
            <button id="closeModalBtn" class="bg-indigo-600 text-white py-2 px-6 rounded-md hover:bg-indigo-700 focus:outline-none">Tutup</button>
        </div>
    </div>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('registrationForm');
            const errorModal = document.getElementById('errorModal');
            const closeModalBtn = document.getElementById('closeModalBtn');

            form.addEventListener('submit', function(event) {
                const inputs = form.querySelectorAll('input[required]');
                let isFormValid = true;

                for (const input of inputs) {
                    if (input.value.trim() === '') {
                        isFormValid = false;
                        break;
                    }
                }

                if (!isFormValid) {
                    event.preventDefault();
                    errorModal.classList.remove('hidden');
                }
            });

            const closeModal = () => {
                errorModal.classList.add('hidden');
            };

            closeModalBtn.addEventListener('click', closeModal);

            errorModal.addEventListener('click', function(event) {
                if (event.target === errorModal) {
                    closeModal();
                }
            });
        });
    </script>

</body>
</html>