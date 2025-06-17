<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Sponsor</title>

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
    <style>
        /* Custom scrollbar webkit browsers */
        .table-container::-webkit-scrollbar {
            height: 8px;
        }
        .table-container::-webkit-scrollbar-track {
            background: #f1f1f1;
        }
        .table-container::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 4px;
        }
        .table-container::-webkit-scrollbar-thumb:hover {
            background: #555;
        }
    </style>
</head>

<body class="min-h-screen bg-gray-100 flex items-center justify-center p-4">

    <div class="bg-white w-full max-w-4xl mx-auto p-6 md:p-8 rounded-lg shadow-lg">
        <h1 class="text-3xl font-bold text-center mb-6 text-gray-800">Registrasi Sponsor</h1>
        
        <form id="registrationForm" novalidate>
            <div class="flex flex-col md:flex-row justify-between mb-6 gap-6">
                <div class="space-y-4 w-full md:w-1/2">
                    <div>
                        <label for="name" class="block text-sm font-medium">Nama Perusahaan/Instansi <span class="text-red-500">*</span></label>
                        <input type="text" id="name" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Masukkan nama perusahaan" required>
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
                        <label for="sponsor_package" class="flex items-center text-sm font-medium">
                            <span>Paket Sponsorship <span class="text-red-500">*</span></span>
                            <button type="button" id="infoIcon" class="ml-2 text-blue-600 hover:text-blue-800 focus:outline-none" title="Lihat detail benefit paket">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </label>
                        <select id="sponsor_package" required class="mt-1 block w-full px-3 py-2 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <option value="">Pilih Paket</option>
                            <option value="platinum">Platinum</option>
                            <option value="gold">Gold</option>
                            <option value="silver">Silver</option>
                            <option value="bronze">Bronze</option>
                        </select>
                    </div>
                    <div>
                        <label for="logo" class="block text-sm font-medium">Upload Logo <span class="text-red-500">*</span></label>
                        <input type="file" id="logo" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100" required>
                    </div>
                     <div>
                        <label for="wish_for_event" class="block text-sm font-medium">Harapan untuk Acara <span class="text-red-500">*</span></label>
                        <textarea id="wish_for_event" rows="4" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Tuliskan harapan atau tujuan Anda berpartisipasi..." required></textarea>
                    </div>
                </div>
            </div>
            <button type="submit" class="w-full bg-indigo-600 text-white font-bold py-3 px-4 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors">Kirim Pendaftaran</button>
        </form>
    </div>

    <div id="errorModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden p-4 z-50">
        <div class="bg-white p-8 rounded-lg shadow-xl max-w-sm w-full text-center">
            <h3 class="text-xl font-bold text-gray-800 mb-4">Peringatan</h3>
            <p class="text-gray-600 mb-6">Semua kolom yang ditandai dengan bintang merah (<span class="text-red-500">*</span>) wajib diisi.</p>
            <button id="closeErrorModalBtn" class="bg-indigo-600 text-white py-2 px-6 rounded-md hover:bg-indigo-700 focus:outline-none">Tutup</button>
        </div>
    </div>

    <div id="benefitModal" class="fixed inset-0 bg-black bg-opacity-60 flex items-center justify-center hidden p-4 z-40">
        <div class="bg-white rounded-lg shadow-2xl max-w-6xl w-full h-full max-h-[90vh] flex flex-col">
            <div class="flex justify-between items-center p-4 border-b">
                <h3 class="text-xl font-bold text-gray-800">Detail Benefit Paket Sponsorship</h3>
                <button id="closeBenefitModalBtn" class="text-gray-500 hover:text-gray-800">&times;</button>
            </div>
            <div class="p-6 overflow-y-auto">
                <div class="table-container overflow-x-auto">
                    <table class="min-w-full border-collapse text-sm">
                        <thead class="font-bold text-white">
                            <tr>
                                <th class="p-3 border border-gray-300 bg-amber-700">BENEFIT</th>
                                <th class="p-3 border border-gray-300 bg-slate-500">PLATINUM</th>
                                <th class="p-3 border border-gray-300 bg-yellow-500">GOLD</th>
                                <th class="p-3 border border-gray-300 bg-slate-400">SILVER</th>
                                <th class="p-3 border border-gray-300 bg-orange-500">BRONZE</th>
                            </tr>
                        </thead>
                        <tbody class="text-center bg-orange-50">
                            <tr><td colspan="5" class="p-2 font-bold text-left bg-gray-200 border border-gray-300">BRANDING</td></tr>
                            <tr><td class="p-2 border text-left">Booth</td><td class="p-2 border">Yes</td><td class="p-2 border bg-yellow-100">Yes</td><td class="p-2 border">Yes</td><td class="p-2 border">Yes</td></tr>
                            <tr><td class="p-2 border text-left">Promosi di Sosial Media</td><td class="p-2 border">Yes</td><td class="p-2 border bg-yellow-100">Yes</td><td class="p-2 border">Yes</td><td class="p-2 border">Yes</td></tr>
                            <tr><td colspan="5" class="p-2 font-bold text-left bg-gray-200 border border-gray-300">LOGO PLACEMENT</td></tr>
                            <tr><td class="p-2 border text-left">Event Marketing Kit</td><td class="p-2 border">Yes</td><td class="p-2 border bg-yellow-100">Yes</td><td class="p-2 border">No</td><td class="p-2 border">No</td></tr>
                            <tr><td class="p-2 border text-left">Pre-Event Landing Page</td><td class="p-2 border">Yes</td><td class="p-2 border bg-yellow-100">Yes</td><td class="p-2 border">No</td><td class="p-2 border">No</td></tr>
                            <tr><td class="p-2 border text-left">D-Day Home Page</td><td class="p-2 border">Yes</td><td class="p-2 border bg-yellow-100">Yes</td><td class="p-2 border">Yes</td><td class="p-2 border">Yes</td></tr>
                            <tr><td class="p-2 border text-left">Thank You Email</td><td class="p-2 border">Yes</td><td class="p-2 border bg-yellow-100">Yes</td><td class="p-2 border">Yes</td><td class="p-2 border">Yes</td></tr>
                            <tr><td class="p-2 border text-left">ACEED Promotional Video</td><td class="p-2 border">Yes</td><td class="p-2 border bg-yellow-100">Yes</td><td class="p-2 border">Yes</td><td class="p-2 border">Yes</td></tr>
                            <tr><td colspan="5" class="p-2 font-bold text-left bg-gray-200 border border-gray-300">ACARA LAINNYA</td></tr>
                            <tr><td class="p-2 border text-left">Campus Hiring</td><td class="p-2 border">Yes</td><td class="p-2 border bg-yellow-100">Yes</td><td class="p-2 border">No</td><td class="p-2 border">No</td></tr>
                            <tr><td class="p-2 border text-left">Webinar</td><td class="p-2 border">3x</td><td class="p-2 border bg-yellow-100">2x</td><td class="p-2 border">1x</td><td class="p-2 border">1x</td></tr>
                            <tr><td class="p-2 border text-left">Seminar</td><td class="p-2 border">2x</td><td class="p-2 border bg-yellow-100">1x</td><td class="p-2 border">No</td><td class="p-2 border">No</td></tr>
                            <tr><td class="p-2 border text-left">Exclusive Company Session</td><td class="p-2 border">2x</td><td class="p-2 border bg-yellow-100">1x</td><td class="p-2 border">No</td><td class="p-2 border">No</td></tr>
                            <tr><td class="p-2 border text-left">Candidate Screening</td><td class="p-2 border">Unlimited</td><td class="p-2 border bg-yellow-100">Unlimited</td><td class="p-2 border">No</td><td class="p-2 border">No</td></tr>
                            <tr><td class="p-2 border text-left">Special Opening Speech</td><td class="p-2 border">Yes</td><td class="p-2 border bg-yellow-100">No</td><td class="p-2 border">No</td><td class="p-2 border">No</td></tr>
                            <tr><td class="p-2 border text-left">Special Booth Post Event</td><td class="p-2 border">Yes</td><td class="p-2 border bg-yellow-100">No</td><td class="p-2 border">No</td><td class="p-2 border">No</td></tr>
                            <tr><td class="p-2 border text-left">ACEED Explore: Lamak Jo Rancak di Ranah Minang</td><td class="p-2 border">Yes</td><td class="p-2 border bg-yellow-100">No</td><td class="p-2 border">No</td><td class="p-2 border">No</td></tr>
                            <tr><td colspan="5" class="p-2 font-bold text-left bg-gray-200 border border-gray-300">BRAND INSTALLATION</td></tr>
                            <tr><td class="p-2 border text-left">Brand Mention</td><td class="p-2 border">Yes</td><td class="p-2 border bg-yellow-100">Yes</td><td class="p-2 border">Yes</td><td class="p-2 border">Yes</td></tr>
                            <tr><td class="p-2 border text-left">Video Ad Placement D-Day</td><td class="p-2 border">Yes</td><td class="p-2 border bg-yellow-100">Yes</td><td class="p-2 border">Yes</td><td class="p-2 border">Yes</td></tr>
                            <tr><td colspan="5" class="p-2 font-bold text-left bg-gray-200 border border-gray-300">D-DAY LANDING PAGE BRAND PRESENCE</td></tr>
                            <tr><td class="p-2 border text-left">Home Page's Promotional Banner</td><td class="p-2 border">Yes</td><td class="p-2 border bg-yellow-100">Yes</td><td class="p-2 border">No</td><td class="p-2 border">No</td></tr>
                            <tr><td class="p-2 border text-left">Home Page's Promotional Section</td><td class="p-2 border">Yes</td><td class="p-2 border bg-yellow-100">Yes</td><td class="p-2 border">No</td><td class="p-2 border">No</td></tr>
                            <tr><td colspan="5" class="p-2 font-bold text-left bg-gray-200 border border-gray-300">MISCELLANEOUS</td></tr>
                            <tr><td class="p-2 border text-left">Job Applicant Database</td><td class="p-2 border">Yes</td><td class="p-2 border bg-yellow-100">Yes</td><td class="p-2 border">No</td><td class="p-2 border">No</td></tr>
                            <tr><td class="p-2 border text-left">Plakat</td><td class="p-2 border">Yes</td><td class="p-2 border bg-yellow-100">Yes</td><td class="p-2 border">Yes</td><td class="p-2 border">Yes</td></tr>
                            <tr><td class="p-2 border text-left">Konsumsi</td><td class="p-2 border">Yes</td><td class="p-2 border bg-yellow-100">Yes</td><td class="p-2 border">Yes</td><td class="p-2 border">Yes</td></tr>
                            <tr><td colspan="5" class="p-2 font-bold text-left bg-gray-200 border border-gray-300">D-DAY PROMOTION</td></tr>
                            <tr><td class="p-2 border text-left">Poster Image (Up To 5 Images)</td><td class="p-2 border">Yes</td><td class="p-2 border bg-yellow-100">Yes</td><td class="p-2 border">Yes</td><td class="p-2 border">Yes</td></tr>
                            <tr><td class="p-2 border text-left">Video Bumper Placement (Up to 5 Versions)</td><td class="p-2 border">Yes</td><td class="p-2 border bg-yellow-100">Yes</td><td class="p-2 border">No</td><td class="p-2 border">No</td></tr>
                            <tr><td class="p-2 border text-left">Extended Video Content (Recap/Testimonial)</td><td class="p-2 border">Add-on</td><td class="p-2 border bg-yellow-100">Add-on</td><td class="p-2 border">No</td><td class="p-2 border">No</td></tr>
                            <tr><td colspan="5" class="p-2 font-bold text-left bg-gray-200 border border-gray-300">POST-EVENT EXPOSURE : ACEED EXPLORE</td></tr>
                            <tr><td class="p-2 border text-left">Exclusive Access to the Event</td><td class="p-2 border">Yes</td><td class="p-2 border bg-yellow-100">No</td><td class="p-2 border">No</td><td class="p-2 border">No</td></tr>
                            <tr><td class="p-2 border text-left">Branding in Documentation (Photoshop/Videos)</td><td class="p-2 border">Yes</td><td class="p-2 border bg-yellow-100">Add-on</td><td class="p-2 border">No</td><td class="p-2 border">No</td></tr>
                            <tr><td class="p-2 border text-left">Logo on Transportation / Participant T-Shirts</td><td class="p-2 border">Yes</td><td class="p-2 border bg-yellow-100">Add-on</td><td class="p-2 border">No</td><td class="p-2 border">No</td></tr>
                            <tr><td class="p-2 border text-left">Logo in Post Event Social Media Album</td><td class="p-2 border">Yes</td><td class="p-2 border bg-yellow-100">Yes</td><td class="p-2 border">Yes</td><td class="p-2 border">Yes</td></tr>
                            <tr><td class="p-2 border text-left">Exclusive Content at Post Event Booth</td><td class="p-2 border">Yes</td><td class="p-2 border bg-yellow-100">No</td><td class="p-2 border">No</td><td class="p-2 border">No</td></tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Form validation elements
            const form = document.getElementById('registrationForm');
            const errorModal = document.getElementById('errorModal');
            const closeErrorModalBtn = document.getElementById('closeErrorModalBtn');

            // Benefit modal elements
            const benefitModal = document.getElementById('benefitModal');
            const infoIcon = document.getElementById('infoIcon');
            const closeBenefitModalBtn = document.getElementById('closeBenefitModalBtn');

            // --- Form Validation Logic ---
            form.addEventListener('submit', function(event) {
                // Query all required fields including the new ones
                const requiredFields = form.querySelectorAll('input[required], select[required], textarea[required]');
                let isFormValid = true;

                for (const field of requiredFields) {
                    if (field.value.trim() === '') {
                        isFormValid = false;
                        break;
                    }
                }

                if (!isFormValid) {
                    event.preventDefault();
                    errorModal.classList.remove('hidden');
                }
            });
            
            closeErrorModalBtn.addEventListener('click', () => {
                errorModal.classList.add('hidden');
            });

            // --- Benefit Modal Logic ---
            infoIcon.addEventListener('click', () => {
                benefitModal.classList.remove('hidden');
            });

            closeBenefitModalBtn.addEventListener('click', () => {
                benefitModal.classList.add('hidden');
            });
            
            // Close modal when clicking outside of it
            benefitModal.addEventListener('click', function(event) {
                if (event.target === benefitModal) {
                    benefitModal.classList.add('hidden');
                }
            });
        });
    </script>

</body>
</html>