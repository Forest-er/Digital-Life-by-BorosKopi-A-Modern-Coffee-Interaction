@extends('layouts.navbar')

@section('content')
<div class="min-h-screen bg-[#FAF7F0] font-sans antialiased">
    <main class="max-w-[1600px] mx-auto p-4 md:p-8 lg:p-12">

        {{-- Header & Progress Indicator --}}
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-12 gap-6">
            <div class="space-y-2">
                <div class="flex items-center gap-3">
                    <span class="px-3 py-1 bg-[#B17457] text-white text-[10px] font-black uppercase tracking-widest rounded-md">New Transaction</span>
                    @if(session()->has('current_order_id'))
                        <span class="text-[#4A4947]/40 text-[10px] font-black uppercase tracking-widest">ID: #{{ session('current_order_id') }}</span>
                    @endif
                </div>
                <h1 class="text-4xl md:text-5xl font-black text-[#4A4947] tracking-tighter">Terminal <span class="text-[#B17457]">Pesanan.</span></h1>
            </div>

            {{-- Tab Style Step --}}
            <div class="flex bg-[#D8D2C2]/20 p-1.5 rounded-2xl border border-[#D8D2C2]/50 w-full md:w-auto">
                <div class="flex-1 md:flex-none px-6 py-2.5 {{ !session()->has('current_order_id') ? 'bg-white shadow-sm rounded-xl' : '' }} flex items-center justify-center gap-2">
                    <span class="w-5 h-5 rounded-full {{ !session()->has('current_order_id') ? 'bg-[#B17457] text-white' : 'bg-[#D8D2C2] text-[#4A4947]' }} text-[10px] font-black flex items-center justify-center">1</span>
                    <span class="text-xs font-black uppercase tracking-wider text-[#4A4947]">Customer</span>
                </div>
                <div class="flex-1 md:flex-none px-6 py-2.5 {{ session()->has('current_order_id') ? 'bg-white shadow-sm rounded-xl' : '' }} flex items-center justify-center gap-2">
                    <span class="w-5 h-5 rounded-full {{ session()->has('current_order_id') ? 'bg-[#B17457] text-white' : 'bg-[#D8D2C2] text-[#4A4947]' }} text-[10px] font-black flex items-center justify-center">2</span>
                    <span class="text-xs font-black uppercase tracking-wider text-[#4A4947]">Menu</span>
                </div>
                <form action="{{ route('customer.destroy', ['id' => session('current_order_id')]) }}" method="POST" class="flex-1 md:flex-none hover:bg-red-400 transition-all ml-2 px-6 py-2.5 {{ session()->has('current_order_id') ? 'bg-white shadow-sm rounded-xl' : '' }} flex items-center justify-center gap-2">
                    @csrf
                    @method('DELETE')
                    <button class="text-xs font-black uppercase tracking-wider text-[#4A4947]">Batalkan</button>
                </form>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-start">

            {{-- SEKSI KIRI: INPUT (Span 8) --}}
            <div class="lg:col-span-8 space-y-12">

                {{-- Form Customer --}}
                <section>
                    <form action="{{ route('customer.store') }}" method="POST">
                        @csrf
                        <div class="bg-white rounded-[2.5rem] border border-[#D8D2C2] p-8 md:p-12 shadow-sm transition-all duration-500 {{ session()->has('current_order_id') ? 'opacity-40 pointer-events-none scale-[0.98]' : 'ring-2 ring-[#B17457]/10' }}">
                            <div class="flex items-center gap-4 mb-10">
                                <div class="w-12 h-12 bg-[#FAF7F0] rounded-2xl flex items-center justify-center text-[#B17457]">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                </div>
                                <h3 class="text-xl font-black text-[#4A4947] uppercase tracking-tighter">Detail Pelanggan</h3>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                                <div class="group">
                                    <label class="block text-[10px] font-black text-[#B17457] uppercase tracking-[0.2em] mb-3 ml-1">Nama Customer</label>
                                    <input type="text" name="customer_name" placeholder="Masukkan nama..." required
                                           class="w-full px-6 py-4 rounded-2xl bg-[#FAF7F0] border-2 border-transparent focus:border-[#B17457] focus:bg-white outline-none transition-all font-bold text-[#4A4947]">
                                </div>
                                <div class="group">
                                    <label class="block text-[10px] font-black text-[#B17457] uppercase tracking-[0.2em] mb-3 ml-1">WhatsApp</label>
                                    <input type="tel" name="number_phone" placeholder="08..." required
                                           class="w-full px-6 py-4 rounded-2xl bg-[#FAF7F0] border-2 border-transparent focus:border-[#B17457] focus:bg-white outline-none transition-all font-bold text-[#4A4947]">
                                </div>
                                <div class="md:col-span-2 group">
                                    <label class="block text-[10px] font-black text-[#B17457] uppercase tracking-[0.2em] mb-3 ml-1">Alamat Pengiriman</label>
                                    <textarea name="address" rows="2" placeholder="Detail alamat..." required
                                              class="w-full px-6 py-4 rounded-2xl bg-[#FAF7F0] border-2 border-transparent focus:border-[#B17457] focus:bg-white outline-none transition-all font-bold text-[#4A4947] resize-none"></textarea>
                                </div>
                            </div>

                            @if(!session()->has('current_order_id'))
                            <button type="submit" class="w-full mt-10 py-5 bg-[#4A4947] hover:bg-[#B17457] text-white rounded-2xl font-black uppercase tracking-[0.2em] transition-all duration-300 shadow-xl flex items-center justify-center gap-3 active:scale-95">
                                Kunci & Lanjut ke Menu
                            </button>
                            @endif
                        </div>
                    </form>
                </section>

                {{-- Grid Menu --}}
                @if(session()->has('current_order_id'))
                <section class="animate-in fade-in slide-in-from-bottom-8 duration-700">
                    <div class="flex items-center justify-between mb-8 px-2">
                        <h3 class="text-2xl font-black text-[#4A4947] uppercase tracking-tighter">Pilih Menu</h3>
                        <div class="flex gap-2">
                            <button class="px-4 py-2 bg-white rounded-full border border-[#D8D2C2] text-[10px] font-black uppercase tracking-widest hover:bg-[#B17457] hover:text-white transition-all">Coffee</button>
                            <button class="px-4 py-2 bg-white rounded-full border border-[#D8D2C2] text-[10px] font-black uppercase tracking-widest hover:bg-[#B17457] hover:text-white transition-all">Non-Coffee</button>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-6">
                        @foreach ($products as $p)
                        <div class="group bg-white rounded-[2.5rem] p-4 border border-[#D8D2C2] {{ $p->stock <= 0 ? 'opacity-75' : 'hover:border-[#B17457] hover:shadow-2xl' }} transition-all duration-500 flex flex-col h-full relative">

                            @if($p->stock_quantity <= 0)
                            <div class="absolute inset-0 z-10 bg-white/40 backdrop-blur-[2px] rounded-[2.5rem] flex items-center justify-center pointer-events-none">
                                <span class="bg-[#4A4947] text-white px-6 py-2 rounded-full font-black uppercase tracking-widest text-xs rotate-[-10deg] shadow-lg">Habis Terjual</span>
                            </div>
                            @endif

                            <div class="relative aspect-square rounded-[2rem] overflow-hidden mb-6">
                                <img src="{{ asset('storage/' . $p->image) }}" class="w-full h-full object-cover {{ $p->stock_quantity <= 0 ? 'grayscale' : 'group-hover:scale-110' }} transition-transform duration-700">

                                <div class="absolute top-4 right-4 px-3 py-1 bg-white/90 backdrop-blur-sm rounded-full text-[9px] font-black uppercase text-[#4A4947]">
                                    {{ $p->category->category_name }}
                                </div>
                            </div>

                            <div class="px-2 flex-1">
                                <h4 class="text-lg font-black text-[#4A4947] leading-tight mb-2 uppercase">{{ $p->product_name }}</h4>
                                <p class="text-[#B17457] font-black text-xl mb-6 italic">Rp {{ number_format($p->price, 0, ',', '.') }}</p>
                            </div>

                            @if($p->stock_quantity > 0)
                            <form action="{{ route('customer.storeStep2') }}" method="POST">
                                @csrf
                                <input type="hidden" name="order_id" value="{{ session('current_order_id') }}">
                                <input type="hidden" name="product_id" value="{{ $p->product_id }}">
                                <div class="flex items-center gap-2">
                                    <input type="number" name="quantity" value="1" min="1" max="{{ $p->stock_quantity }}"
                                        class="w-16 h-12 bg-[#FAF7F0] rounded-xl border-none focus:ring-2 focus:ring-[#B17457] text-center font-black text-[#4A4947]">
                                    <button type="submit" class="flex-1 h-12 bg-[#FAF7F0] group-hover:bg-[#B17457] text-[#B17457] group-hover:text-white rounded-xl font-black text-[10px] uppercase tracking-widest transition-all">
                                        + Tambahkan
                                    </button>
                                </div>
                            </form>
                            @else
                            <div class="flex items-center gap-2 opacity-50">
                                <div class="w-16 h-12 bg-[#D8D2C2] rounded-xl flex items-center justify-center font-black text-[#4A4947]">0</div>
                                <button disabled class="flex-1 h-12 bg-[#D8D2C2] text-white rounded-xl font-black text-[10px] uppercase tracking-widest cursor-not-allowed">
                                    Stok Kosong
                                </button>
                            </div>
                            @endif
                        </div>
                        @endforeach
                    </div>
                </section>
                @endif
            </div>

            {{-- SEKSI KANAN: BILL (Span 4) --}}
            <aside class="lg:col-span-4 lg:sticky lg:top-20">
                @if(session()->has('current_order_id'))
                <div class="bg-white rounded-[2.5rem] shadow-2xl border border-[#D8D2C2] overflow-hidden flex flex-col">
                    {{-- Receipt Top --}}
                    <div class="bg-[#4A4947] p-8 text-white relative">
                        <div class="absolute -left-4 -bottom-4 w-8 h-8 bg-[#FAF7F0] rounded-full"></div>
                        <div class="absolute -right-4 -bottom-4 w-8 h-8 bg-[#FAF7F0] rounded-full"></div>
                        <h3 class="text-2xl font-black italic font-serif text-[#B17457]">Boroskopi Bill</h3>
                        <p class="text-[10px] font-medium text-white/40 uppercase tracking-[0.3em] mt-1 italic">Authorized Receipt</p>
                    </div>

                    {{-- List Items --}}
                    <div class="p-8 space-y-6 max-h-[50vh] overflow-y-auto scrollbar-hide">
                        @forelse ($orderedProducts as $OP)
                        <div class="flex justify-between items-start gap-4">
                            <div class="flex-1">
                                <h5 class="text-xs font-black text-[#4A4947] uppercase leading-tight">{{ $OP->product->product_name }}</h5>
                                <p class="text-[10px] font-bold text-[#D8D2C2] mt-1">{{ $OP->quantity }} x Rp {{ number_format($OP->product->price, 0, ',', '.') }}</p>
                            </div>
                            <span class="text-xs font-black text-[#4A4947]">Rp {{ number_format($OP->price, 0, ',', '.') }}</span>
                        </div>
                        @empty
                        <div class="py-12 text-center text-[#D8D2C2] space-y-2">
                            <svg class="w-12 h-12 mx-auto opacity-20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M16 11V7a4 4 0 118 0m-33 11h22a2 2 0 002-2v-5a2 2 0 00-2-2H5a2 2 0 00-2 2v5a2 2 0 002 2z"></path></svg>
                            <p class="text-[10px] font-black uppercase tracking-widest">Belum ada item</p>
                        </div>
                        @endforelse
                    </div>

                    {{-- Summary --}}
                    <div class="p-8 bg-[#FAF7F0] border-t border-dashed border-[#D8D2C2] space-y-3">
                        <div class="flex justify-between items-center text-[#D8D2C2]">
                            <span class="text-[10px] font-black uppercase tracking-widest">Subtotal</span>
                            <span class="text-sm font-bold">Rp {{ number_format($orderedProducts->sum('price'), 0, ',', '.') }}</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-[10px] font-black uppercase tracking-widest text-[#B17457]">Admin Fee</span>
                            <span class="text-sm font-bold text-[#B17457]">Rp 10.000</span>
                        </div>
                        <div class="pt-6 mt-4 border-t border-[#D8D2C2] flex justify-between items-end">
                            <div>
                                <p class="text-[9px] font-black text-[#D8D2C2] uppercase tracking-[0.2em] mb-1">Grand Total</p>
                                <h2 class="text-3xl font-black text-[#4A4947] tracking-tighter">
                                    <span class="text-xs text-[#B17457] mr-1">Rp</span>{{ number_format($orderedProducts->sum('price') + 10000, 0, ',', '.') }}
                                </h2>
                            </div>
                            <form action="{{ route('customer.storeStep3') }}" method="POST">
                                @csrf
                                <input type="hidden" name="order_id" value="{{ session('current_order_id') }}">
                                <button type="submit" class="w-14 h-14 bg-[#B17457] hover:bg-[#4A4947] text-white rounded-2xl flex items-center justify-center shadow-lg transition-all active:scale-90 group">
                                    <svg class="w-6 h-6 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7"></path></svg>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                @else
                <div class="bg-[#D8D2C2]/10 border-2 border-dashed border-[#D8D2C2] rounded-[2.5rem] p-12 text-center">
                    <p class="text-[10px] font-black text-[#D8D2C2] uppercase tracking-[0.3em]">Ringkasan akan muncul di sini setelah data pelanggan disimpan</p>
                </div>
                @endif
            </aside>
        </div>
    </main>
</div>

<style>
    .scrollbar-hide::-webkit-scrollbar { display: none; }
    .scrollbar-hide { -ms-overflow-style: none; scrollbar-width: none; }
    input::-webkit-outer-spin-button, input::-webkit-inner-spin-button { -webkit-appearance: none; margin: 0; }
    input[type=number] { -moz-appearance: textfield; }
</style>
@endsection
