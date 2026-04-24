<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Prodi Bioteknologi IT Del</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 h-screen flex items-center justify-center p-6">

    <div class="max-w-md w-full bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">
        <div class="bg-[#1a4a38] p-8 text-center">
            <h2 class="text-2xl font-extrabold text-white mb-2">Panel Admin</h2>
            <p class="text-green-100 text-sm">Program Studi Bioteknologi IT Del</p>
        </div>
        
        <div class="p-8">
            @if ($errors->any())
                <div class="bg-red-50 text-red-600 p-3 rounded-lg text-sm mb-6 border border-red-100">
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="mb-5">
                    <label class="block text-sm font-bold text-gray-700 mb-2">Alamat Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" required autofocus
                           class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#1a4a38] focus:border-transparent transition-all outline-none" 
                           placeholder="admin@del.ac.id">
                </div>
                
                <div class="mb-8">
                    <label class="block text-sm font-bold text-gray-700 mb-2">Password</label>
                    <input type="password" name="password" required 
                           class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#1a4a38] focus:border-transparent transition-all outline-none" 
                           placeholder="••••••••">
                </div>

                <button type="submit" class="w-full bg-[#1a4a38] hover:bg-green-800 text-white font-bold py-3 px-4 rounded-lg transition-colors shadow-lg">
                    Masuk ke Sistem
                </button>
            </form>
        </div>
    </div>

</body>
</html>