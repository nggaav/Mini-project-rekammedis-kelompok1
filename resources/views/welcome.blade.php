<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>aBalaBal Klinik</title>

    @vite('resources/css/app.css')
</head>

<body
    class="min-h-screen bg-gradient-to-br from-slate-900 via-blue-900 to-cyan-600 flex items-center justify-center relative overflow-hidden">

    <!-- Decorative Blur Background -->
    <div class="absolute w-96 h-96 bg-cyan-400 opacity-20 rounded-full blur-3xl -top-20 -left-20"></div>
    <div class="absolute w-96 h-96 bg-blue-800 opacity-20 rounded-full blur-3xl -bottom-20 -right-20"></div>

    <div class="relative z-10 w-full max-w-md px-6">

        <!-- Glass Card -->
        <div
            class="backdrop-blur-xl bg-white/10 border border-white/20 shadow-2xl rounded-3xl p-10 text-center transition-all duration-500 hover:scale-[1.02]">

            <!-- Logo -->
            <div
                class="mx-auto w-24 h-24 rounded-2xl bg-gradient-to-br from-cyan-400 to-blue-600 flex items-center justify-center shadow-lg shadow-cyan-500/30 mb-6 animate-fadeIn">
                <img src="{{ asset('images/Logo2.png') }}" class="w-20 h-20 object-contain">
            </div>

            <!-- Title -->
            <h1 class="text-2xl font-bold text-white tracking-wide">
                Welcome to
            </h1>
            <h2 class="text-3xl font-extrabold text-cyan-300 mb-2">
                aBalaBal Klinik
            </h2>

            <p class="text-blue-100 text-sm mb-8">
                Rekam Medis Modern & Terintegrasi
            </p>

            <!-- Auth Buttons -->
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="block w-full py-3 rounded-xl bg-gradient-to-r from-cyan-400 to-blue-500 text-white font-semibold shadow-lg shadow-cyan-500/30 hover:shadow-cyan-400/50 transition duration-300">
                        Masuk ke Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}"
                        class="block w-full py-3 rounded-xl bg-gradient-to-r from-cyan-400 to-blue-500 text-white font-semibold shadow-lg shadow-cyan-500/30 hover:shadow-cyan-400/50 transition duration-300 mb-3">
                        Login
                    </a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="block w-full py-3 rounded-xl bg-white/20 backdrop-blur-md text-white font-semibold border border-white/30 hover:bg-white/30 transition duration-300">
                            Register
                        </a>
                    @endif
                @endauth
            @endif

        </div>

        <!-- Footer -->
        <p class="text-center text-blue-100 text-xs mt-8 opacity-70">
            © {{ date('Y') }} aBalaBal Klinik. All rights reserved.
        </p>

    </div>

</body>

</html>
