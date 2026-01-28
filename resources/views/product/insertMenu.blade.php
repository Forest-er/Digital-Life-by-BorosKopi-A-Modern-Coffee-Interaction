@extends('layouts.app')

@section('content')
<main class="flex-1 md:p-8 bg-cream min-h-screen">
    <div class="flex items-center gap-4 mb-8">
        <a href="{{ route('product.menu') }}" class="w-10 h-10 rounded-xl bg-white border border-sand flex items-center justify-center hover:bg-dark hover:text-cream transition-all shadow-sm">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
        </a>
        <div>
            <h2 class="text-2xl md:text-3xl font-black text-dark tracking-tighter">Tambah <span class="text-coffee">Menu Baru.</span></h2>
            <p class="text-xs md:text-sm font-medium text-dark/50">Ciptakan mahakarya rasa baru untuk pelanggan Anda.</p>
        </div>
    </div>

    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-4">
            
            <div class="lg:col-span-4 space-y-6">
                <div class="bg-white rounded-[2.5rem] p-8 border border-sand shadow-sm text-center">
                    <h3 class="text-sm font-black text-dark uppercase tracking-widest mb-6">Foto Produk</h3>
                    
                    <div class="relative group cursor-pointer">
                        <input type="file" name="image" id="imageInput" class="hidden" accept="image/*" onchange="previewImage(event)">
                        <label for="imageInput" class="cursor-pointer">
                            <div id="imagePreviewContainer" class="w-full aspect-square rounded-[2rem] bg-cream border-2 border-dashed border-sand flex flex-col items-center justify-center overflow-hidden transition-all group-hover:border-coffee">
                                <div id="placeholderContent" class="flex flex-col items-center">
                                    <svg class="w-16 h-16 text-coffee group-hover:text-coffee transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    <p class="mt-4 text-[10px] font-black text-coffee uppercase tracking-tighter">Klik untuk Unggah Foto</p>
                                </div>
                                <img id="imagePreview" class="hidden w-full h-full object-cover">
                            </div>
                        </label>
                    </div>
                    <p class="mt-4 text-[10px] text-dark/40 leading-relaxed uppercase font-bold">Rekomendasi: 1:1 (Square) <br> Max 2MB (JPG, PNG)</p>
                </div>
            </div>

            <div class="lg:col-span-8 space-y-6">
                <div class="bg-white rounded-[2.5rem] p-6 md:p-10 border border-sand shadow-sm">
                    <div class="flex items-center gap-3 mb-10 border-b border-sand pb-6">
                        <div class="w-10 h-10 bg-coffee rounded-xl flex items-center justify-center text-cream">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                        </div>
                        <h3 class="text-xl font-black text-dark">Detail <span class="text-coffee">Produk.</span></h3>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="md:col-span-2 space-y-2">
                            <label class="text-[10px] font-black text-coffee uppercase tracking-[0.2em] ml-1">Nama Produk</label>
                            <input type="text" name="product_name" placeholder="Contoh: Sea Salt Latte" required
                                   class="w-full px-8 py-5 rounded-2xl bg-cream/30 border border-sand focus:border-coffee focus:bg-white outline-none transition-all font-bold text-dark text-lg">
                        </div>

                        <div class="space-y-2">
                            <label class="text-[10px] font-black text-coffee uppercase tracking-[0.2em] ml-1">Kategori</label>
                            <div class="relative">
                                <select name="category_id" required class="w-full px-8 py-5 rounded-2xl bg-cream/30 border border-sand focus:border-coffee focus:bg-white outline-none transition-all font-bold text-dark appearance-none">
                                    <option value="">Pilih Kategori</option>
                                    <option value="1">Coffee</option>
                                    <option value="2">Non-Coffee</option>
                                    <option value="3">Pastry</option>
                                </select>
                                <div class="absolute right-6 top-6 pointer-events-none text-coffee">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                </div>
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label class="text-[10px] font-black text-coffee uppercase tracking-[0.2em] ml-1">Harga Jual (Rp)</label>
                            <div class="relative">
                                <span class="absolute left-8 top-5 font-serif italic font-bold text-coffee">Rp</span>
                                <input type="number" name="price" placeholder="0" required
                                       class="w-full pl-16 pr-8 py-5 rounded-2xl bg-cream/30 border border-sand focus:border-coffee focus:bg-white outline-none transition-all font-black text-dark text-xl tracking-tighter">
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label class="text-[10px] font-black text-coffee uppercase tracking-[0.2em] ml-1">Stok Awal</label>
                            <div class="flex items-center bg-cream/30 border border-sand rounded-2xl px-4">
                                <button type="button" onclick="this.parentNode.querySelector('input').stepDown()" class="p-4 text-coffee hover:scale-125 transition-transform font-black">-</button>
                                <input type="number" name="stock_quantity" value="0" min="0" 
                                       class="w-full bg-transparent border-none text-center font-black text-dark focus:ring-0 text-lg">
                                <button type="button" onclick="this.parentNode.querySelector('input').stepUp()" class="p-4 text-coffee hover:scale-125 transition-transform font-black">+</button>
                            </div>
                        </div>

                        <div class="md:col-span-2 space-y-2 pt-4">
                            <label class="text-[10px] font-black text-coffee uppercase tracking-[0.2em] ml-1">Deskripsi & Racikan</label>
                            <textarea name="description" rows="4" placeholder="Ceritakan keunikan rasa menu ini..."
                                      class="w-full px-8 py-5 rounded-2xl bg-cream/30 border border-sand focus:border-coffee focus:bg-white outline-none transition-all font-medium text-dark resize-none"></textarea>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="mt-4 flex flex-col md:flex-row gap-4 px-4 py-6 bg-white rounded-2xl border border-sand shadow-sm justify-end">
            <button type="submit" class="flex-1 py-5 bg-dark text-cream rounded-2xl font-black uppercase tracking-widest hover:bg-coffee transition-all duration-500 shadow-xl active:scale-95">
                Simpan Ke Katalog
            </button>
            <button type="reset" class="px-10 py-5 border border-sand text-coffee rounded-2xl font-black uppercase tracking-widest hover:bg-red-50 hover:text-red-500 hover:border-red-200 transition-all">
                Reset
            </button>
        </div>
    </form>
</main>

<script>
    function previewImage(event) {
        const reader = new FileReader();
        const preview = document.getElementById('imagePreview');
        const placeholder = document.getElementById('placeholderContent');
        const container = document.getElementById('imagePreviewContainer');

        reader.onload = function() {
            preview.src = reader.result;
            preview.classList.remove('hidden');
            placeholder.classList.add('hidden');
            container.classList.remove('border-dashed');
            container.classList.add('border-solid');
        }
        reader.readAsDataURL(event.target.files[0]);
    }
</script>

<style>
    /* Hilangkan panah input number */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button { -webkit-appearance: none; margin: 0; }
</style>
@endsection