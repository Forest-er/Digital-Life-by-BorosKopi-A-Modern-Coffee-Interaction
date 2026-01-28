@extends('layouts.app')

@section('content')
<main class="flex-1 bg-cream min-h-screen">
    <div class="flex items-center justify-between mb-8">
        <div class="flex items-center gap-4">
            <a href="{{ route('product.menu') }}" class="w-10 h-10 rounded-xl bg-white border border-sand flex items-center justify-center hover:bg-dark hover:text-cream transition-all shadow-sm">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
            </a>
            <div>
                <h2 class="text-2xl md:text-3xl font-black text-dark tracking-tighter">Edit <span class="text-coffee">Menu.</span></h2>
                <p class="text-[10px] md:text-xs font-bold text-coffee uppercase tracking-widest">ID Produk: #{{ $product->product_id }}</p>
            </div>
        </div>
        
        <div class="hidden md:block">
            <span class="px-4 py-2 bg-green-100 text-green-700 rounded-full text-[10px] font-black uppercase tracking-tighter shadow-sm border border-green-200">
                Terakhir Update: {{ $product->updated_at->diffForHumans() }}
            </span>
        </div>
    </div>

    <form action="{{ route('product.update', $product->product_id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
            
            <div class="lg:col-span-4 space-y-6">
                <div class="bg-white rounded-[2.5rem] p-8 border border-sand shadow-sm text-center">
                    <h3 class="text-sm font-black text-dark uppercase tracking-widest mb-6">Foto Produk Sekarang</h3>
                    
                    <div class="relative group cursor-pointer">
                        <input type="file" name="image" id="imageInput" class="hidden" accept="image/*" onchange="previewImage(event)">
                        <label for="imageInput" class="cursor-pointer">
                            <div id="imagePreviewContainer" class="w-full aspect-square rounded-[2rem] bg-cream border-2 border-coffee/20 flex flex-col items-center justify-center overflow-hidden transition-all group-hover:border-coffee shadow-inner">
                                @if($product->image)
                                    <img id="imagePreview" src="{{ asset('storage/' . $product->image) }}" class="w-full h-full object-cover">
                                @else
                                    <div id="placeholderContent" class="flex flex-col items-center">
                                        <svg class="w-16 h-16 text-coffee" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                    </div>
                                @endif
                                <div class="absolute inset-0 bg-dark/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                                    <span class="bg-white text-dark text-[10px] font-black px-4 py-2 rounded-full uppercase">Ganti Foto</span>
                                </div>
                            </div>
                        </label>
                    </div>
                </div>

                <div class="bg-red-50 rounded-[2rem] p-6 border border-red-100 shadow-sm">
                    <p class="text-[10px] font-black uppercase text-red-400 tracking-widest mb-2">Tindakan Bahaya</p>
                    <button type="button" onclick="confirmDelete()" class="w-full py-3 bg-white text-red-500 border border-red-200 rounded-xl font-bold text-xs hover:bg-red-500 hover:text-white transition-all">
                        Hapus Produk Dari Menu
                    </button>
                </div>
            </div>

            <div class="lg:col-span-8 space-y-6">
                <div class="bg-white rounded-[2.5rem] p-6 md:p-10 border border-sand shadow-sm relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-coffee/5 rounded-bl-[5rem]"></div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 relative z-10">
                        <div class="md:col-span-2 space-y-2">
                            <label class="text-[10px] font-black text-coffee uppercase tracking-[0.2em] ml-1">Nama Produk</label>
                            <input type="text" name="product_name" value="{{ $product->product_name }}" required
                                   class="w-full px-8 py-5 rounded-2xl bg-cream/30 border border-sand focus:border-coffee focus:bg-white outline-none transition-all font-bold text-dark text-lg shadow-sm">
                        </div>

                        <div class="space-y-2">
                            <label class="text-[10px] font-black text-coffee uppercase tracking-[0.2em] ml-1">Kategori</label>
                            <select name="category_id" required class="w-full px-8 py-5 rounded-2xl bg-cream/30 border border-sand focus:border-coffee focus:bg-white outline-none transition-all font-bold text-dark appearance-none">
                                <option value="1" {{ $product->category_id == 1 ? 'selected' : '' }}>Coffee</option>
                                <option value="2" {{ $product->category_id == 2 ? 'selected' : '' }}>Non-Coffee</option>
                                <option value="3" {{ $product->category_id == 3 ? 'selected' : '' }}>Pastry</option>
                            </select>
                        </div>

                        <div class="space-y-2">
                            <label class="text-[10px] font-black text-coffee uppercase tracking-[0.2em] ml-1">Harga Jual (Rp)</label>
                            <div class="relative">
                                <span class="absolute left-8 top-5 font-serif italic font-bold text-coffee">Rp</span>
                                <input type="number" name="price" value="{{ $product->price }}" required
                                       class="w-full pl-16 pr-8 py-5 rounded-2xl bg-cream/30 border border-sand focus:border-coffee focus:bg-white outline-none transition-all font-black text-dark text-xl tracking-tighter">
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label class="text-[10px] font-black text-coffee uppercase tracking-[0.2em] ml-1">Stok Tersedia</label>
                            <div class="flex items-center bg-cream/30 border border-sand rounded-2xl px-4">
                                <button type="button" onclick="this.parentNode.querySelector('input').stepDown()" class="p-4 text-coffee hover:scale-125 transition-transform font-black">-</button>
                                <input type="number" name="stock_quantity" value="{{ $product->stock_quantity }}" min="0" 
                                       class="w-full bg-transparent border-none text-center font-black text-dark focus:ring-0 text-lg">
                                <button type="button" onclick="this.parentNode.querySelector('input').stepUp()" class="p-4 text-coffee hover:scale-125 transition-transform font-black">+</button>
                            </div>
                        </div>

                        <div class="md:col-span-2 space-y-2">
                            <label class="text-[10px] font-black text-coffee uppercase tracking-[0.2em] ml-1">Deskripsi & Racikan</label>
                            <textarea name="description" rows="4" class="w-full px-8 py-5 rounded-2xl bg-cream/30 border border-sand focus:border-coffee focus:bg-white outline-none transition-all font-medium text-dark resize-none">{{ $product->description }}</textarea>
                        </div>
                    </div>

                    <div class="mt-2 flex flex-col md:flex-row gap-4 border-t border-sand/30 pt-8">
                        <button type="submit" class="flex-1 py-5 bg-coffee text-cream rounded-2xl font-black uppercase tracking-widest hover:bg-dark transition-all duration-500 shadow-xl active:scale-95 flex items-center justify-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                            Perbarui Data Menu
                        </button>
                        <a href="" class="px-10 py-5 border border-sand text-dark/40 rounded-2xl font-black uppercase tracking-widest hover:bg-cream transition-all flex items-center justify-center">
                            Batal
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </form>
</main>

<script>
    function previewImage(event) {
        const reader = new FileReader();
        const preview = document.getElementById('imagePreview');
        
        reader.onload = function() {
            if(preview) {
                preview.src = reader.result;
            } else {
                location.reload(); // Refresh if preview element wasn't there
            }
        }
        reader.readAsDataURL(event.target.files[0]);
    }

    function confirmDelete() {
        if(confirm('Apakah Anda yakin ingin menghapus menu ini secara permanen?')) {
            // Logika hapus (bisa submit form hidden khusus hapus)
            alert('Proses hapus dipicu...');
        }
    }
</script>
@endsection