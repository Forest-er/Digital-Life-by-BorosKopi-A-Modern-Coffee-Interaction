@extends('layouts.app')

@section('content')
<main class="flex-1 bg-cream min-h-screen">
    <div class="flex items-center gap-6 mb-10">
        <a href="{{ route('order') }}" class="group w-12 h-12 rounded-2xl bg-white border border-sand flex items-center justify-center hover:bg-dark transition-all duration-300 shadow-sm hover:shadow-xl hover:-translate-x-1">
            <svg class="w-6 h-6 text-dark group-hover:text-cream transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
        </a>
        <div>
            <div class="flex items-center gap-3">
                <h2 class="text-4xl font-black text-dark tracking-tighter">Detail <span class="text-coffee">Pesanan.</span></h2>
                <span class="px-4 py-1 bg-dark text-cream text-[10px] font-black rounded-full uppercase tracking-[0.2em]">#{{ $Orders->order_id }}</span>
            </div>
            <p class="text-dark/50 font-medium mt-1">Dibuat pada {{ ($Orders->created_at)->format('d M Y • H:i') }}</p>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 items-start">
         <div class="lg:col-span-2 space-y-4">
             <!-- Account Details -->
             <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                 <div class="flex justify-between items-center mb-6">
                     <h3 class="text-xl font-bold text-dark">Detail Akun</h3>
                 </div>

                 <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                     <div>
                         <label class="block text-sm font-medium text-gray-700 mb-2">Email ID</label>
                         <div class="px-4 py-3 bg-gray-50 rounded-lg border border-sand">
                             <p class="text-dark">{{ $Orders->customer_name }}</p>
                         </div>
                     </div>
                     <div>
                         <label class="block text-sm font-medium text-gray-700 mb-2">Nomor Telepon</label>
                         <div class="px-4 py-3 bg-gray-50 rounded-lg border border-sand flex items-center justify-between">
                             <p class="text-dark">{{ $Orders->number_phone }}</p>
                         </div>
                     </div>
                 </div>
             </div>
             <!-- Delivery Address -->
             <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                 <div class="flex justify-between items-center mb-6">
                     <h3 class="text-xl font-bold text-dark">Alamat Pengiriman</h3>
                 </div>

                 <div class="px-4 py-3 bg-gray-50 rounded-lg border border-sand">
                     <p class="text-dark">{{ $Orders->address }}</p>
                 </div>
             </div>
             <!-- Payment Details -->
             <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                 <div class="flex justify-between items-center mb-6">
                     <h3 class="text-xl font-bold text-dark">Detail Pembayaran</h3>
                 </div>

                 <div class="space-y-4">
                     <!-- Payment Method -->
                     <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-start">
                         <div class="px-6 py-4 bg-white rounded-xl border border-gray-200 shadow-sm">
                             <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wider mb-3">Status Pesanan</h3>

                             @php
                                 // Logika warna status otomatis
                                 $statusColor = match($Orders->status) {
                                     'menunggu' => 'bg-yellow-100 text-yellow-700 border-yellow-200',
                                     'proses'   => 'bg-blue-100 text-blue-700 border-blue-200',
                                     'selesai'  => 'bg-green-100 text-green-700 border-green-200',
                                     default    => 'bg-gray-100 text-gray-700 border-gray-200',
                                 };
                             @endphp
                             <div class="inline-flex px-4 py-2 rounded-full border {{ $statusColor }} font-bold text-sm capitalize">
                                 <span class="mr-2">●</span> {{ $Orders->status }}
                             </div>
                         </div>
                         <div class="px-6 py-4 bg-white rounded-xl border border-coffee shadow-sm">
                             <h3 class="text-sm font-semibold text-dark uppercase tracking-wider mb-3">Metode Pembayaran</h3>

                             <label class="flex items-center gap-3 px-4 rounded-lg cursor-pointer hover:bg-white transition">
                                 <div class="inline-flex px-4 py-2 rounded-full border border-coffee font-bold text-sm capitalize">
                                     <span class="mr-2">●</span> {{ $Orders->status }}
                                 </div>
                             </label>
                         </div>
                     </div>
                     <div class="grid grid-cols-3 gap-4">
                         <div>
                             <label class="block text-sm font-medium text-gray-700 mb-2">Hari</label>
                             <input disabled type="text" placeholder="{{ ($Orders->created_at)->format('D | d') }}" class="w-full px-4 py-3 border border-sand rounded-lg focus:outline-none focus:ring-2 focus:ring-coffee/20">
                         </div>
                         <div>
                             <label class="block text-sm font-medium text-gray-700 mb-2">Bulan</label>
                             <input disabled type="text" placeholder="{{ ($Orders->created_at)->format('M') }}" class="w-full px-4 py-3 border border-sand rounded-lg focus:outline-none focus:ring-2 focus:ring-coffee/20">
                         </div>
                         <div>
                             <label class="block text-sm font-medium text-gray-700 mb-2">Tahun</label>
                             <input disabled type="text" placeholder="{{ ($Orders->created_at)->format('Y') }}" class="w-full px-4 py-3 border border-sand rounded-lg focus:outline-none focus:ring-2 focus:ring-coffee/20">
                         </div>
                     </div>
                 </div>
             </div>
             <!-- Action Buttons -->
             <div class="">
                <form action="{{ route('order.update', $Orders->order_id) }}" method="POST" class="flex flex-col gap-4">
                     @csrf
                     <div class="flex gap-4">
                         <div class="relative flex-1 group">
                            <label class="absolute -top-2 left-3 px-2 bg-white text-[10px] font-black uppercase tracking-widest text-brand-primary z-10">
                                Status Pesanan
                            </label>

                            <select name="status"
                                class="w-full px-5 py-3.5 rounded-2xl border-2 border-brand-beige bg-white text-brand-dark font-bold text-sm appearance-none focus:border-brand-primary focus:ring-4 focus:ring-brand-primary/10 outline-none transition-all cursor-pointer shadow-sm hover:border-brand-primary/50">

                                <option value="menunggu" {{ $Orders->status == 'menunggu' ? 'selected' : '' }}>
                                    ⏳ Menunggu Konfirmasi
                                </option>

                                <option value="proses" {{ $Orders->status == 'proses' ? 'selected' : '' }}>
                                    ☕ Sedang Disiapkan
                                </option>

                                <option value="diantar" {{ $Orders->status == 'diantar' ? 'selected' : '' }}>
                                    🛵 Dalam Pengantaran
                                </option>

                                <option value="selesai" {{ $Orders->status == 'selesai' ? 'selected' : '' }}>
                                    ✅ Pesanan Selesai
                                </option>

                                <option value="dibatalkan" {{ $Orders->status == 'dibatalkan' ? 'selected' : '' }} class="text-red-500">
                                    ❌ Batalkan Pesanan
                                </option>
                            </select>

                        </div>
                         <button type="submit" class="flex-1 items-center px-6 py-3.5 bg-white border-2 border-coffee text-coffee rounded-xl font-semibold hover:bg-coffee/5 transition">
                             Update Pesanan
                         </button>
                     </div>
                 </form>
             </div>
         </div>

        <div class="lg:col-span-1 sticky top-8">
            <div class="bg-white rounded-xl shadow-xl border border-sand overflow-hidden flex flex-col">
                <div class="p-8 bg-cream/30 border-b border-dashed border-sand relative">
                    <div class="absolute -left-3 -bottom-3 w-6 h-6 bg-cream rounded-full border border-sand"></div>
                    <div class="absolute -right-3 -bottom-3 w-6 h-6 bg-cream rounded-full border border-sand"></div>

                    <h3 class="text-2xl font-black text-dark tracking-tighter">Ringkasan <span class="text-coffee font-serif italic">Bill.</span></h3>
                </div>

                <div class="p-8 space-y-6">
                    @foreach ($OrdersProduct as $OP)
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
                            <p class="text-[10px] font-bold text-sand uppercase tracking-wider mt-1">Item ID: #{{ $OP->product->id }}</p>
                            <div class="flex justify-between items-end mt-2">
                                <span class="text-xs font-medium text-dark/40 italic">@Rp {{ number_format($OP->product->price, 0, ',', '.') }}</span>
                                <span class="font-black text-dark tracking-tight">Rp {{ number_format(($OP->product->price * $OP->quantity), 0, ',', '.') }}</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="px-8 pb-8 pt-4 space-y-4 border-t border-sand/30 mx-8">
                    <div class="flex justify-between items-center">
                        <span class="text-sm font-bold text-sand uppercase tracking-widest">Subtotal</span>
                        <span class="font-black text-dark">Rp {{ number_format($OrdersProduct->sum('price'), '0', '.', '.') }}</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-sm font-bold uppercase tracking-widest text-coffee">Ongkir</span>
                        <span class="font-black text-coffee uppercase text-xs tracking-tighter font-serif">Rp 10.000</span>
                    </div>
                </div>

                <div class="m-8 p-8 bg-dark rounded-[2rem] flex flex-col items-center justify-center relative overflow-hidden group">
                    <div class="absolute inset-0 bg-coffee/10 translate-y-full group-hover:translate-y-0 transition-transform duration-500"></div>
                    <p class="text-cream/50 text-[10px] font-black uppercase tracking-[0.3em] mb-2 relative">Total Tagihan</p>
                    <h2 class="text-3xl font-black text-cream relative tracking-tighter">
                        <span class="text-coffee text-lg uppercase font-serif mr-1">Rp</span>{{ number_format($OrdersProduct->sum('price') + 10000, 0, ',', '.') }}
                    </h2>
                </div>

                @php
                    $statusConfig = match($Orders->status) {
                        'Menunggu' => ['bg' => 'bg-amber-100', 'text' => 'text-amber-700', 'label' => 'Unpaid Bill'],
                        'Proses' => ['bg' => 'bg-blue-100', 'text' => 'text-blue-700', 'label' => 'In Progress'],
                        'Selesai' => ['bg' => 'bg-green-100', 'text' => 'text-green-700', 'label' => 'Successfully Paid'],
                        default => ['bg' => 'bg-red-100', 'text' => 'text-red-700', 'label' => 'Canceled'],
                    };
                @endphp
                <div class="px-8 py-5 {{ $statusConfig['bg'] }} flex items-center justify-center gap-3">
                    <div class="w-2 h-2 rounded-full {{ $statusConfig['text'] }} bg-current animate-ping"></div>
                    <span class="text-[10px] font-black uppercase tracking-[0.2em] {{ $statusConfig['text'] }}">
                        {{ $statusConfig['label'] }}
                    </span>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
