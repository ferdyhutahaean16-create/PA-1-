@extends('layouts.main')

@section('content')
<div class="container mx-auto py-12">
    <div class="max-w-md mx-auto bg-white p-6 rounded shadow">
        <h2 class="text-xl font-bold mb-4">Login untuk Peminjaman</h2>

        @if($errors->any())
            <div class="text-red-600 mb-4">{{ $errors->first() }}</div>
        @endif

        <form action="{{ route('pinjam.login.post') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block mb-1">Username</label>
                <input type="text" name="username" class="w-full border px-3 py-2" required>
            </div>

            <div class="mb-4">
                <label class="block mb-1">Password</label>
                <input type="password" name="password" class="w-full border px-3 py-2" required>
            </div>

            <div class="flex justify-between items-center">
                <button class="btn btn-primary" type="submit">Login</button>
                <a href="/" class="text-sm text-gray-600">Kembali</a>
            </div>
        </form>
    </div>
</div>
@endsection
