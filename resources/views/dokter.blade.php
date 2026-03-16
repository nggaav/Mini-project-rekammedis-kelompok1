<x-app-layout>
    <x-slot name="header">
        <div
            class="text-2xl font-bold bg-gradient-to-br from-slate-900 via-blue-900 to-cyan-600 text-transparent bg-clip-text">
            Dokter
        </div>
    </x-slot>

    <div x-data="{ openModal:false, editModal:false, editData:{} }">

        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <img src="{{ asset('images/Logo1.png') }}" class="h-[90px] object-contain drop-shadow-xl">

            <button @click="openModal=true"
                class="bg-gradient-to-br from-slate-900 via-red-700 to-red-400 text-white px-5 py-2 rounded-xl shadow-lg">
                + Add A New Dokter
            </button>
        </div>

        <!-- TABLE CARD -->
        <div class="bg-white rounded-2xl shadow-xl p-6 border border-slate-200">

            <!-- Search & Show -->
            <form method="GET" class="flex justify-between mb-5">

                <div class="flex items-center gap-2 text-sm">
                    <span>Show</span>
                    <select name="show" onchange="this.form.submit()"
                        class="border rounded-lg px-3 py-1 pr-8 appearance-none bg-white">
                        <option value="5" {{ $show == 5 ? 'selected' : '' }}>5</option>
                        <option value="10" {{ $show == 10 ? 'selected' : '' }}>10</option>
                        <option value="25" {{ $show == 25 ? 'selected' : '' }}>25</option>
                    </select>
                    <span>entries</span>
                </div>

                <input type="text" name="search" value="{{ $search }}" placeholder="Search..."
                    class="border rounded-lg px-3 py-1" onchange="this.form.submit()">
            </form>

            <!-- TABLE -->
            <div class="overflow-x-auto">
                <table class="min-w-full text-sm">
                    <thead class="bg-slate-100 text-xs uppercase">
                        <tr>
                            <th class="px-4 py-3">No</th>
                            <th class="px-4 py-3">Username</th>
                            <th class="px-4 py-3">Email</th>
                            <th class="px-4 py-3">Name</th>
                            <th class="px-4 py-3 text-center">Aksi</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y">
                        @foreach($doctors as $doctor)
                            <tr class="hover:bg-slate-50">
                                <td class="px-4 py-3">{{ $loop->iteration }}</td>
                                <td class="px-4 py-3">{{ $doctor->username }}</td>
                                <td class="px-4 py-3">{{ $doctor->email }}</td>
                                <td class="px-4 py-3">{{ $doctor->name }}</td>

                                <td class="px-4 py-3 text-center flex gap-2 justify-center">

                                    <!-- EDIT BUTTON -->
                                    <div x-show="editModal" x-cloak
                                        class="fixed inset-0 bg-black/20 flex items-center justify-center">
                                    </div>
                                    <button @click="editModal = true; editData = {{ json_encode($doctor) }}"
                                        class="bg-gradient-to-br from-slate-900 via-blue-900 to-cyan-600 text-white px-3 py-1 rounded-lg text-xs">
                                        Edit
                                    </button>

                                    <!-- DELETE -->
                                    <form method="POST" action="{{ route('dokter.destroy', $doctor->id) }}">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                            onclick="return confirm('Apakah yakin ingin menghapus dokter ini?')"
                                            class="bg-gradient-to-br from-slate-900 via-red-700 to-red-400 text-white px-3 py-1 rounded-lg text-xs">
                                            Hapus
                                        </button>
                                    </form>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- FOOTER -->
            <div class="flex justify-between items-center mt-4 text-sm">
                <div>
                    Showing {{ $doctors->firstItem() }} to {{ $doctors->lastItem() }} of {{ $doctors->total() }} entries
                </div>
                <div>
                    {{ $doctors->links('pagination::tailwind') }}
                </div>
            </div>

        </div>

        <!-- ADD MODAL -->
        <div x-show="openModal"
            class="fixed inset-0 bg-gradient-to-br from-slate-900/50 via-blue-900/50 to-cyan-600/50 flex items-center justify-center">
            <div class="bg-white p-6 rounded-xl w-96">

                <h2 class="text-lg font-bold mb-4">Tambah Dokter</h2>

                <form method="POST" action="{{ route('dokter.store') }}">
                    @csrf
                    <input name="username" placeholder="Username" class="w-full border p-2 mb-3 rounded">
                    <input name="email" placeholder="Email" class="w-full border p-2 mb-3 rounded">
                    <input name="name" placeholder="Nama Lengkap" class="w-full border p-2 mb-3 rounded">
                    <input type="password" name="password" placeholder="Password"
                        class="w-full border p-2 mb-3 rounded">

                    <div class="flex justify-end gap-2">
                        <button type="button" @click="openModal=false" class="px-4 py-2 border rounded">Batal</button>
                        <button
                            class="px-4 py-2 bg-gradient-to-br from-slate-900 via-blue-900 to-cyan-600 text-white rounded">Simpan</button>
                    </div>
                </form>

            </div>
        </div>
        <!-- EDIT MODAL -->
        <div x-show="editModal"
            class="fixed inset-0 bg-gradient-to-br from-slate-900/50 via-blue-900/50 to-cyan-600/50 flex items-center justify-center">

            <div class="bg-white p-6 rounded-xl w-96">

                <h2 class="text-lg font-bold mb-4">Edit Dokter</h2>

                <form method="POST" :action="`/dokter/${editData.id}`">

                    @csrf
                    @method('PUT')

                    <input name="username" x-model="editData.username" placeholder="Username baru"
                        class="w-full border p-2 mb-3 rounded">

                    <input name="email" x-model="editData.email" placeholder="Email baru"
                        class="w-full border p-2 mb-3 rounded">

                    <input name="name" x-model="editData.name" placeholder="Nama Lengkap baru"
                        class="w-full border p-2 mb-3 rounded">

                    <input type="password" name="password" placeholder="Password baru (optional)"
                        class="w-full border p-2 mb-3 rounded">

                    <div class="flex justify-end gap-2">
                        <button type="button" @click="editModal=false" class="px-4 py-2 border rounded">Batal</button>

                        <button
                            class="px-4 py-2 bg-gradient-to-br from-slate-900 via-blue-900 to-cyan-600 text-white rounded">
                            Update
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</x-app-layout>