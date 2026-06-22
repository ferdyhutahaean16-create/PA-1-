<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pratinjau Dokumen - {{ str_replace('_', ' ', $document->title) }}</title>
    <style>
        /* Memaksa halaman untuk penuh 100% tanpa margin/padding bawaan */
        body, html {
            margin: 0;
            padding: 0;
            width: 100vw;
            height: 100vh;
            overflow: hidden; /* Mencegah munculnya scrollbar ganda */
            background-color: #525659; /* Warna abu-abu gelap khas viewer PDF */
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .pdf-container {
            width: 100%;
            height: 100%;
            position: relative;
        }

        embed {
            width: 100%;
            height: 100%;
            border: none;
        }

        /* Kaca pelindung transparan untuk menutupi area atas (mencegah klik kanan di tempat toolbar biasa muncul) */
        .glass-shield {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 60px;
            background: transparent;
            z-index: 10;
        }

        /* Tombol kembali yang melayang di pojok kanan bawah */
        .floating-back {
            position: absolute;
            bottom: 30px;
            right: 30px;
            background-color: #1a4a38;
            color: white;
            padding: 12px 24px;
            border-radius: 50px;
            text-decoration: none;
            font-size: 14px;
            font-weight: bold;
            box-shadow: 0 10px 25px rgba(0,0,0,0.3);
            z-index: 20;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .floating-back:hover {
            background-color: #0c241c;
            transform: translateY(-3px);
        }
    </style>
</head>
<body>

    <div class="pdf-container">
        
        <div class="glass-shield" oncontextmenu="return false;"></div>

        <embed 
            src="{{ asset($document->file_path) }}#toolbar=0&navpanes=0&scrollbar=0" 
            type="application/pdf"
        />

        <a href="{{ url()->previous() }}" class="floating-back">
            <svg style="width: 18px; height: 18px;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Kembali ke Arsip
        </a>

    </div>

    <script>
        // Mematikan shortcut keyboard untuk mencegah Save As/Print/Inspect Element
        document.addEventListener('keydown', function(e) {
            if (e.ctrlKey && (e.key === 'p' || e.key === 's' || e.key === 'u' || e.key === 'c')) {
                e.preventDefault();
            }
        });

        // Mematikan klik kanan di seluruh layar agar dokumen tidak bisa di-download via konteks menu
        document.addEventListener('contextmenu', function(e) {
            e.preventDefault();
        });
    </script>
</body>
</html>