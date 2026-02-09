@extends('layouts.app')
@section('content')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<main class=" bg-cream min-h-screen w-full font-sans text-dark">

    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
        <div>
            <h2 class="text-3xl font-extrabold tracking-tight">Welcome back, {{ Auth::user()->name }} 👋</h2>
            <p class="text-coffee font-medium">Berikut adalah ringkasan kedai Anda hari ini.</p>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-3 mb-6">
        <div class="md:col-span-2 bg-dark rounded-[2rem] p-8 text-white flex justify-between items-center relative overflow-hidden shadow-xl">
            <div class="relative z-10">
                <p class="text-sand text-sm font-medium mb-1">Total Pendapatan</p>
                <h3 class="text-4xl font-bold mb-4">Rp {{ number_format($orderTotalPrice->sum('total_price'), 0, ',', '.') }}</h3>
                <span class="px-3 py-1 bg-white/10 rounded-full text-xs font-semibold text-sand border border-white/10">
                    ↑ dari {{ $orderTotalPrice->count() }} pesanan
                </span>
            </div>
            <div class="bg-coffee p-4 rounded-3xl rotate-12 shadow-lg">
                <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            <div class="absolute -bottom-10 -right-10 w-40 h-40 bg-white/5 rounded-full"></div>
        </div>

        <div class="bg-white rounded-[2rem] p-6 shadow-sm hover:shadow-md transition-all border border-sand/30">
            <div class="w-12 h-12 bg-cream rounded-2xl flex items-center justify-center mb-6">
                <svg class="w-6 h-6 text-coffee" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                </svg>
            </div>
            <p class="text-gray-400 text-sm font-medium">Pesanan Hari Ini</p>
            <p class="text-3xl font-bold">{{ $orderCount }}</p>
        </div>

        <div class="bg-white rounded-[2rem] p-6 shadow-sm hover:shadow-md transition-all border border-sand/30">
            <div class="w-12 h-12 bg-cream rounded-2xl flex items-center justify-center mb-6">
                <svg class="w-6 h-6 text-coffee" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                </svg>
            </div>
            <p class="text-gray-400 text-sm font-medium">Menu Terjual</p>
            <p class="text-3xl font-bold">{{ $orderItemsSell }}</p>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-4">

        <div class="lg:col-span-8 space-y-6">

            <div class="bg-white rounded-[2.5rem] p-8 border border-[#D8D2C2] shadow-sm">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-xl font-black text-[#4A4947]">Aktivitas Penjualan</h3>
                    <span class="px-4 py-1 bg-[#FAF7F0] text-[#B17457] text-xs font-bold rounded-full">Minggu Ini</span>
                </div>

                <div class="w-full max-w-4xl mx-auto p-6 bg-white rounded-3xl shadow-sm border border-sand/20">
                    <h3 class="text-lg font-black text-dark mb-4 uppercase tracking-wider">Statistik Penjualan</h3>
                    <canvas id="salesChart"></canvas>
                </div>
            </div>

            <script>
                const ctx = document.getElementById('salesChart').getContext('2d');

                new Chart(ctx, {
                    type: 'line', // Bisa diganti 'bar', 'pie', dll.
                    data: {
                        labels: @json($labels), // Nama-nama hari
                        datasets: [{
                            label: 'Total Penjualan (Rp)',
                            data: @json($dataValues), // Angka-angka total
                            borderColor: '#d9d9d9', // Warna cokelat kopi
                            backgroundColor: 'rgba(111, 78, 55, 0.1)',
                            borderWidth: 3,
                            tension: 0.4, // Membuat garis jadi melengkung (smooth)
                            fill: true
                        }]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    callback: function(value) {
                                        return 'Rp ' + value.toLocaleString(); // Format rupiah di sumbu Y
                                    }
                                }
                            }
                        }
                    }
                });
            </script>

            <div class="bg-white rounded-[2.5rem] p-8 shadow-sm border border-sand/30">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-xl font-bold">Pesanan Terbaru</h3>
                    <button onclick="window.location.href='{{ route('transaction') }}'" class="text-coffee font-bold text-sm hover:underline">View All</button>
                </div>

                {{-- Tambahkan pembungkus ini dengan overflow-y-auto dan max-h --}}
                <div class="space-y-4 overflow-y-auto max-h-[500px] pr-2 custom-scrollbar">
                    @foreach ($Orders as $O)
                    <div class="flex items-center justify-between p-5 hover:bg-cream rounded-[2rem] transition-all border border-transparent hover:border-sand/50 group">
                        <div class="flex items-center gap-5">
                            <div class="w-14 h-14 bg-dark rounded-2xl flex items-center justify-center text-cream font-bold shadow-lg group-hover:scale-110 transition-transform">
                                #{{ $loop->iteration }}
                            </div>
                            <div>
                                <h4 class="font-bold text-lg">{{ $O->customer_name }}</h4>
                                {{-- Pastikan format waktu diambil dari data order, bukan now() --}}
                                <p class="text-xs text-coffee font-medium uppercase tracking-widest">{{ $O->created_at->format('d M, H:i') }}</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="font-black text-lg">Rp {{ number_format($O->total_price, 0, ',', '.') }}</p>
                            <span class="inline-block px-4 py-1.5 bg-sand/30 text-dark text-[10px] font-black rounded-full mt-1 uppercase tracking-tighter">
                                {{ $O->status }}
                            </span>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <style>
                .custom-scrollbar::-webkit-scrollbar {
                    width: 6px;
                }
                .custom-scrollbar::-webkit-scrollbar-track {
                    background: transparent;
                }
                .custom-scrollbar::-webkit-scrollbar-thumb {
                    background: #D8D2C2;
                    border-radius: 10px;
                }
                .custom-scrollbar::-webkit-scrollbar-thumb:hover {
                    background: #B17457;
                }
            </style>
        </div>

        <div class="lg:col-span-4 space-y-6">

            <div class="bg-coffee rounded-[2.5rem] p-8 text-white shadow-lg shadow-coffee/20">
                <h3 class="text-xl font-bold mb-6 italic">Quick Actions</h3>
                <div class="grid grid-cols-2 gap-4">
                    <button onclick="location.href='{{ route('order.add') }}'" class="flex flex-col items-center justify-center p-4 bg-white/10 hover:bg-white/20 rounded-[1.5rem] transition-all border border-white/10 group">
                        <span class="text-2xl mb-2 group-hover:scale-125 transition-transform">➕</span>
                        <span class="text-[10px] font-bold uppercase tracking-widest">New Order</span>
                    </button>
                    <button onclick="location.href='{{ route('product.add') }}'" class="flex flex-col items-center justify-center p-4 bg-white/10 hover:bg-white/20 rounded-[1.5rem] transition-all border border-white/10 group">
                        <span class="text-2xl mb-2 group-hover:scale-125 transition-transform">📋</span>
                        <span class="text-[10px] font-bold uppercase tracking-widest">Tambah Menu</span>
                    </button>
                </div>
            </div>

            <div class="bg-white rounded-[2.5rem] p-8 border border-[#D8D2C2] shadow-sm">
            <h3 class="text-xl font-black text-[#4A4947] mb-6">Menu Terlaris</h3>

            <div class="space-y-4">
                @foreach($menus as $index => $item)
                <div class="flex items-center gap-4 p-4 rounded-2xl bg-[#FAF7F0] border border-[#D8D2C2]/50 hover:border-[#B17457] transition-all group">
                    {{-- Rank Badge --}}
                    <div class="w-8 h-8 rounded-lg bg-[#B17457] flex items-center justify-center text-white font-black text-xs">
                        {{ $index + 1 }}
                    </div>

                    {{-- Product Image --}}
                    <div class="w-12 h-12 rounded-xl overflow-hidden bg-white">
                        <img src="{{ asset('storage/' . $item->product->image) }}" class="w-full h-full object-cover">
                    </div>

                    {{-- Product Info --}}
                    <div class="flex-1">
                        <h4 class="font-bold text-[#4A4947] text-sm group-hover:text-[#B17457]">{{ $item->product->product_name }}</h4>
                        <p class="text-[10px] text-[#B17457] font-black uppercase tracking-widest">
                            Terjual {{ $item->total_sold }} porsi
                        </p>
                    </div>

                        {{-- Icon --}}
                        <span class="text-lg">
                            @if($index == 0) 🏆 @elseif($index == 1) 🥈 @else 🥉 @endif
                        </span>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="bg-dark rounded-[2.5rem] p-6 text-white overflow-hidden relative group">
                <div class="relative z-10 flex items-center gap-4">
                    <div class="bg-yellow-500 w-2 h-12 rounded-full animate-pulse"></div>
                    <div>
                        <h4 class="font-bold">Stok {{ $lowerStockProducts->first()->product_name ?? 'Produk' }} Produk Rendah!</h4>
                        <p class="text-[10px] text-gray-400">Tersisa {{ $lowerStockProducts->first()->stock_quantity }} stok lagi.</p>
                    </div>
                </div>
                <button onclick="window.location.href='{{ route('product.edit', $lowerStockProducts->first()->product_id) }}'" class="mt-4 w-full py-2 bg-white/5 hover:bg-white/10 rounded-xl text-xs font-bold transition-colors">Perbarui Stok sekarang</button>
            </div>
        </div>
    </div>
</main>
@endsection
