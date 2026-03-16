<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>aBalaBal Klinik</title>
    @vite('resources/css/app.css')
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="bg-slate-100">

    <div x-data="{ open: false }" class="flex h-screen overflow-hidden">

        <!-- SIDEBAR -->
        <aside :class="open ? 'translate-x-0' : '-translate-x-full'" class="fixed md:relative z-40 md:translate-x-0 transform transition-all duration-300
            w-64 bg-white shadow-2xl border-r border-slate-200">

            <!-- Logo -->
            <div class="flex items-center gap-3 px-6 py-5 border-b border-slate-200">
                <div
                    class="w-10 h-10 bg-gradient-to-br from-blue-600 to-cyan-500 rounded-xl flex items-center justify-center">
                    <img src="{{ asset('images/Logo2.png') }}" class="w-10 h-10 object-contain">
                </div>
                <div>
                    <h1
                        class="font-bold text-slate-800 bg-gradient-to-br from-slate-900 via-blue-900 to-cyan-600 text-transparent bg-clip-text">
                        aBalaBal Klinik</h1>
                    <p class="text-xs text-slate-500">RekamMedis</p>
                </div>
            </div>

            <!-- Menu -->
            <nav class="p-4 space-y-2 text-sm">

                <!-- Dashboard -->
                <a href="{{ route('dashboard') }}" class="group shadow-lg flex items-center gap-3 px-4 py-3 rounded-xl
              hover:bg-blue-50 text-slate-700 hover:text-blue-600
              transition duration-300">

                    <!-- Icon -->
                    <div class="w-5 h-5 text-slate-400 group-hover:text-blue-600 transition">
                        <img src="{{ asset('images/idash.png') }}" class="w-5 h-5 object-contain">
                    </div>

                    Dashboard
                </a>
                <!-- Doctor -->
                <a href="{{ route('dokter.index') }}" class="group shadow-lg flex items-center gap-3 px-4 py-3 rounded-xl
              hover:bg-blue-50 text-slate-700 hover:text-blue-600
              transition duration-300">

                    <div class="w-5 h-5 text-slate-400 group-hover:text-blue-600 transition">
                        <img src="{{ asset('images/idoc.png') }}" class="w-5 h-5 object-contain">
                    </div>

                    Dokter
                </a>

                <!-- Pasien -->
                <a href="#" class="group shadow-lg flex items-center gap-3 px-4 py-3 rounded-xl
              hover:bg-blue-50 text-slate-700 hover:text-blue-600
              transition duration-300">

                    <div class="w-5 h-5 text-slate-400 group-hover:text-blue-600 transition">
                        <img src="{{ asset('images/ipasi.png') }}" class="w-5 h-5 object-contain">
                    </div>

                    Pasien
                </a>

                <!-- Desa -->
                <a href="#" class="group shadow-lg flex items-center gap-3 px-4 py-3 rounded-xl
              hover:bg-blue-50 text-slate-700 hover:text-blue-600
              transition duration-300">

                    <div class="w-5 h-5 text-slate-400 group-hover:text-blue-600 transition">
                        <img src="{{ asset('images/imap.png') }}" class="w-5 h-5 object-contain">
                    </div>

                    Desa
                </a>

                <!-- Riwayat Hipertensi -->
                <a href="#" class="group shadow-lg flex items-center gap-3 px-4 py-3 rounded-xl
              hover:bg-blue-50 text-slate-700 hover:text-blue-600
              transition duration-300">

                    <div class="w-5 h-5 text-slate-400 group-hover:text-blue-600 transition">
                        <img src="{{ asset('images/ihis.png') }}" class="w-5 h-5 object-contain">
                    </div>

                    Riwayat Hipertensi
                </a>

            </nav>

            <!-- Logout -->
            <div class="absolute bottom-6 left-6 right-6">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button
                        class="shadow-lg w-full bg-gradient-to-br from-slate-900 via-blue-900 to-cyan-600 text-white py-2 rounded-xl transition">
                        Logout
                    </button>
                </form>
            </div>

        </aside>


        <!-- OVERLAY MOBILE -->
        <div x-show="open" @click="open = false" class="fixed inset-0 bg-black/40 z-30 md:hidden"></div>


        <!-- MAIN CONTENT -->
        <div class="flex-1 flex flex-col overflow-hidden">

            <!-- TOPBAR -->
            <header class="bg-white shadow-sm border-b border-slate-200 px-6 py-4 flex items-center justify-between">

                <div class="flex items-center gap-4">
                    <!-- Hamburger -->
                    <button @click="open = !open" class="md:hidden text-slate-700">
                        ☰
                    </button>

                    <h2 class="text-lg font-semibold text-slate-800">
                        {{ $header ?? 'Dashboard' }}
                    </h2>
                </div>

                <div class="flex items-center gap-4">
                    <span class="text-black/80 mt-2">
                        {{ Auth::user()->username }}
                    </span>

                    <div class="w-9 h-9 bg-blue-600 text-white rounded-full flex items-center justify-center">
                        {{ strtoupper(substr(Auth::user()->username, 0, 1)) }}
                    </div>
                </div>
            </header>

            <!-- PAGE CONTENT -->
            <main class="shadow-lg flex-1 overflow-y-auto p-6 bg-slate-50">
                {{ $slot }}
            </main>

        </div>

    </div>

</body>

</html>
