<x-app-layout>

    <x-slot name="header">
        <div
            class="text-2xl font-bold text-gray-800 bg-gradient-to-br from-slate-900 via-blue-900 to-cyan-600 text-transparent bg-clip-text">
            Dashboard Rekam Medis aBalaBal Klinik
    </x-slot>

    <div class="space-y-8">

        <!-- Welcome Card -->
        <div class="relative overflow-hidden
            backdrop-blur-xl
            bg-gradient-to-br from-slate-900 via-blue-900 to-cyan-600
            border border-white/20
            rounded-3xl
            shadow-2xl
            p-8
            text-white">

            <!-- Text Section -->
            <div class="max-w-lg relative z-10">
                <h3 class="text-3xl font-bold tracking-wide">
                    Hallo, {{ Auth::user()->username }} 🩺
                </h3>

                <p class="mt-3 text-white/90 text-lg">
                    Welcome to <span class="font-semibold">Rekam Medis aBalaBal Klinik</span>
                    Management System
                </p>
            </div>

            <!-- 3D Doctor Image -->
            <div class="absolute right-0 bottom-0 h-full flex items-end pr-6 pointer-events-none">
                <img src="{{ asset('images/Logo1.png') }}"
                    class="h-[130px] object-contain drop-shadow-2xl animate-float">
            </div>

        </div>


        <!-- Statistik -->
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">

            <!-- Card -->
            <div
                class="backdrop-blur-xl bg-white/10 border border-white/20 rounded-2xl p-6 shadow-lg hover:scale-105 transition duration-300">
                <p class="text-black/80">Total Pasien</p>
                <div class="flex justify-between items-center mt-3">
                    <h3 class="text-3xl font-bold">
                        {{ $totalPasien }}
                    </h3>
                    <div class="w-5 h-5 text-slate-400 group-hover:text-blue-800 transition">
                        <img src="{{ asset('images/ipasi.png') }}" class="w-5 h-5 object-contain">
                    </div>
                </div>
            </div>

            <div
                class="backdrop-blur-xl bg-white/10 border border-white/20 rounded-2xl p-6 shadow-lg hover:scale-105 transition duration-300">
                <p class="text-black/80">Total Dokter</p>
                <div class="flex justify-between items-center mt-3">
                    <h3 class="text-3xl font-bold">
                        {{ $totalDoctor }}
                    </h3>
                    <div class="w-5 h-5 text-slate-400 group-hover:text-blue-800 transition">
                        <img src="{{ asset('images/idoc.png') }}" class="w-5 h-5 object-contain">
                    </div>
                </div>
            </div>

            <div
                class="backdrop-blur-xl bg-white/10 border border-white/20 rounded-2xl p-6 shadow-lg hover:scale-105 transition duration-300">
                <p class="text-black/80">Total Desa</p>
                <div class="flex justify-between items-center mt-3">
                    <h3 class="text-3xl font-bold">
                        {{ $totalDesa }}
                    </h3>
                    <div class="w-5 h-5 text-slate-400 group-hover:text-blue-600 transition">
                        <img src="{{ asset('images/imap.png') }}" class="w-5 h-5 object-contain">
                    </div>
                </div>
            </div>

            <div
                class="backdrop-blur-xl bg-white/10 border border-white/20 rounded-2xl p-6 shadow-lg hover:scale-105 transition duration-300">
                <p class="text-black/80">Total Jenis Kelamin</p>
                <div class="flex justify-between items-center mt-3">
                    <h3 class="text-3xl font-bold">
                        {{ $totalJenisKelamin }}
                    </h3>
                    <div class="w-5 h-5 text-slate-400 group-hover:text-blue-800 transition">
                        <img src="{{ asset('images/igen.png') }}" class="w-5 h-5 object-contain">
                    </div>
                </div>
            </div>

        </div>

    </div>

</x-app-layout>
