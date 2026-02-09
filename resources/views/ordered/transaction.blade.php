@extends('layouts.app')

@section('content')
<main class="flex-1 bg-cream min-h-screen">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6 mb-10">
        <div>
            <h2 class="text-4xl font-black text-dark tracking-tighter">Riwayat <span class="text-coffee">Transaksi.</span></h2>
        </div>

    </div>

    <div class="grid grid-cols-1 lg:grid-cols-4 gap-4">

        <div class="lg:col-span-3 space-y-6">

            <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                <div class="bg-dark rounded-[2rem] p-8 text-cream relative overflow-hidden group hover:-translate-y-1 transition-all duration-300 shadow-xl">
                    <div class="absolute -right-4 -bottom-4 w-24 h-24 bg-coffee/20 rounded-full blur-2xl group-hover:bg-coffee/40 transition-all"></div>
                    <p class="text-[10px] font-black uppercase tracking-[0.2em] opacity-60 mb-2">Total pendapatan minggu ini</p>
                    <h3 class="text-3xl font-black">Rp {{ number_format($orderdone->sum('total_price')) }}</h3>
                    <div class="mt-4 flex items-center gap-2 text-xs font-bold text-green-400">
                    </div>
                </div>

                <div class="bg-white rounded-[2rem] p-8 border border-sand shadow-sm hover:shadow-md transition-all">
                    <p class="text-[10px] font-black uppercase tracking-[0.2em] mb-2 text-coffee">Transaksi Sukses</p>
                    <h3 class="text-3xl font-black text-dark tracking-tight">{{ count($orderdone) }}</h3>
                    <div class="mt-4 flex gap-1">
                        @for($i=0; $i<5; $i++) <div class="h-1.5 flex-1 bg-coffee rounded-full"></div> @endfor
                    </div>
                </div>

                <div class="bg-white rounded-[2rem] p-8 border border-sand shadow-sm hover:shadow-md transition-all">
                    <p class="text-[10px] font-black text-sand uppercase tracking-[0.2em] mb-2">Dibatalkan</p>
                    <h3 class="text-3xl font-black text-dark tracking-tight">{{ $orderFail }}</h3>
                </div>
            </div>

            <div class="bg-white rounded-[2.5rem] shadow-xl border border-sand overflow-hidden">
                <div class="p-8 border-b border-sand/30 flex justify-between items-center bg-cream/20">
                    <h3 class="font-black text-dark text-xl tracking-tight">Daftar Log <span class="text-coffee">Transaksi.</span></h3>
                    <span class="px-4 py-1.5 bg-dark text-cream text-[10px] font-black rounded-xl uppercase tracking-widest">Live Updates</span>
                </div>

                <div class="overflow-x-auto px-4 pb-4">
                    <table class="w-full text-left border-separate border-spacing-y-4">
                        <thead class="text-[10px] font-black text-coffee uppercase tracking-[0.2em]">
                            <tr>
                                <th class="px-6 py-2">ID & Pelanggan</th>
                                <th class="px-6 py-2">Waktu Transaksi</th>
                                <th class="px-6 py-2">Total Tagihan</th>
                                <th class="px-6 py-2 text-center">Metode</th>
                                <th class="px-6 py-2 text-right">Status</th>
                            </tr>
                        </thead>
                        <tbody class="">
                            @foreach($orderdone as $item)
                            <tr class="group hover:bg-cream/50 transition-all duration-300">
                                <td class="px-6 py-4 bg-white border-y border-l border-sand group-hover:border-coffee/30 rounded-l-[1.5rem]">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 rounded-xl bg-dark text-cream flex items-center justify-center font-black text-xs shadow-lg group-hover:scale-110 transition-transform">
                                            {{ substr($item->customer_name, 0, 1) }}
                                        </div>
                                        <div>
                                            <p class="font-black text-dark text-sm leading-none">{{ $item->customer_name }}</p>
                                            <p class="text-[10px] font-bold text-coffee mt-1">#{{ $item->order_id }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 bg-white border-y border-sand group-hover:border-coffee/30">
                                    <span class="text-xs font-bold text-dark/60 tracking-tight">{{ $item->created_at }}</span>
                                </td>
                                <td class="px-6 py-4 bg-white border-y border-sand group-hover:border-coffee/30">
                                    <span class="font-black text-dark">Rp {{ number_format($item->total_price, 0, ',', '.') }}</span>
                                </td>
                                <td class="px-6 py-4 bg-white border-y border-sand group-hover:border-coffee/30 text-center">
                                    <span class="text-[10px] font-black border border-sand px-3 py-1 rounded-lg text-sand uppercase">{{ $item->payment_method }}</span>
                                </td>
                                <td class="px-6 py-4 bg-white border-y border-r border-sand group-hover:border-coffee/30 rounded-r-[1.5rem] text-right">
                                    <span class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full text-[10px] font-black uppercase tracking-tighter
                                       ">
                                        <span class="w-1.5 h-1.5 rounded-full bg-current animate-pulse"></span>
                                        {{ $item->status }}
                                    </span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="space-y-8">

            <div class="bg-white rounded-[2.5rem] p-8 border border-brand-beige shadow-sm relative overflow-hidden group hover:shadow-xl transition-all duration-500">
    <div class="absolute -top-10 -right-10 w-32 h-32 bg-brand-primary/5 rounded-full blur-3xl group-hover:bg-brand-primary/10 transition-colors"></div>

    <div class="relative z-10">
        <div class="flex justify-between items-start mb-6">
            <h3 class="font-black text-brand-dark tracking-tight leading-tight">
                Sisa Target <br>
                <span class="text-brand-primary font-serif italic text-2xl">Penjualan</span>
            </h3>
            <div class="bg-brand-cream p-3 rounded-2xl border border-brand-primary/10">
                <svg class="w-6 h-6 text-brand-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                </svg>
            </div>
        </div>

        <div class="relative group/amount">
            <div class="absolute inset-0 bg-brand-primary/5 blur-xl rounded-full opacity-0 group-hover/amount:opacity-100 transition-opacity"></div>
            <div class="relative p-6 bg-brand-cream/50 rounded-[2rem] border border-dashed border-brand-primary/30 backdrop-blur-sm">
                <p class="text-[10px] font-black uppercase tracking-widest text-brand-dark/40 mb-1">Total sisa yang harus dicapai:</p>
                <h4 class="text-3xl font-black text-brand-dark tracking-tighter">
                    <span class="text-brand-primary text-xl font-serif mr-1">Rp</span>{{ number_format($target, 0, ',', '.') }}
                </h4>
            </div>
        </div>

        <div class="mt-6 flex items-center gap-2 text-xs text-brand-dark/50">
            <svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
            </svg>
            <span>Target diperbarui setiap re-stock</span>
        </div>
    </div>
</div>
            <a href="{{ route('export.pdf') }}" class="block">
            <div class="bg-coffee rounded-[2.5rem] p-8 text-cream shadow-2xl relative group cursor-pointer overflow-hidden">
                <div class="absolute inset-0 bg-dark/20 translate-y-full group-hover:translate-y-0 transition-transform duration-500"></div>
                <div class="relative z-10">
                    <svg class="w-10 h-10 mb-6 text-cream opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <h4 class="text-xl font-black tracking-tight leading-tight mb-2">Butuh Laporan Lengkap?</h4>
                    <p class="text-xs font-medium text-cream/60 leading-relaxed mb-6">Ekspor data transaksi bulanan Anda ke format PDF atau Excel sekarang.</p>
                    <button class="w-full py-4 bg-cream text-coffee rounded-2xl font-black uppercase text-[10px] tracking-widest shadow-xl active:scale-95 transition-all">Download Report</button>
                </div>
            </div>
            </a>

        </div>
    </div>
</main>
@endsection
