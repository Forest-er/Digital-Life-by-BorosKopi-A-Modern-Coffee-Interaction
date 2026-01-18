@extends('layouts.app')
@section('content')
        <main class="flex-1 p-8">
            <!-- Header -->
            <div class="flex items-center gap-4 mb-8">
                <a href="{{ route('order') }}" class="w-10 h-10 rounded-lg bg-white border border-sand flex items-center justify-center hover:shadow-md transition">
                    <svg class="w-5 h-5 text-dark" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </a>
                <div>
                    <h2 class="text-3xl font-bold text-dark">Detail Pesanan #{{ $Orders->order_id }}</h2>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Left Column - Order Details -->
                <div class="lg:col-span-2 space-y-6">
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
                                <select name="status" class="flex-1 px-4 py-3 rounded-xl border-2 border-sand focus:border-coffee outline-none bg-white">
                                    <option value="menunggu" {{ $Orders->status == 'menunggu' ? 'selected' : '' }}>Menunggu</option>
                                    <option value="proses" {{ $Orders->status == 'proses' ? 'selected' : '' }}>Proses</option>
                                    <option value="selesai" {{ $Orders->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                                    <option value="dibatalkan" {{ $Orders->status == 'dibatalkan' ? 'selected' : '' }}>Batalkan</option>
                                </select>
                                <button type="submit" class="flex-1 items-center px-6 py-3.5 bg-white border-2 border-coffee text-coffee rounded-xl font-semibold hover:bg-coffee/5 transition">
                                    Update Pesanan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Right Column - Order Summary -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 sticky top-8">
                        <h3 class="text-xl font-bold text-dark mb-6">Ringkasan Pesanan</h3>

                        <!-- Order Items -->
                        <div class="space-y-4 mb-6 pb-6 border-b border-sand">
                            @foreach ($OrdersProduct as $OP)            
                            <div class="flex gap-4">
                                <div class="w-16 h-16 bg-gradient-to-br from-orange-300 to-amber-400 rounded-xl flex-shrink-0"></div>
                                <div class="flex-1">
                                    <h4 class="font-semibold text-dark mb-1">{{ $OP->product->product_name }}</h4>
                                    <p class="text-sm text-gray-500 mb-2">{{ $OP->product->description }}</p>
                                    <div class="flex justify-between items-center">
                                        <span class="text-sm text-gray-600">Rp {{ number_format($OP->product->price, 0, ',', '.') }} × {{ $OP->quantity }}</span>
                                        <span class="font-semibold text-dark">Rp {{ number_format(($OP->product->price * $OP->quantity), 0, ',', '.') }}</span>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>

                        <!-- Price Summary -->
                        <div class="space-y-3 mb-6 pb-6 border-b border-sand">
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">Sub Total</span>
                                <span class="font-semibold text-dark">Rp {{ number_format($OrdersProduct->sum('price'), '0', '.', '.') }}</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">Diskon (10%)</span>
                                <span class="font-semibold text-green-600">-Rp 18.300</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">Pajak</span>
                                <span class="font-semibold text-dark">Rp 0</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">Pengiriman</span>
                                <span class="font-semibold text-coffee">Gratis</span>
                            </div>
                        </div>

                        <!-- Total -->
                        <div class="flex justify-between items-center mb-6">
                            <span class="text-xl font-bold text-dark">Total</span>
                            <span class="text-2xl font-bold text-coffee">Rp {{ number_format($OrdersProduct->sum('price') - 18300, 0, ',', '.') }}</span>
                        </div>

                        <!-- Additional Info -->
                        <div class="space-y-3">
                            <details class="group">
                                <summary class="flex justify-between items-center cursor-pointer text-sm text-gray-600 hover:text-dark">
                                    <span>Pajak termasuk. <span class="underline">Pengiriman</span> dihitung saat checkout.</span>
                                    <svg class="w-4 h-4 transition-transform group-open:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m0 0l-7-7m7 7l7-7"></path>
                                    </svg>
                                </summary>
                                <p class="mt-3 text-sm text-gray-500 pl-1">Pengiriman gratis untuk pesanan di atas Rp 100.000 dalam radius 5km dari toko.</p>
                            </details>

                            <details class="group">
                                <summary class="flex justify-between items-center cursor-pointer text-sm text-gray-600 hover:text-dark">
                                    <span>Estimasi Pengiriman: 25 April, 2025</span>
                                    <svg class="w-4 h-4 transition-transform group-open:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m0 0l-7-7m7 7l7-7"></path>
                                    </svg>
                                </summary>
                                <p class="mt-3 text-sm text-gray-500 pl-1">Pesanan Anda akan disiapkan dalam 15-30 menit dan dikirim segera setelahnya.</p>
                            </details>
                        </div>

                        <!-- Status Badge -->
                        <div class="mt-6 p-4 bg-yellow-50 border border-yellow-200 rounded-xl">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-yellow-400 rounded-full flex items-center justify-center">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-semibold text-yellow-900">Menunggu Pembayaran</p>
                                    <p class="text-sm text-yellow-700">Selesaikan pembayaran untuk memproses pesanan</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
@endsection