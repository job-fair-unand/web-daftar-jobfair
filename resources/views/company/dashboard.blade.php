@extends('layouts.company')

@section('title', 'Dashboard')

@section('content')
<style>
        body, html {
            margin: 0; padding: 0;
            overflow: hidden;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            background-color: #f1f5f9;
        }
        .main-container { display: flex; flex-direction: column; height: 100vh; }
        @media (min-width: 768px) { .main-container { flex-direction: row; } }
        .viewport {
            flex-grow: 1; position: relative; overflow: auto;
            display: grid; place-items: center; background-color: #e2e8f0;
        }
        .layout-grid {
            display: grid; transform-origin: 0 0;
            transition: transform 0.2s ease-out;
        }
        .layout-grid > * {
            grid-area: 1 / 1 / 2 / 2;
            width: 100%; height: auto;
        }
        .svg-overlay { height: 100%; pointer-events: none; }
        .booth-outline {
            fill: rgba(99, 102, 241, 0.2); stroke: #6366f1;
            stroke-width: 4; opacity: 0;
            transition: all 0.2s; cursor: pointer; pointer-events: auto;
        }
        .booth-outline.highlight, .booth-outline.active { opacity: 1; }
        /* Style untuk booth yang sudah diambil */
        .booth-outline.taken {
            fill: rgba(107, 114, 128, 0.5); /* gray-500 transparan */
            stroke: #4b5563; /* gray-600 */
            cursor: not-allowed;
            opacity: 1;
        }
        .info-container {
            width: 100%; background-color: white; padding: 1.5rem;
            box-shadow: -2px 0 8px rgba(0,0,0,0.1); overflow-y: auto;
        }
        @media (min-width: 768px) { .info-container { width: 350px; flex-shrink: 0; } }
        .zoom-controls {
            position: absolute; bottom: 1rem; left: 1rem; z-index: 10;
            display: flex; gap: 0.5rem;
        }
        .zoom-controls button {
            width: 3rem; height: 3rem;
            border-radius: 9999px; border: 1px solid #ccc;
            background-color: rgba(255, 255, 255, 0.9);
            font-size: 1.5rem; font-weight: bold;
            cursor: pointer; box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>

    <div class="main-container">
        <div class="viewport">
            <div id="layout-grid" class="layout-grid">
                <img id="jobfair-layout" src="{{ asset('assets/images/layout-aceed.png') }}" alt="Layout Job Fair" data-original-width="2565" data-original-height="2693">
                <svg id="svg-overlay" class="svg-overlay"></svg>
            </div>
            <div class="zoom-controls">
                <button id="zoom-in">+</button>
                <button id="zoom-out">-</button>
                <button id="reset-zoom">⟲</button>
            </div>
        </div>

        <div class="info-container">
            <h1 class="text-2xl font-bold text-slate-800">ACEED Job Fair 2025</h1>
            <p class="text-slate-500 mb-4 border-b pb-4">Pilih Booth</p>
            
            <div id="info-panel" class="mb-6">
                <p class="text-slate-600">Silakan klik salah satu booth di peta untuk memilih booth.</p>
            </div>

            <div id="selected-list-container">
                <h2 class="text-xl font-bold text-slate-800">Daftar Pilihan Anda</h2>
                <ul id="selected-list" class="mt-2 list-disc list-inside text-slate-700">
                    <li id="no-selection" class="text-slate-500 italic">Belum ada booth yang dipilih.</li>
                </ul>
            </div>

            <!-- Tambahkan tombol Lanjutkan Pembayaran di sini -->
            <button id="proceed-payment-btn" class="w-full mt-4 bg-indigo-600 text-white font-bold py-2 px-4 rounded hover:bg-indigo-700 transition-colors disabled:bg-gray-400 disabled:cursor-not-allowed" disabled>
                Lanjutkan Pembayaran
            </button>
        </div>
    </div>

    <script id="boothData" type="application/json">
    [
        {"coords": "1018,1603,1108,1666", "name": "Booth Gold 1"},
        {"coords": "1118,1603,1213,1664", "name": "Booth Gold 2"},
        {"coords": "1220,1603,1311,1669", "name": "Booth Gold 3"},
        {"coords": "1320,1603,1410,1664", "name": "Booth Gold 4"},
        {"coords": "1420,1603,1515,1666", "name": "Booth Gold 5"},
        {"coords": "1522,1603,1613,1666", "name": "Booth Gold 6"},
        {"coords": "1043,1269,1106,1362", "name": "Booth Gold 7"},
        {"coords": "1510,1259,1576,1354", "name": "Booth Gold 8"},
        {"coords": "904,1269,967,1364", "name": "Booth Silver 1"},
        {"coords": "1043,1367,1106,1459", "name": "Booth Silver 2"},
        {"coords": "1045,1466,1106,1561", "name": "Booth Silver 3"},
        {"coords": "1510,1362,1576,1454", "name": "Booth Silver 4"},
        {"coords": "1510,1459,1576,1554", "name": "Booth Silver 5"},
        {"coords": "1656,1259,1717,1357", "name": "Booth Silver 6"},
        {"coords": "1198,1174,1315,1264", "name": "Booth Platinum 1"},
        {"coords": "1320,1177,1435,1262", "name": "Booth Platinum 2"},
        {"coords": "1198,1267,1315,1357", "name": "Booth Platinum 3"},
        {"coords": "1320,1267,1432,1357", "name": "Booth Platinum 4"},
        {"coords": "1201,1359,1315,1449", "name": "Booth Platinum 5"},
        {"coords": "1318,1359,1432,1447", "name": "Booth Platinum 6"},
        {"coords": "1198,1452,1313,1542", "name": "Booth Platinum 7"},
        {"coords": "1318,1454,1435,1539", "name": "Booth Platinum 8"},
        {"coords": "599,1306,663,1403", "name": "Booth Bronze 1"},
        {"coords": "602,1406,663,1503", "name": "Booth Bronze 2"},
        {"coords": "604,1505,663,1600", "name": "Booth Bronze 3"},
        {"coords": "672,1613,762,1669", "name": "Booth Bronze 4"},
        {"coords": "767,1610,862,1671", "name": "Booth Bronze 5"},
        {"coords": "901,1367,967,1464", "name": "Booth Bronze 6"},
        {"coords": "906,1466,965,1561", "name": "Booth Bronze 7"},
        {"coords": "1656,1359,1717,1452", "name": "Booth Bronze 8"},
        {"coords": "1656,1462,1720,1554", "name": "Booth Bronze 9"}
    ]
    </script>

    <script>
    document.addEventListener('DOMContentLoaded', () => {
        const image = document.getElementById('jobfair-layout');
        const layoutGrid = document.getElementById('layout-grid');
        const svgOverlay = document.getElementById('svg-overlay');
        const infoPanel = document.getElementById('info-panel');
        const selectedList = document.getElementById('selected-list');
        const proceedPaymentBtn = document.getElementById('proceed-payment-btn');
        
        let activeOutline = null;
        let scale = 1.0;
        const zoomStep = 0.25;
        let selectedBooth = null;
        const outlineElements = {};

        // Fungsi untuk mengupdate daftar pilihan di UI
        function updateSelectedListUI() {
            selectedList.innerHTML = ''; // Kosongkan daftar
            if (!selectedBooth) {
                selectedList.innerHTML = '<li id="no-selection" class="text-slate-500 italic">Belum ada booth yang dipilih.</li>';
                proceedPaymentBtn.disabled = true; // Nonaktifkan tombol jika tidak ada booth yang dipilih
            } else {
                const li = document.createElement('li');
                li.className = 'flex justify-between items-center mb-1';
                li.textContent = selectedBooth;
                
                const removeBtn = document.createElement('button');
                removeBtn.textContent = '✖';
                removeBtn.className = 'text-red-500 hover:text-red-700 font-bold text-xs ml-2';
                removeBtn.onclick = () => deselectBooth(selectedBooth);
                
                li.appendChild(removeBtn);
                selectedList.appendChild(li);
                proceedPaymentBtn.disabled = false; // Aktifkan tombol jika ada booth yang dipilih
            }
        }

        // Fungsi untuk memilih booth
        function selectBooth(boothName) {
            if (selectedBooth) {
                const prevOutline = outlineElements[selectedBooth];
                if (prevOutline) {
                    prevOutline.classList.remove('taken', 'active');
                    const prevTitleElement = prevOutline.querySelector('title');
                    if (prevTitleElement) {
                        prevOutline.removeChild(prevTitleElement);
                    }
                }
            }
            
            selectedBooth = boothName;
            const outline = outlineElements[boothName];
            if (outline) {
                outline.classList.add('taken');
                const titleElement = document.createElementNS('http://www.w3.org/2000/svg', 'title');
                titleElement.textContent = 'Booth sudah diambil';
                outline.appendChild(titleElement);
            }
            updateSelectedListUI();
            infoPanel.innerHTML = '<p class="text-slate-600">Anda telah memilih booth. Pilih booth lain untuk mengganti pilihan.</p>';
        }

        // Fungsi untuk membatalkan pilihan booth
        function deselectBooth(boothName) {
            if (selectedBooth === boothName) {
                const outline = outlineElements[boothName];
                if (outline) {
                    outline.classList.remove('taken', 'active');
                    const titleElement = outline.querySelector('title');
                    if (titleElement) {
                        outline.removeChild(titleElement);
                    }
                }
                selectedBooth = null;
                updateSelectedListUI();
            }
        }

        // Event listener untuk tombol Lanjutkan Pembayaran
        proceedPaymentBtn.addEventListener('click', () => {
            if (selectedBooth) {
                // Create a form to submit the selected booth
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = '{{ route("company.pembayaran") }}';
                
                // Add CSRF token
                const csrfToken = document.createElement('input');
                csrfToken.type = 'hidden';
                csrfToken.name = '_token';
                csrfToken.value = '{{ csrf_token() }}';
                form.appendChild(csrfToken);
                
                // Add the selected booth
                const boothInput = document.createElement('input');
                boothInput.type = 'hidden';
                boothInput.name = 'booths';
                boothInput.value = selectedBooth;
                form.appendChild(boothInput);
                
                // Append form to body and submit
                document.body.appendChild(form);
                form.submit();
            }
        });

        function createSvgOutlines() {
            const boothData = JSON.parse(document.getElementById('boothData').textContent);
            const originalWidth = image.dataset.originalWidth;
            const originalHeight = image.dataset.originalHeight;

            svgOverlay.setAttribute('viewBox', `0 0 ${originalWidth} ${originalHeight}`);
            svgOverlay.innerHTML = '';

            boothData.forEach(booth => {
                const coords = booth.coords.split(',').map(Number);
                const rect = document.createElementNS('http://www.w3.org/2000/svg', 'rect');
                rect.setAttribute('x', coords[0]);
                rect.setAttribute('y', coords[1]);
                rect.setAttribute('width', coords[2] - coords[0]);
                rect.setAttribute('height', coords[3] - coords[1]);
                rect.classList.add('booth-outline');

                outlineElements[booth.name] = rect;

                rect.addEventListener('click', () => {
                    if (selectedBooth === booth.name) {
                        infoPanel.innerHTML = `<p class="text-red-600 font-bold">Booth "${booth.name}" sudah Anda pilih.</p>`;
                        return;
                    }
                    
                    infoPanel.innerHTML = `
                        <h2 class="text-lg font-bold text-indigo-600">Detail Booth</h2>
                        <p class="text-2xl font-semibold text-slate-800">${booth.name}</p>
                        <button id="select-booth-btn" class="w-full mt-4 bg-indigo-600 text-white font-bold py-2 px-4 rounded hover:bg-indigo-700 transition-colors">
                            ${selectedBooth ? 'Ganti dengan Booth Ini' : 'Pilih Booth Ini'}
                        </button>
                    `;

                    document.getElementById('select-booth-btn').onclick = () => selectBooth(booth.name);

                    if (activeOutline) activeOutline.classList.remove('active');
                    rect.classList.add('active');
                    activeOutline = rect;
                });

                rect.addEventListener('mouseenter', () => rect.classList.add('highlight'));
                rect.addEventListener('mouseleave', () => {
                    if (activeOutline !== rect) {
                        rect.classList.remove('highlight');
                    }
                });
                
                svgOverlay.appendChild(rect);
            });
        }
        
        function applyZoom() {
            layoutGrid.style.transform = `scale(${scale})`;
        }
        document.getElementById('zoom-in').addEventListener('click', () => { scale = Math.min(3.0, scale + zoomStep); applyZoom(); });
        document.getElementById('zoom-out').addEventListener('click', () => { scale = Math.max(1.0, scale - zoomStep); applyZoom(); });
        document.getElementById('reset-zoom').addEventListener('click', () => { scale = 1.0; applyZoom(); });

        if (image.complete) {
            createSvgOutlines();
        } else {
            image.addEventListener('load', createSvgOutlines);
        }
    });
    </script>
@endsection