@extends('layouts.app')
@section('content')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<main class=" bg-cream min-h-screen w-full font-sans text-dark">
    
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
        <div>
            <h2 class="text-3xl font-extrabold tracking-tight">Welcome back, {{ Auth::user()->name }} 👋</h2>
            <p class="text-coffee font-medium">Berikut adalah ringkasan kedai Anda hari ini.</p>
        </div>
        
        <div class="flex items-center gap-3">
            <div class="relative group">
                <input type="text" placeholder="Search data..." 
                    class="pl-11 pr-4 py-2.5 rounded-2xl bg-white border-none shadow-sm focus:ring-2 focus:ring-coffee w-64 transition-all duration-300 group-hover:shadow-md">
                <svg class="w-5 h-5 absolute left-4 top-3 text-sand" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </div>
            <button class="p-2.5 rounded-2xl bg-white shadow-sm hover:shadow-md transition-all relative">
                <div class="absolute top-2 right-2.5 w-2 h-2 bg-coffee rounded-full border-2 border-white"></div>
                <svg class="w-6 h-6 text-dark" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                </svg>
            </button>
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
                
                <div class="h-[300px]">
                    <canvas id="salesChart"></canvas>
                </div>
            </div>

            <script>
                const ctx = document.getElementById('salesChart').getContext('2d');
                const salesChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
                        datasets: [{
                            label: 'Penjualan',
                            data: @json($data), // Mengambil data dari Controller
                            backgroundColor: '#E5E1DA', // Warna krem seperti di gambar kamu
                            hoverBackgroundColor: '#B17457', // Warna cokelat saat dihover
                            borderRadius: 20, // Membuat ujung bar melengkung (rounded)
                            borderSkipped: false,
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: { display: false } // Sembunyikan label dataset
                        },
                        scales: {
                            y: { display: false, grid: { display: false } },
                            x: {
                                grid: { display: false },
                                ticks: {
                                    color: '#4A4947',
                                    font: { weight: 'bold' }
                                }
                            }
                        }
                    }
                });
            </script>

            <div class="bg-white rounded-[2.5rem] p-8 shadow-sm border border-sand/30">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-xl font-bold">Pesanan Terbaru</h3>
                    <button class="text-coffee font-bold text-sm hover:underline">View All</button>
                </div>
                <div class="space-y-4">
                    @foreach ($Orders as $O)            
                    <div class="flex items-center justify-between p-5 hover:bg-cream rounded-[2rem] transition-all border border-transparent hover:border-sand/50 group">
                        <div class="flex items-center gap-5">
                            <div class="w-14 h-14 bg-dark rounded-2xl flex items-center justify-center text-cream font-bold shadow-lg group-hover:scale-110 transition-transform">
                                #{{ $O->order_id }}
                            </div>
                            <div>
                                <h4 class="font-bold text-lg">{{ $O->customer_name }}</h4>
                                <p class="text-xs text-coffee font-medium uppercase tracking-widest">{{ now()->format('d M, H:i') }}</p>
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

            <div class="bg-white rounded-[2.5rem] p-8 shadow-sm border border-sand/30">
                <h3 class="text-xl font-bold mb-6">Menu Populer</h3>
                <div class="space-y-6">
                    @php 
                        $populer = [
                            ['name' => 'Cappuccino', 'sold' => 128, 'color' => 'bg-coffee', 'percent' => '85%'],
                            ['name' => 'Latte', 'sold' => 95, 'color' => 'bg-sand', 'percent' => '65%'],
                            ['name' => 'Americano', 'sold' => 87, 'color' => 'bg-dark', 'percent' => '55%']
                        ];
                    @endphp
                    @foreach($populer as $p)
                    <div class="space-y-2">
                        <div class="flex justify-between items-center">
                            <span class="font-bold text-sm">{{ $p['name'] }}</span>
                            <span class="text-xs font-bold text-coffee">{{ $p['sold'] }} sold</span>
                        </div>
                        <div class="w-full h-2 bg-cream rounded-full overflow-hidden">
                            <div class="{{ $p['color'] }} h-full rounded-full" style="width: {{ $p['percent'] }}"></div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="bg-dark rounded-[2.5rem] p-6 text-white overflow-hidden relative group">
                <div class="relative z-10 flex items-center gap-4">
                    <div class="bg-yellow-500 w-2 h-12 rounded-full animate-pulse"></div>
                    <div>
                        <h4 class="font-bold">Stok Biji Kopi Rendah!</h4>
                        <p class="text-[10px] text-gray-400">Tersisa < 2kg di gudang utama.</p>
                    </div>
                </div>
                <button class="mt-4 w-full py-2 bg-white/5 hover:bg-white/10 rounded-xl text-xs font-bold transition-colors">Re-order Sekarang</button>
            </div>
        </div>
    </div>
</main>
@endsection