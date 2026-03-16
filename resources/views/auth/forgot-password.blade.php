<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Reset Password - aBalaBal Klinik</title>
    @vite('resources/css/app.css')
</head>

<body
    class="min-h-screen bg-gradient-to-br from-slate-900 via-blue-900 to-cyan-600 flex items-center justify-center relative overflow-hidden">

    <!-- Animated Background Blur -->
    <div class="absolute w-[500px] h-[500px] bg-white/20 rounded-full blur-3xl -top-32 -left-32 animate-pulse"></div>
    <div class="absolute w-[500px] h-[500px] bg-cyan-300/20 rounded-full blur-3xl -bottom-32 -right-32 animate-pulse">
    </div>

    <div class="relative w-full max-w-md px-6">

        <!-- Glass Card -->
        <div
            class="backdrop-blur-xl bg-white/10 border border-white/20 shadow-2xl rounded-3xl p-8 text-white transition duration-500 hover:scale-[1.01]">

            <!-- Logo -->
            <div class="flex flex-col items-center mb-6">
                <div
                    class="w-20 h-20 rounded-2xl bg-white/20 backdrop-blur-lg flex items-center justify-center shadow-lg mb-4">
                    <!-- GANTI SESUAI LOGO -->
                    <img src="{{ asset('images/Logo2.png') }}" class="w-20 h-20 object-contain">
                </div>
                <h1 class="text-2xl font-bold tracking-wide">aBalaBal Klinik</h1>
                <p class="text-sm text-white/70">Password Recovery</p>
            </div>

            <!-- Description -->
            <div class="mb-4 text-sm text-white/80 leading-relaxed">
                Enter your registered email address. We will send you a secure link to reset your password.
            </div>

            <!-- Session Status -->
            @if (session('status'))
                <div class="mb-4 text-sm text-green-300 bg-green-500/20 border border-green-300/30 p-3 rounded-xl">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}" class="space-y-4">
                @csrf

                <!-- Email -->
                <div>
                    <label class="text-sm text-white/80">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}"
                        class="w-full mt-1 px-4 py-2 rounded-xl bg-white/20 border border-white/30 placeholder-white/60 text-white focus:outline-none focus:ring-2 focus:ring-cyan-300 transition"
                        placeholder="Enter your email" required autofocus>
                    @error('email')
                        <p class="text-red-300 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Button -->
                <button type="submit"
                    class="w-full py-2 mt-4 rounded-xl bg-gradient-to-r from-cyan-400 to-blue-500 hover:from-blue-500 hover:to-indigo-600 transition-all duration-300 shadow-lg font-semibold tracking-wide">
                    Send Reset Link
                </button>

                <!-- Back to Login -->
                <div class="text-center mt-4">
                    <a href="{{ route('login') }}" class="text-sm text-white/70 hover:text-white transition">
                        Back to Login
                    </a>
                </div>
            </form>
        </div>

        <p class="text-center text-xs text-white/60 mt-6">
            © {{ date('Y') }} aBalaBal Klinik Management System
        </p>
    </div>

</body>

</html>
