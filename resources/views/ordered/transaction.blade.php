@extends('layouts.app')

@section('content')
<main class="flex-1 p-8 min-h-screen">
    <div class="flex justify-between items-center mb-8">
        <h2 class="text-3xl font-bold text-dark">Daftar Pesanan</h2>
        
        <div class="flex items-center gap-4">
            <div class="relative">
                <input type="text" placeholder="Cari pesanan..." class="pl-4 pr-10 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-coffee/20 w-64">
                <svg class="w-5 h-5 absolute right-3 top-2.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </div>
            <button class="px-6 py-2.5 bg-coffee hover:bg-opacity-90 text-white rounded-lg font-medium transition flex items-center gap-2">
                <span>+</span> Buat Pesanan
            </button>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        
        <div class="lg:col-span-2 space-y-8">
            
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="p-6 border-b border-gray-100 flex justify-between items-center">
                    <h3 class="font-bold text-dark text-lg">Transaksi Terakhir</h3>
                    <button class="text-sm text-coffee font-medium border border-coffee px-3 py-1 rounded-md hover:bg-cream transition">Filter</button>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead class="bg-gray-50 text-gray-400 text-xs uppercase font-semibold">
                            <tr>
                                <th class="px-6 py-4">Nama / Pelanggan</th>
                                <th class="px-6 py-4">Tanggal</th>
                                <th class="px-6 py-4">Jumlah</th>
                                <th class="px-6 py-4">Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-50">
                            @php
                                $samples = [
                                    ['name' => 'Harriet Santiago', 'date' => '21 Sep, 2024', 'amount' => 'Rp 604.500', 'status' => 'Pending', 'color' => 'orange'],
                                    ['name' => 'Sara Graham', 'date' => '08 Sep, 2024', 'amount' => 'Rp 1.175.500', 'status' => 'Success', 'color' => 'green'],
                                    ['name' => 'Victor Arnold', 'date' => '17 Okt, 2024', 'amount' => 'Rp 402.500', 'status' => 'Success', 'color' => 'green'],
                                    ['name' => 'Elmer McGee', 'date' => '22 Okt, 2024', 'amount' => 'Rp 175.500', 'status' => 'Failed', 'color' => 'red'],
                                ];
                            @endphp
                            @foreach($samples as $item)
                            <tr class="hover:bg-gray-50 transition text-sm">
                                <td class="px-6 py-4 flex items-center gap-3">
                                    <div class="w-8 h-8 rounded-full bg-coffee/10 flex items-center justify-center text-coffee font-bold text-xs uppercase">{{ substr($item['name'], 0, 1) }}</div>
                                    <span class="font-medium text-dark">{{ $item['name'] }}</span>
                                </td>
                                <td class="px-6 py-4 text-gray-500">{{ $item['date'] }}</td>
                                <td class="px-6 py-4 font-semibold text-dark">{{ $item['amount'] }}</td>
                                <td class="px-6 py-4">
                                    <span class="px-3 py-1 rounded-full text-xs font-bold 
                                        {{ $item['color'] == 'orange' ? 'bg-orange-100 text-orange-600' : '' }}
                                        {{ $item['color'] == 'green' ? 'bg-green-100 text-green-600' : '' }}
                                        {{ $item['color'] == 'red' ? 'bg-red-100 text-red-600' : '' }}">
                                        {{ $item['status'] }}
                                    </span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="p-6 border-b border-gray-100 flex justify-between items-center">
                    <h3 class="font-bold text-dark text-lg">Tagihan & Pembayaran</h3>
                    <button class="text-sm text-coffee font-medium border border-coffee px-3 py-1 rounded-md hover:bg-cream transition">Filter</button>
                </div>
                <div class="p-6 space-y-4">
                    <div class="flex items-center justify-between p-3 hover:bg-gray-50 rounded-lg transition border border-transparent hover:border-gray-100">
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 bg-cream rounded-lg flex items-center justify-center text-coffee">⚡</div>
                            <div>
                                <p class="font-bold text-dark text-sm">Listrik & Air</p>
                                <p class="text-xs text-gray-400">21 Sep, 2024</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="font-bold text-dark text-sm">Rp 450.000</p>
                            <p class="text-[10px] text-green-500 font-bold uppercase">Selesai</p>
                        </div>
                    </div>
                    <div class="flex items-center justify-between p-3 hover:bg-gray-50 rounded-lg transition border border-transparent hover:border-gray-100">
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 bg-cream rounded-lg flex items-center justify-center text-coffee">☕</div>
                            <div>
                                <p class="font-bold text-dark text-sm">Stok Biji Kopi</p>
                                <p class="text-xs text-gray-400">18 Sep, 2024</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="font-bold text-dark text-sm">Rp 2.100.000</p>
                            <p class="text-[10px] text-orange-500 font-bold uppercase">Pending</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="space-y-8">
            
            <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="font-bold text-dark">Aktivitas Transaksi</h3>
                    <div class="flex gap-2 text-[10px] font-bold">
                        <span class="flex items-center gap-1"><span class="w-2 h-2 rounded-full bg-coffee"></span> Pendapatan</span>
                        <span class="flex items-center gap-1"><span class="w-2 h-2 rounded-full bg-orange-400"></span> Pengeluaran</span>
                    </div>
                </div>
                <div class="flex items-end justify-between h-32 gap-2 px-2">
                    <div class="flex flex-col gap-1 w-full h-full justify-end">
                        <div class="w-full bg-coffee rounded-t-sm" style="height: 70%"></div>
                        <div class="w-full bg-orange-200 rounded-t-sm" style="height: 40%"></div>
                    </div>
                    <div class="flex flex-col gap-1 w-full h-full justify-end">
                        <div class="w-full bg-coffee rounded-t-sm" style="height: 50%"></div>
                        <div class="w-full bg-orange-200 rounded-t-sm" style="height: 80%"></div>
                    </div>
                    <div class="flex flex-col gap-1 w-full h-full justify-end">
                        <div class="w-full bg-coffee rounded-t-sm" style="height: 90%"></div>
                        <div class="w-full bg-orange-200 rounded-t-sm" style="height: 30%"></div>
                    </div>
                    <div class="flex flex-col gap-1 w-full h-full justify-end">
                        <div class="w-full bg-coffee rounded-t-sm" style="height: 60%"></div>
                        <div class="w-full bg-orange-200 rounded-t-sm" style="height: 50%"></div>
                    </div>
                </div>
                <div class="flex justify-between mt-4 text-[10px] text-gray-400 font-bold px-2">
                    <span>SEN</span><span>SEL</span><span>RAB</span><span>KAM</span><span>JUM</span>
                </div>
            </div>

            <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100 overflow-hidden relative">
                <p class="text-gray-400 text-sm font-medium mb-1">Total Pengeluaran</p>
                <h3 class="text-2xl font-bold text-dark mb-4">Rp 12.450.000</h3>
                
                <div class="absolute bottom-0 left-0 w-full">
                    <svg class="w-full h-20" viewBox="0 0 100 40" preserveAspectRatio="none">
                        <path d="M0 40 C 20 30, 40 38, 60 15 C 80 5, 100 20, 100 20 L 100 40 L 0 40 Z" fill="url(#coffeeGradient)" opacity="0.15"/>
                        <path d="M0 40 C 20 30, 40 38, 60 15 C 80 5, 100 20, 100 20" stroke="#6F4E37" stroke-width="1" fill="none"/>
                        <defs>
                            <linearGradient id="coffeeGradient" x1="0" y1="0" x2="0" y2="1">
                                <stop offset="0%" stop-color="#6F4E37"/>
                                <stop offset="100%" stop-color="#ffffff"/>
                            </linearGradient>
                        </defs>
                    </svg>
                </div>
                <div class="flex justify-between mt-12 text-[10px] text-gray-300 relative z-10">
                    <span>2022</span><span>2023</span><span>2024</span>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div class="bg-cream p-4 rounded-xl border border-coffee/10">
                    <p class="text-[10px] font-bold text-coffee uppercase">Pesanan Aktif</p>
                    <p class="text-xl font-bold text-dark">1,046</p>
                </div>
                <div class="bg-gray-100 p-4 rounded-xl">
                    <p class="text-[10px] font-bold text-gray-500 uppercase">Selesai</p>
                    <p class="text-xl font-bold text-dark">263</p>
                </div>
            </div>

        </div>
    </div>
</main>
@endsection