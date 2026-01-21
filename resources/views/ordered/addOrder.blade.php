@extends('layouts.app')

@section('content')
<main class="flex-1 bg-cream min-h-screen">
    <div class="flex items-center gap-4 mb-8">
        <a href="{{ route('order') }}" class="w-10 h-10 rounded-xl bg-white border border-sand flex items-center justify-center hover:bg-dark hover:text-cream transition-all shadow-sm">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
        </a>
        <h2 class="text-2xl md:text-3xl font-black text-dark tracking-tighter">Buat <span class="text-coffee">Pesanan Baru.</span></h2>
    </div>

    <form action="" method="POST">
        @csrf
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <div class="lg:col-span-2 space-y-6">
                <div class="bg-white rounded-[2.5rem] p-6 md:p-10 border border-sand shadow-sm">
                    <h3 class="text-lg font-black text-dark mb-8 flex items-center gap-2">
                        <span class="w-8 h-8 rounded-lg bg-cream flex items-center justify-center text-coffee text-sm">01</span>
                        Informasi Pelanggan
                    </h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label class="text-[10px] font-black text-sand uppercase tracking-widest ml-1">Nama Lengkap</label>
                            <input type="text" name="customer_name" placeholder="E.g. John Doe" required
                                   class="w-full px-6 py-4 rounded-2xl bg-cream/30 border border-sand focus:border-coffee focus:bg-white outline-none transition-all font-bold text-dark">
                        </div>
                        
                        <div class="space-y-2">
                            <label class="text-[10px] font-black text-sand uppercase tracking-widest ml-1">Nomor WhatsApp</label>
                            <input type="tel" name="number_phone" placeholder="0812xxxx" required
                                   class="w-full px-6 py-4 rounded-2xl bg-cream/30 border border-sand focus:border-coffee focus:bg-white outline-none transition-all font-bold text-dark">
                        </div>

                        <div class="md:col-span-2 space-y-2">
                            <label class="text-[10px] font-black text-sand uppercase tracking-widest ml-1">Alamat Lengkap</label>
                            <textarea name="address" rows="3" placeholder="Masukkan alamat pengiriman..." required
                                      class="w-full px-6 py-4 rounded-2xl bg-cream/30 border border-sand focus:border-coffee focus:bg-white outline-none transition-all font-bold text-dark resize-none"></textarea>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-[2.5rem] p-6 md:p-10 border border-sand shadow-sm">
                    <h3 class="text-lg font-black text-dark mb-8 flex items-center gap-2">
                        <span class="w-8 h-8 rounded-lg bg-cream flex items-center justify-center text-coffee text-sm">02</span>
                        Detail Pesanan
                    </h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label class="text-[10px] font-black text-sand uppercase tracking-widest ml-1">Jumlah Item (Quantity)</label>
                            <div class="flex items-center bg-cream/30 border border-sand rounded-2xl px-4">
                                <button type="button" onclick="this.parentNode.querySelector('input').stepDown()" class="p-4 text-coffee hover:scale-125 transition-transform font-black">-</button>
                                <input type="number" name="quantity" value="1" min="1" 
                                       class="w-full bg-transparent border-none text-center font-black text-dark focus:ring-0">
                                <button type="button" onclick="this.parentNode.querySelector('input').stepUp()" class="p-4 text-coffee hover:scale-125 transition-transform font-black">+</button>
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label class="text-[10px] font-black text-sand uppercase tracking-widest ml-1">Status Awal</label>
                            <select name="status" class="w-full px-6 py-4 rounded-2xl bg-cream/30 border border-sand focus:border-coffee focus:bg-white outline-none transition-all font-bold text-dark appearance-none">
                                <option value="menunggu">⏳ Menunggu</option>
                                <option value="proses">👨‍🍳 Proses</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-1">
                <div class="bg-dark rounded-[2.5rem] p-8 text-cream sticky top-8 shadow-2xl overflow-hidden group">
                    <div class="absolute top-0 left-0 w-full h-2 bg-coffee/30"></div>
                    
                    <h3 class="text-xl font-black mb-8 flex justify-between items-center">
                        Ringkasan 
                        <span class="text-[10px] px-3 py-1 bg-white/10 rounded-lg text-sand tracking-[0.3em]">BILL</span>
                    </h3>

                    <div class="space-y-4 mb-8">
                        <div class="flex justify-between items-center opacity-60">
                            <span class="text-sm font-medium italic">Estimasi Biaya</span>
                            <span class="font-bold">Automated</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-sm font-medium">Biaya Layanan</span>
                            <span class="font-bold text-coffee">Gratis</span>
                        </div>
                        <div class="pt-4 border-t border-white/10 flex justify-between items-end">
                            <span class="text-sm font-black uppercase tracking-widest text-sand">Total Bayar</span>
                            <div class="text-right">
                                <p class="text-[10px] text-coffee font-black uppercase tracking-tighter">Input Total Price</p>
                                <div class="flex items-center gap-2">
                                    <span class="text-coffee font-serif italic text-xl">Rp</span>
                                    <input type="number" name="total_price" placeholder="0" required
                                           class="bg-transparent border-none p-0 text-2xl font-black text-cream w-32 focus:ring-0 placeholder:text-white/10">
                                </div>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="w-full py-5 bg-coffee hover:bg-cream hover:text-dark text-cream rounded-[1.5rem] font-black uppercase tracking-[0.2em] transition-all duration-500 shadow-lg flex items-center justify-center gap-3 group/btn">
                        Konfirmasi Pesanan
                        <svg class="w-5 h-5 group-hover/btn:translate-x-2 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7"></path>
                        </svg>
                    </button>

                    <p class="text-[9px] text-center mt-6 opacity-30 font-medium uppercase tracking-widest">
                        Pastikan data sudah benar sebelum konfirmasi
                    </p>
                </div>
            </div>
        </div>
    </form>
</main>

<style>
    /* Menghilangkan panah spinner pada input number */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
</style>
@endsection