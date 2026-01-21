@extends('layouts.app')

@section('content')
<main class="flex-1 bg-cream min-h-screen">
    <div class="flex flex-col md:flex-row justify-between items-end mb-10 gap-6">
        <div>
            <h2 class="text-4xl font-black text-dark tracking-tighter">Katalog <span class="text-coffee">Menu.</span></h2>
            <p class="text-dark/50 font-medium mt-1">Kelola varian rasa dan ketersediaan produk Anda.</p>
        </div>

        <div class="flex items-center gap-4 w-full md:w-auto">
            <div class="relative flex-1 md:flex-none">
                <input type="text" placeholder="Cari menu favorit..." 
                       class="w-full md:w-64 pl-12 pr-4 py-3 rounded-2xl border border-sand bg-white focus:ring-4 focus:ring-coffee/10 focus:border-coffee outline-none transition-all shadow-sm">
                <svg class="w-5 h-5 absolute left-4 top-3.5 text-sand" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </div>
            <button class="px-6 py-3 bg-dark hover:bg-coffee text-cream rounded-2xl font-bold transition-all duration-300 shadow-lg flex items-center gap-2 group">
                <span class="group-hover:rotate-90 transition-transform duration-300">+</span>
                Tambah Menu
            </button>
        </div>
    </div>

    <div class="flex gap-3 mb-6 overflow-x-auto pb-2 scrollbar-hide">
        <button class="px-8 py-2.5 bg-coffee text-white rounded-full font-bold text-sm shadow-md shadow-coffee/20">Semua</button>
        @foreach ($categories as $C)
            <button class="px-8 py-2.5 bg-white text-dark/40 hover:text-coffee border border-sand rounded-full font-bold text-sm transition-all">{{ $C->category_name }}</button>
        @endforeach
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-3">
         <div class="group relative border-4 border-dashed border-sand rounded-[2.5rem] flex flex-col items-center justify-center p-8 hover:bg-white hover:border-coffee transition-all duration-500 cursor-pointer min-h-[400px]">
            <div class="w-20 h-20 bg-cream rounded-full flex items-center justify-center mb-4 group-hover:scale-110 group-hover:bg-coffee transition-all duration-500">
                <svg class="w-10 h-10 text-coffee group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
            </div>
            <h4 class="text-lg font-black text-dark group-hover:text-coffee transition-colors">Tambah Menu Baru</h4>
            <p class="text-sm text-dark/40 font-medium text-center mt-2 px-4">Bagikan racikan kopi spesial Anda ke pelanggan.</p>
        </div>
        @foreach($products as $p)
        <div class="group relative bg-white rounded-[2.5rem] p-4 border border-sand shadow-sm hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 overflow-hidden">
            <div class="relative h-64 rounded-[2rem] overflow-hidden mb-6 bg-cream">
                <img src="" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                
                <div class="absolute top-4 left-4">
                    <span class="px-4 py-1.5 bg-white/90 backdrop-blur-md text-dark text-[10px] font-black uppercase tracking-widest rounded-full shadow-sm">
                        {{ $p->category->category_name }}
                    </span>
                </div>

                <div class="absolute inset-0 bg-dark/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center gap-3">
                    <button class="w-12 h-12 bg-white rounded-2xl flex items-center justify-center text-dark hover:bg-coffee hover:text-white transition-all transform translate-y-4 group-hover:translate-y-0 duration-300 delay-75">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                    </button>
                    <button class="w-12 h-12 bg-white rounded-2xl flex items-center justify-center text-red-500 hover:bg-red-500 hover:text-white transition-all transform translate-y-4 group-hover:translate-y-0 duration-300 delay-150">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                    </button>
                </div>
            </div>

            <div class="px-2 pb-4 text-center">
                <h3 class="text-xl font-black text-dark tracking-tight mb-1 group-hover:text-coffee transition-colors">{{ $p->product_name }}</h3>
                <div class="flex items-center justify-center gap-2 mb-4">
                    <div class="h-px w-8 bg-sand"></div>
                    <p class="text-lg font-serif  text-coffee font-bold">Rp {{ number_format($p->price, 0, ',', '.') }}</p>
                    <div class="h-px w-8 bg-sand"></div>
                </div>
                
                <div class="flex items-center justify-between bg-cream/50 rounded-2xl px-4 py-2 border border-sand/50">
                    <div class="flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-green-500 animate-pulse"></span>
                    </div>
                    <span class="text-xs font-black text-dark">{{ $p->stock_quantity }} Pcs</span>
                </div>
            </div>
        </div>
        @endforeach

       
    </div>
</main>
@endsection