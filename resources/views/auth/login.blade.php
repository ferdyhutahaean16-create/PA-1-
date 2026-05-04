<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Prodi Bioteknologi IT Del</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .bg-biotek { background-color: #1a4a38; }
        .text-biotek { color: #1a4a38; }
    </style>
</head>
<body class="bg-gray-100 h-screen flex items-center justify-center p-6">

    <div class="max-w-md w-full">
        <!-- Logo atau Tombol Kembali -->
        <div class="text-center mb-6">
            <a href="{{ url('/') }}" class="text-sm font-semibold text-gray-500 hover:text-biotek transition-colors inline-flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Kembali ke Beranda
            </a>
        </div>

        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden border border-gray-100">
            <!-- Header -->
            <div class="bg-biotek p-8 text-center relative">
                <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/carbon-fibre.png')]"></div>
                <h2 class="text-2xl font-extrabold text-white mb-2 relative z-10">Panel Admin</h2>
                <p class="text-green-100 text-sm relative z-10">Program Studi Bioteknologi IT Del</p>
            </div>
            
            <div class="p-8">
                <!-- Alert Error -->
                @if ($errors->any())
                    <div class="bg-red-50 text-red-600 p-4 rounded-xl text-sm mb-6 border border-red-100 flex items-start gap-3">
                        <svg class="w-5 h-5 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                        <span>{{ $errors->first() }}</span>
                    </div>
                @endif

                <form action="{{ route('login') }}" method="POST">
                    @csrf <!-- Token Keamanan -->
                    
                    <div class="mb-5">
                        <label class="block text-sm font-bold text-gray-700 mb-2">Alamat Email</label>
                        <input type="email" name="email" value="{{ old('email') }}" required autofocus
                               class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-[#1a4a38] focus:border-transparent transition-all outline-none text-gray-600" 
                               placeholder="admin@del.ac.id">
                    </div>
                    
                    <div class="mb-8">
                        <label class="block text-sm font-bold text-gray-700 mb-2">Password</label>
                        <input type="password" name="password" required 
                               class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-[#1a4a38] focus:border-transparent transition-all outline-none text-gray-600" 
                               placeholder="••••••••">
                    </div>

                    <button type="submit" class="w-full bg-biotek hover:bg-green-900 text-white font-bold py-4 px-4 rounded-xl transition-all shadow-lg active:scale-[0.98]">
                        Masuk ke Sistem
                    </button>
                </form>
            </div>
        </div>
        
        <p class="text-center text-gray-400 text-xs mt-8">
            &copy; {{ date('Y') }} Institut Teknologi Del. All Rights Reserved.
        </p>
    </div>

</body>
</html>