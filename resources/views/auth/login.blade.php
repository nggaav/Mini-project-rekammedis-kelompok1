<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login - aBalaBal Klinik</title>
    @vite('resources/css/app.css')
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js">
    </script>
</head>

<body
    class="min-h-screen bg-gradient-to-br from-slate-900 via-blue-900 to-cyan-600 flex items-center justify-center relative overflow-hidden">

    <!-- Animated Gradient Blur -->
    <div class="absolute w-[500px] h-[500px] bg-white/20 rounded-full blur-3xl -top-32 -left-32 animate-pulse"></div>
    <div class="absolute w-[500px] h-[500px] bg-cyan-300/20 rounded-full blur-3xl -bottom-32 -right-32 animate-pulse">
    </div>

    <div class="relative w-full max-w-md px-6">

        <!-- Glass Card -->
        <div
            class="backdrop-blur-xl bg-white/10 border border-white/20 shadow-2xl rounded-3xl p-8 text-white transition duration-500 hover:scale-[1.01]">

            <!-- Custom Logo -->
            <div class="flex flex-col items-center mb-6">
                <div
                    class="w-20 h-20 rounded-2xl bg-white/20 backdrop-blur-lg flex items-center justify-center shadow-lg mb-4">
                    <!-- GANTI LOGO SESUAI FILE KAMU -->
                    <img src="{{ asset('images/Logo2.png') }}" class="w-20 h-20 object-contain">
                </div>
                <h1 class="text-2xl font-bold tracking-wide">aBalaBal Klinik</h1>
                <p class="text-sm text-white/70">Doctor Login Panel</p>
            </div>

            <!-- Session Status -->
            @if (session('status'))
                <div class="mb-4 text-sm text-green-300 bg-green-500/20 border border-green-300/30 p-3 rounded-xl">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="space-y-4">
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

                <!-- Password -->
                <div x-data="{ show:false }">
                    <label class="text-sm text-white/80">Password</label>

                    <div class="relative mt-1">

                        <input :type="show ? 'text' : 'password'" name="password" autocomplete="new-password"
                            class="w-full px-4 py-2 pr-10 rounded-xl bg-white/20 border border-white/30 placeholder-white/60 text-white focus:outline-none focus:ring-2 focus:ring-cyan-300 transition"
                            placeholder="Enter your password" required>

                        <!-- Toggle Button -->
                        <button type="button" @click="show = !show"
                            class="absolute right-3 top-2.5 text-white/70 hover:text-white">

                            <!-- Eye Icon -->
                            <svg x-show="!show" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7
                        -1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>

                            <!-- Eye Off Icon -->
                            <svg x-show="show" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7
                        a9.956 9.956 0 012.293-3.95m3.087-2.588A9.953 9.953 0 0112 5
                        c4.478 0 8.268 2.943 9.542 7a9.97 9.97 0 01-4.043 5.065M15 12
                        a3 3 0 00-3-3m0 0a3 3 0 00-3 3m3-3v6m9-9l-18 18" />
                            </svg>

                        </button>

                    </div>

                    @error('password')
                        <p class="text-red-300 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Forgot -->
                <div class="flex items-center justify-between text-sm">
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-white/70 hover:text-white transition">
                            Forgot password?
                        </a>
                    @endif
                </div>

                <!-- Button -->
                <button type="submit"
                    class="w-full py-2 mt-4 rounded-xl bg-gradient-to-r from-cyan-400 to-blue-500 hover:from-blue-500 hover:to-indigo-600 transition-all duration-300 shadow-lg font-semibold tracking-wide">
                    Login
                </button>

                <!-- Link Register -->
                <div class="text-center mt-4">
                    <a href="{{ route('register') }}" class="text-sm text-white/70 hover:text-white transition">
                        Don't have an account? Register
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
