@extends('layouts.app')

@section('content')
<main class="flex-1 bg-[#FAF7F0] min-h-screen p-4 md:p-8">
    {{-- Header Section --}}
    <div class="flex items-center justify-between mb-10">
        <div class="flex items-center gap-4">
            <a href="{{ route('order') }}" class="w-12 h-12 rounded-2xl bg-white border border-[#D8D2C2] flex items-center justify-center hover:bg-[#4A4947] hover:text-white transition-all shadow-sm group">
                <svg class="w-6 h-6 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
            </a>
            <div>
                <h2 class="text-3xl font-black text-[#4A4947] tracking-tighter">Buat <span class="text-[#B17457]">Pesanan Baru.</span></h2>
                <p class="text-sm text-[#B17457]/60 font-medium">Lengkapi data untuk memulai transaksi</p>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto space-y-12">
        {{-- STEP 1: Form Data Pelanggan --}}
        <section>
            <form action="{{ route('customer.store') }}" method="POST">
                @csrf
                <div class="bg-white rounded-[2.5rem] p-8 md:p-10 border border-[#D8D2C2] shadow-sm relative overflow-hidden">
                    {{-- Decorative Accent --}}
                    <div class="absolute top-0 right-0 w-32 h-32 bg-[#B17457]/5 rounded-bl-full"></div>
                    
                    <h3 class="text-xl font-black text-[#4A4947] mb-8 flex items-center gap-3">
                        <span class="w-10 h-10 rounded-xl bg-[#B17457] flex items-center justify-center text-white text-sm shadow-lg shadow-[#B17457]/20">01</span>
                        Informasi Pelanggan
                    </h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="space-y-3">
                            <label class="text-[11px] font-black text-[#B17457] uppercase tracking-[0.2em] ml-1">Nama Lengkap</label>
                            <input type="text" name="customer_name" value="{{ old('customer_name') }}" placeholder="E.g. John Doe" required
                                   class="w-full px-6 py-4 rounded-2xl bg-[#FAF7F0]/50 border border-[#D8D2C2] focus:border-[#B17457] focus:bg-white outline-none transition-all font-bold text-[#4A4947] placeholder:text-[#4A4947]/20">
                        </div>
                        
                        <div class="space-y-3">
                            <label class="text-[11px] font-black text-[#B17457] uppercase tracking-[0.2em] ml-1">Nomor WhatsApp</label>
                            <input type="tel" name="number_phone" value="{{ old('number_phone') }}" placeholder="0812xxxx" required
                                   class="w-full px-6 py-4 rounded-2xl bg-[#FAF7F0]/50 border border-[#D8D2C2] focus:border-[#B17457] focus:bg-white outline-none transition-all font-bold text-[#4A4947] placeholder:text-[#4A4947]/20">
                        </div>

                        <div class="md:col-span-2 space-y-3">
                            <label class="text-[11px] font-black text-[#B17457] uppercase tracking-[0.2em] ml-1">Alamat Lengkap</label>
                            <textarea name="address" rows="2" placeholder="Masukkan alamat pengiriman..." required
                                      class="w-full px-6 py-4 rounded-2xl bg-[#FAF7F0]/50 border border-[#D8D2C2] focus:border-[#B17457] focus:bg-white outline-none transition-all font-bold text-[#4A4947] placeholder:text-[#4A4947]/20 resize-none">{{ old('address') }}</textarea>
                        </div>
                    </div>

                    <button type="submit" class="w-full mt-8 py-5 bg-[#B17457] hover:bg-[#4A4947] text-white rounded-2xl font-black uppercase tracking-[0.2em] transition-all duration-300 shadow-xl shadow-[#B17457]/20 flex items-center justify-center gap-3 group">
                        Simpan Data Pemesan
                        <svg class="w-5 h-5 group-hover:translate-x-2 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7-7 7M5 5l7 7-7 7"></path>
                        </svg>
                    </button>
                </div>
            </form>
        </section>

        {{-- STEP 2: Pilih Menu --}}
        @if(session()->has('current_order_id'))
        <section class="animate-in fade-in slide-in-from-bottom-10 duration-700">
            <div class="flex items-center justify-between mb-8">
                <h3 class="text-2xl font-black text-[#4A4947] flex items-center gap-3">
                    <span class="w-10 h-10 rounded-xl bg-[#4A4947] flex items-center justify-center text-white text-sm shadow-lg">02</span>
                    Pilih Menu <span class="text-[#B17457]">Boroskopi</span>
                </h3>
            </div>

            {{-- Grid Produk --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @foreach ($products as $p)
                    <div class="group bg-white rounded-[2rem] border border-[#D8D2C2] p-4 hover:shadow-2xl hover:shadow-[#B17457]/10 transition-all duration-500 hover:-translate-y-2 flex flex-col">
                        {{-- Image Wrapper --}}
                        <div class="relative h-56 rounded-[1.5rem] overflow-hidden mb-5 bg-[#FAF7F0]">
                            <img src="{{ asset('storage/' . $p->image) }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                            <div class="absolute top-3 left-3">
                                <span class="px-4 py-1.5 bg-white/90 backdrop-blur-md text-[#4A4947] text-[10px] font-black uppercase tracking-widest rounded-full shadow-sm">
                                    {{ $p->category->category_name }}
                                </span>
                            </div>
                        </div>

                        {{-- Info --}}
                        <div class="flex-1 space-y-2 px-2">
                            <h3 class="text-lg font-black text-[#4A4947] leading-tight group-hover:text-[#B17457] transition-colors">{{ $p->product_name }}</h3>
                            <p class="text-[#B17457] font-serif font-bold text-xl">Rp {{ number_format($p->price, 0, ',', '.') }}</p>
                        </div>

                        {{-- Form Add to Order --}}
                        <form action="{{ route('customer.storeStep2') }}" method="POST" class="mt-6 space-y-3">
                            @csrf
                            <input type="hidden" name="order_id" value="{{ session('current_order_id') }}">
                            <input type="hidden" name="product_id" value="{{ $p->product_id }}">
                            
                            <div class="flex gap-2">
                                <div class="w-1/3 relative">
                                    <input type="number" name="quantity" value="1" min="1" 
                                           class="w-full h-12 px-4 rounded-xl bg-[#FAF7F0] border border-[#D8D2C2] focus:border-[#B17457] outline-none text-center font-black text-[#4A4947]">
                                </div>
                                <button type="submit" class="flex-1 h-12 bg-[#FAF7F0] hover:bg-[#B17457] hover:text-white text-[#B17457] border border-[#B17457]/20 rounded-xl font-bold text-xs uppercase tracking-tighter transition-all flex items-center justify-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                                    Tambah
                                </button>
                            </div>
                        </form>
                    </div>
                @endforeach
            </div>
        </section>
                <div class="lg:col-span-1 sticky top-8">
            <div class="bg-white rounded-xl shadow-xl border border-sand overflow-hidden flex flex-col">
                <div class="p-8 bg-cream/30 border-b border-dashed border-sand relative">
                    <div class="absolute -left-3 -bottom-3 w-6 h-6 bg-cream rounded-full border border-sand"></div>
                    <div class="absolute -right-3 -bottom-3 w-6 h-6 bg-cream rounded-full border border-sand"></div>
                    
                    <h3 class="text-2xl font-black text-dark tracking-tighter">Ringkasan <span class="text-coffee font-serif italic">Bill.</span></h3>
                </div>

                <div class="p-8 space-y-6">
                    @foreach ($orderedProducts as $OP)
                    <div class="flex gap-4 group">
                        <div class="relative">
                            <div class="w-16 h-16 bg-sand/30 rounded-2xl overflow-hidden group-hover:rotate-3 transition-transform duration-300">
                                <img src="{{ asset('storage/' . $OP->product->image) }}" class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-500" />
                            </div>
                            <span class="absolute -top-2 -right-2 w-6 h-6 bg-dark text-cream text-[10px] font-black rounded-lg flex items-center justify-center shadow-lg">
                                {{ $OP->quantity }}x
                            </span>
                        </div>
                        <div class="flex-1">
                            <h4 class="font-black text-dark text-sm leading-tight group-hover:text-coffee transition-colors">{{ $OP->product->product_name }}</h4>
                            <p class="text-[10px] font-bold text-sand uppercase tracking-wider mt-1">Item ID: #{{ $OP->product->product_id }}</p>
                            <div class="flex justify-between items-end mt-2">
                                <span class="text-xs font-medium text-dark/40 italic">@Rp {{ number_format($OP->product->price, 0, ',', '.') }}</span>
                                <span class="font-black text-dark tracking-tight">Rp {{ number_format(($OP->price), 0, ',', '.') }}</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="px-8 pb-8 pt-4 space-y-4 border-t border-sand/30 mx-8">
                    <div class="flex justify-between items-center">
                        <span class="text-sm font-bold text-sand uppercase tracking-widest">Subtotal</span>
                        <span class="font-black text-dark">Rp {{ number_format($orderedProducts->where('order_id', session('current_order_id'))->sum('price'), '0', '.', '.') }}</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-sm font-bold uppercase tracking-widest text-coffee">Ongkir</span>
                        <span class="font-black text-coffee uppercase text-xs tracking-tighter font-serif">Rp 10.000</span>
                    </div>
                </div>
                <form action="{{ route('customer.storeStep3') }}" method="POST">
                @csrf
                    <input type="hidden" name="order_id" value="{{ session('current_order_id') }}">
                    <button type="submit" class="m-8 p-8 bg-dark rounded-[2rem] flex flex-col items-center justify-center relative overflow-hidden group">
                        <div class="absolute inset-0 bg-coffee/10 translate-y-full group-hover:translate-y-0 transition-transform duration-500"></div>
                        <p class="text-cream/50 text-[10px] font-black uppercase tracking-[0.3em] mb-2 relative">Total Tagihan</p>
                        <h2 class="text-3xl font-black text-cream relative tracking-tighter mb-2">
                            <span class="text-coffee text-lg uppercase font-serif mr-1">Rp</span>{{ number_format($orderedProducts->where('order_id', session('current_order_id'))->sum('price') + 10000, 0, ',', '.') }}
                        </h2>
                        <span class="text-cream/50 text-[10px] font-black uppercase tracking-[0.3em] mb-2 relative">Klik Untuk Melanjutkan</span>
                    </button>
                </form>
            </div>
        </div>
        @endif
    </div>
</main>

<style>
    /* Hilangkan spinner input number */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
    input[type=number] {
        -moz-appearance: textfield;
    }
</style>
@endsection