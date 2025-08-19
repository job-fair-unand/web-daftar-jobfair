<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Beasiswa</title>
    <link rel="icon" href="{{ asset('assets/icons/aceed.png') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    
    <style>
        body {
            background: linear-gradient(135deg, #e0e7ff 0%, #f0fdf4 100%);
            min-height: 100vh;
        }
        .main-container {
            background: linear-gradient(135deg, rgba(99, 102, 241, 0.08) 0%, rgba(16, 185, 129, 0.08) 100%);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(99, 102, 241, 0.15);
        }
        .header-gradient {
            background: linear-gradient(135deg, #6366f1 0%, #10b981 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        .form-container {
            background: rgba(255, 255, 255, 0.97);
            backdrop-filter: blur(15px);
            border: 1px solid rgba(99, 102, 241, 0.15);
            box-shadow: 0 20px 25px -5px rgba(99, 102, 241, 0.08), 0 10px 10px -5px rgba(16, 185, 129, 0.04);
        }
        .form-label {
            background: linear-gradient(135deg, #4338ca 0%, #065f46 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-weight: 600;
        }
        .form-input {
            border: 2px solid transparent;
            background: linear-gradient(white, white) padding-box, 
                        linear-gradient(135deg, #818cf8, #34d399) border-box;
            transition: all 0.3s ease;
            outline: none;
        }
        .form-input:focus, .form-input:hover {
            background: linear-gradient(white, white) padding-box, 
                        linear-gradient(135deg, #6366f1, #10b981) border-box;
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.2);
        }
        .upload-area {
            border: 2px dashed #818cf8;
            background: linear-gradient(135deg, rgba(99, 102, 241, 0.08) 0%, rgba(16, 185, 129, 0.08) 100%);
            transition: all 0.3s ease;
            cursor: pointer;
        }
        .upload-area:hover {
            border-color: #10b981;
            background: linear-gradient(135deg, rgba(16, 185, 129, 0.12) 0%, rgba(99, 102, 241, 0.12) 100%);
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(99, 102, 241, 0.08);
        }
        .upload-area.dragover {
            border-color: #059669;
            background: linear-gradient(135deg, rgba(16, 185, 129, 0.15) 0%, rgba(99, 102, 241, 0.15) 100%);
        }
        .btn-primary {
            background: linear-gradient(135deg, #6366f1 0%, #10b981 100%);
            color: white;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px 0 rgba(99, 102, 241, 0.25);
        }
        .btn-primary:hover {
            background: linear-gradient(135deg, #4f46e5 0%, #059669 100%);
            transform: translateY(-2px);
            box-shadow: 0 8px 25px 0 rgba(99, 102, 241, 0.3);
        }
        .success-border {
            border: 2px solid transparent !important;
            background: linear-gradient(white, white) padding-box, 
                        linear-gradient(135deg, #10b981, #34d399) border-box !important;
            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.2) !important;
        }
        .error-border {
            border: 2px solid transparent !important;
            background: linear-gradient(white, white) padding-box, 
                        linear-gradient(135deg, #ef4444, #dc2626) border-box !important;
            box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.2) !important;
        }
        .upload-success {
            border: 2px dashed #10b981 !important;
            background: linear-gradient(135deg, rgba(16, 185, 129, 0.15) 0%, rgba(99, 102, 241, 0.08) 100%) !important;
        }
        .preview-container {
            background: linear-gradient(135deg, #6366f1 0%, #10b981 100%);
            padding: 4px;
            border-radius: 12px;
        }
        .remove-btn {
            background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
            transition: all 0.3s ease;
        }
        .remove-btn:hover {
            transform: scale(1.1);
            box-shadow: 0 4px 15px rgba(239, 68, 68, 0.4);
        }
    </style>
</head>

<body class="min-h-screen py-8 px-4 sm:px-6 lg:px-8">
    <div class="max-w-4xl mx-auto">
        <div class="text-center mb-10 main-container rounded-2xl p-8">
            <h1 class="text-4xl font-bold header-gradient mb-4">
                Registrasi Beasiswa
            </h1>
            <p class="text-gray-700 text-lg">Daftarkan program <span class="font-semibold text-indigo-600">Beasiswa</span> Anda untuk ACEED Universitas Andalas 2025</p>
        </div>
        
        <div class="form-container shadow-2xl rounded-2xl p-8">
            <form id="scholarshipRegistrationForm" action="{{ route('register.scholarship.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                @csrf
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="space-y-6">
                        <div>
                            <label for="name" class="block text-sm font-medium form-label mb-3">Nama Beasiswa / Institusi <span class="text-red-500">*</span></label>
                            <input type="text" id="name" name="name" value="{{ old('name') }}" class="form-input w-full px-4 py-3 rounded-xl" placeholder="Contoh: Beasiswa Anak Bangsa" required>
                        </div>
                        <div>
                            <label for="phone" class="block text-sm font-medium form-label mb-3">Nomor WhatsApp PIC <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none"><span class="text-gray-500 font-medium">+62</span></div>
                                <input type="text" id="phone" name="phone" value="{{ old('phone') }}" class="form-input w-full pl-14 pr-4 py-3 rounded-xl" placeholder="8123456789" required>
                            </div>
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium form-label mb-3">Email PIC <span class="text-red-500">*</span></label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-input w-full px-4 py-3 rounded-xl" placeholder="Masukkan email aktif" required>
                        </div>
                        <div>
                            <label for="password" class="block text-sm font-medium form-label mb-3">Password <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <input type="password" id="password" name="password" class="form-input w-full px-4 py-3 pr-12 rounded-xl" placeholder="Masukkan password" required>
                                <button type="button" id="togglePassword" class="absolute inset-y-0 right-0 pr-4 flex items-center text-gray-500 hover:text-green-600">
                                    <svg id="eyeIcon" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                    <svg id="eyeOffIcon" class="w-5 h-5 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.878 9.878L3 3m6.878 6.878L21 21"></path></svg>
                                </button>
                            </div>
                            <div class="mt-2 text-xs text-gray-600">
                                <ul class="list-disc list-inside mt-1 space-y-1">
                                    <li id="length-check" class="text-red-500">Minimal 8 karakter</li>
                                    <li id="uppercase-check" class="text-red-500">Huruf besar (A-Z)</li>
                                    <li id="lowercase-check" class="text-red-500">Huruf kecil (a-z)</li>
                                    <li id="number-check" class="text-red-500">Angka (0-9)</li>
                                </ul>
                            </div>
                        </div>
                        <div>
                            <label for="password_confirmation" class="block text-sm font-medium form-label mb-3">Konfirmasi Password <span class="text-red-500">*</span></label>
                            <input type="password" id="password_confirmation" name="password_confirmation" class="form-input w-full px-4 py-3 rounded-xl" placeholder="Masukkan ulang password" required>
                            <p id="password-match" class="text-xs mt-1 hidden"></p>
                        </div>
                    </div>

                    <div class="space-y-6">
                        <div>
                            <label for="description" class="block text-sm font-medium form-label mb-3">Deskripsi Beasiswa <span class="text-red-500">*</span></label>
                            <textarea id="description" name="description" rows="5" class="form-input w-full px-4 py-3 rounded-xl resize-none" placeholder="Jelaskan tentang program beasiswa Anda..." required>{{ old('description') }}</textarea>
                        </div>
                        <div>
                            <label for="logo" class="block text-sm font-medium form-label mb-3">Upload Logo <span class="text-red-500">*</span></label>
                            <div id="logoUploadArea" class="upload-area rounded-xl p-6 text-center">
                                <input type="file" id="logo" name="logo" class="hidden" accept="image/*" required>
                                <div id="logoUploadPlaceholder">
                                    <div class="mx-auto w-16 h-16 bg-gradient-to-br from-indigo-400 to-green-400 rounded-full flex items-center justify-center mb-4"><svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg></div>
                                    <p class="text-sm font-medium text-gray-700 mb-2">Klik untuk upload atau drag & drop</p>
                                    <p class="text-xs text-gray-500">PNG, JPG, JPEG (max. 2MB)</p>
                                </div>
                                <div id="logoPreview" class="hidden">
                                    <div class="relative inline-block preview-container">
                                        <img id="logoPreviewImg" src="" alt="Preview" class="mx-auto h-24 w-24 object-cover rounded-lg">
                                        <button type="button" id="removeLogo" class="absolute -top-2 -right-2 remove-btn text-white rounded-full w-7 h-7 flex items-center justify-center text-sm font-bold">×</button>
                                    </div>
                                    <p id="logoFileName" class="text-sm text-gray-600 mt-3 font-medium"></p>
                                </div>
                            </div>
                        </div>
                        <div>
                            <label for="file" class="block text-sm font-medium form-label mb-3">Upload Dokumen <span class="text-red-500">*</span></label>
                            <div id="fileUploadArea" class="upload-area rounded-xl p-6 text-center">
                                <input type="file" id="file" name="file" class="hidden" accept="application/pdf" required>
                                <div id="fileUploadPlaceholder">
                                    <div class="mx-auto w-16 h-16 bg-gradient-to-br from-indigo-400 to-green-400 rounded-full flex items-center justify-center mb-4"><svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4l2 4h7a2 2 0 012 2v6a4 4 0 01-4 4H7z"></path></svg></div>
                                    <p class="text-sm font-medium text-gray-700 mb-2">Klik untuk upload atau drag & drop</p>
                                    <p class="text-xs text-gray-500">PDF (max. 5MB)</p>
                                </div>
                                <div id="filePreview" class="hidden items-center justify-center flex-col">
                                    <div class="relative inline-block preview-container p-4">
                                        <div class="flex items-center">
                                            <svg class="w-10 h-10 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M8.5,13.5L11,16.5L14.5,12L19,18H5M21,19V5C21,3.89 20.1,3 19,3H5A2,2 0 0,0 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19Z" /></svg>
                                            <p id="fileName" class="text-sm text-white ml-3 font-medium"></p>
                                        </div>
                                        <button type="button" id="removeFile" class="absolute -top-2 -right-2 remove-btn text-white rounded-full w-7 h-7 flex items-center justify-center text-sm font-bold">×</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="pt-6">
                    <button type="submit" class="btn-primary w-full py-4 px-6 rounded-xl font-semibold text-lg">Daftar Beasiswa</button>
                </div>
            </form>
        </div>
    </div>
    
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('scholarshipRegistrationForm');
        
        // --- Password Logic ---
        const passwordInput = document.getElementById('password');
        const togglePassword = document.getElementById('togglePassword');
        const eyeIcon = document.getElementById('eyeIcon');
        const eyeOffIcon = document.getElementById('eyeOffIcon');
        togglePassword.addEventListener('click', () => {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            eyeIcon.classList.toggle('hidden');
            eyeOffIcon.classList.toggle('hidden');
        });

        const passwordConfirmation = document.getElementById('password_confirmation');
        const lengthCheck = document.getElementById('length-check');
        const uppercaseCheck = document.getElementById('uppercase-check');
        const lowercaseCheck = document.getElementById('lowercase-check');
        const numberCheck = document.getElementById('number-check');
        const passwordMatch = document.getElementById('password-match');

        passwordInput.addEventListener('input', (e) => {
            const pw = e.target.value;
            const checks = {
                length: pw.length >= 8,
                uppercase: /[A-Z]/.test(pw),
                lowercase: /[a-z]/.test(pw),
                number: /[0-9]/.test(pw)
            };
            const updateCheck = (el, valid) => {
                el.classList.toggle('text-red-500', !valid);
                el.classList.toggle('text-green-500', valid);
            };
            updateCheck(lengthCheck, checks.length);
            updateCheck(uppercaseCheck, checks.uppercase);
            updateCheck(lowercaseCheck, checks.lowercase);
            updateCheck(numberCheck, checks.number);
            checkPasswordsMatch();
        });

        passwordConfirmation.addEventListener('input', checkPasswordsMatch);

        function checkPasswordsMatch() {
            const pw = passwordInput.value;
            const conf = passwordConfirmation.value;
            if (conf.length > 0) {
                passwordMatch.classList.remove('hidden');
                const match = pw === conf;
                passwordMatch.textContent = match ? 'Password cocok' : 'Password tidak cocok';
                passwordMatch.classList.toggle('text-green-500', match);
                passwordMatch.classList.toggle('text-red-500', !match);
            } else {
                passwordMatch.classList.add('hidden');
            }
        }

        // --- Phone Number Logic ---
        const phoneInput = document.getElementById('phone');
        phoneInput.addEventListener('input', (e) => {
            let value = e.target.value.replace(/[^0-9]/g, '');
            if (value.startsWith('0')) value = value.substring(1);
            if (value.length > 13) value = value.substring(0, 13);
            e.target.value = value;
        });

        // --- File Upload Logic ---
        function setupFileUpload(inputId, areaId, placeholderId, previewId, previewElId, removeBtnId, isImage) {
            const input = document.getElementById(inputId);
            const area = document.getElementById(areaId);
            const placeholder = document.getElementById(placeholderId);
            const preview = document.getElementById(previewId);
            const previewEl = document.getElementById(previewElId);
            const removeBtn = document.getElementById(removeBtnId);

            area.addEventListener('click', () => input.click());
            ['dragover', 'dragleave', 'drop'].forEach(eventName => {
                area.addEventListener(eventName, e => {
                    e.preventDefault();
                    e.stopPropagation();
                    if (eventName === 'dragover') area.classList.add('dragover');
                    else area.classList.remove('dragover');
                    if (eventName === 'drop') {
                        const files = e.dataTransfer.files;
                        if (files.length > 0) handleFile(files[0]);
                    }
                });
            });

            input.addEventListener('change', (e) => {
                if (e.target.files.length > 0) handleFile(e.target.files[0]);
            });

            removeBtn.addEventListener('click', (e) => {
                e.stopPropagation();
                resetUpload();
            });

            function handleFile(file) {
                let isValid = false;
                let errorTitle = '';
                let errorText = '';

                if (isImage) {
                    isValid = file.type.startsWith('image/') && file.size <= 2 * 1024 * 1024;
                    errorTitle = !file.type.startsWith('image/') ? 'Format File Salah' : 'File Terlalu Besar';
                    errorText = !file.type.startsWith('image/') ? 'Hanya file gambar (PNG, JPG) yang diperbolehkan!' : 'Ukuran file maksimal 2MB!';
                } else {
                    isValid = file.type === 'application/pdf' && file.size <= 5 * 1024 * 1024;
                    errorTitle = file.type !== 'application/pdf' ? 'Format File Salah' : 'File Terlalu Besar';
                    errorText = file.type !== 'application/pdf' ? 'Hanya file PDF yang diperbolehkan!' : 'Ukuran file maksimal 5MB!';
                }

                if (!isValid) {
                    Swal.fire({ icon: 'error', title: errorTitle, text: errorText, confirmButtonColor: '#6366f1' });
                    resetUpload();
                    return;
                }

                placeholder.classList.add('hidden');
                preview.classList.remove('hidden');
                area.classList.add('upload-success');

                if (isImage) {
                    const reader = new FileReader();
                    reader.onload = (e) => { previewEl.src = e.target.result; };
                    reader.readAsDataURL(file);
                    document.getElementById('logoFileName').textContent = file.name;
                } else {
                    previewEl.textContent = file.name;
                }

                const dataTransfer = new DataTransfer();
                dataTransfer.items.add(file);
                input.files = dataTransfer.files;
            }

            function resetUpload() {
                input.value = '';
                placeholder.classList.remove('hidden');
                preview.classList.add('hidden');
                area.classList.remove('upload-success');
                if (isImage) {
                    previewEl.src = '';
                    document.getElementById('logoFileName').textContent = '';
                } else {
                    previewEl.textContent = '';
                }
            }
            return resetUpload;
        }

        const resetLogoUpload = setupFileUpload('logo', 'logoUploadArea', 'logoUploadPlaceholder', 'logoPreview', 'logoPreviewImg', 'removeLogo', true);
        const resetFileUpload = setupFileUpload('file', 'fileUploadArea', 'fileUploadPlaceholder', 'filePreview', 'fileName', 'removeFile', false);
        
        // --- Form Submission Logic ---
        form.addEventListener('submit', function(event) {
            event.preventDefault();
            const formData = new FormData(form);
            const submitBtn = form.querySelector('button[type="submit"]');
            const originalText = submitBtn.textContent;

            Swal.fire({
                title: 'Memproses Pendaftaran...',
                text: 'Mohon tunggu sebentar',
                allowOutsideClick: false,
                allowEscapeKey: false,
                showConfirmButton: false,
                background: 'linear-gradient(135deg, #eef2ff 0%, #f0fdf4 100%)',
                didOpen: () => { Swal.showLoading(); }
            });
            
            submitBtn.textContent = 'Memproses...';
            submitBtn.disabled = true;
            
            fetch(form.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => response.json())
            .then(data => {
                Swal.close();
                submitBtn.textContent = originalText;
                submitBtn.disabled = false;

                if (data.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Pendaftaran Berhasil!',
                        text: data.message || 'Pendaftaran Anda telah berhasil!',
                        confirmButtonColor: '#10b981',
                        background: 'linear-gradient(135deg, #eef2ff 0%, #f0fdf4 100%)'
                    }).then(() => {
                        form.reset();
                        resetLogoUpload();
                        resetFileUpload();
                        window.location.href = data.redirect || '/';
                    });
                } else {
                    let errorMessages = Object.values(data.errors || { general: [data.message] }).flat();
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops, terjadi kesalahan!',
                        html: errorMessages.join('<br>'),
                        confirmButtonColor: '#6366f1',
                        background: 'linear-gradient(135deg, #eef2ff 0%, #f0fdf4 100%)'
                    });
                }
            })
            .catch(error => {
                Swal.close();
                submitBtn.textContent = originalText;
                submitBtn.disabled = false;
                Swal.fire({
                    icon: 'error',
                    title: 'Koneksi Bermasalah',
                    text: 'Terjadi kesalahan jaringan. Silakan coba lagi.',
                    confirmButtonColor: '#6366f1'
                });
                console.error('Error:', error);
            });
        });
    });
    </script>
</body>
</html>