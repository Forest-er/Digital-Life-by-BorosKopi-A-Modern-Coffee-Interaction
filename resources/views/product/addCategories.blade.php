@extends('layouts.app')
@section('content')

<main class="flex-1 p-8 min-h-screen bg-brand-cream">
    <div class="mb-8">
        <h2 class="text-3xl font-serif font-bold text-brand-dark">Kategori Menu</h2>
        <p class="text-brand-dark/60 mt-1">Kelola kategori untuk mengelompokkan menu kopi Anda.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <div class="bg-white p-8 rounded-2xl shadow-sm border border-brand-beige/50">
            <div class="flex items-center gap-3 mb-6">
                <div class="w-10 h-10 bg-brand-primary/10 rounded-full flex items-center justify-center">
                    <svg class="w-5 h-5 text-brand-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-brand-dark">Tambah Kategori Baru</h3>
            </div>

            <form action="{{ route('categories.add') }}" method="POST">
                @csrf
                <div class="space-y-4">
                    <div>
                        <label for="category_name" class="block text-sm font-semibold text-brand-dark mb-2"> Nama Kategori </label>
                        <input
                            type="text"
                            id="category_name"
                            name="name"
                            placeholder="Contoh: Signature Coffee, Non-Coffee, Pastry"
                            class="w-full px-4 py-3 rounded-xl border border-brand-beige focus:ring-2 focus:ring-brand-primary/20 focus:border-brand-primary outline-none transition-all placeholder:text-gray-400"
                            required
                        >
                    </div>

                    <div class="pt-2">
                        <button type="submit" class="w-full bg-brand-primary hover:bg-brand-dark text-white font-bold py-3 px-6 rounded-xl transition-all duration-300 transform hover:-translate-y-1 shadow-lg hover:shadow-brand-primary/20 flex items-center justify-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Simpan Kategori
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <div class="bg-gradient-to-br from-brand-primary to-brand-dark p-8 rounded-2xl text-white shadow-xl flex flex-col justify-center relative overflow-hidden">
            <div class="absolute -right-10 -top-10 w-40 h-40 bg-white/10 rounded-full blur-3xl"></div>

            <div class="relative z-10">
                <h4 class="text-2xl font-serif font-bold mb-4">Tips Kategori</h4>
                <ul class="space-y-3 opacity-90 text-sm">
                    <li class="flex items-start gap-2">
                        <span class="mt-1 text-brand-beige">●</span>
                        Gunakan nama yang singkat dan jelas agar pelanggan mudah mencari.
                    </li>
                    <li class="flex items-start gap-2">
                        <span class="mt-1 text-brand-beige">●</span>
                        Kategori membantu Anda mengatur stok bahan baku lebih rapi.
                    </li>
                    <li class="flex items-start gap-2">
                        <span class="mt-1 text-brand-beige">●</span>
                        Menu yang dikelompokkan dengan baik meningkatkan penjualan sebesar 20%.
                    </li>
                </ul>
            </div>
        </div>
        <div class="lg:col-span-2">
            <div class="bg-white rounded-2xl shadow-sm border border-brand-beige/50 overflow-hidden">

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-brand-cream/50 text-brand-dark/70 text-sm uppercase tracking-wider">
                                <th class="px-6 py-4 font-bold">No</th>
                                <th class="px-6 py-4 font-bold">Nama Kategori</th>
                                <th class="px-6 py-4 font-bold text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-brand-beige/20 text-brand-dark">
                            @foreach ($categories as $c)
                            <tr class="hover:bg-brand-cream/30 transition-colors group">
                                <td class="px-6 py-4 text-sm w-16">{{ $loop->iteration }}</td>
                                <td class="px-6 py-4 font-medium">{{ $c->category_name }}</td>
                                <td class="px-6 py-4">
                                    <div class="flex justify-center gap-2">
                                        <form action="{{ route('categories.delete', $c->category_id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kategori ini? Semua menu dalam kategori ini juga akan terhapus.')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="p-2 text-brand-beige hover:text-red-500 transition-colors" title="Hapus">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                             @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="p-4 bg-brand-cream/20 border-t border-brand-beige/20 text-center">
                    <p class="text-xs text-brand-dark/40 italic">Menampilkan semua kategori yang aktif di BorosKopi</p>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
