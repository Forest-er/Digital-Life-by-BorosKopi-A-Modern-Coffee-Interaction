@extends('layouts.app')
@section('content')
        <!-- Main Content -->
        <main class="flex-1 p-8">
            <!-- Header -->
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-3xl font-bold text-dark">Halo, Admin</h2>
                
                <div class="flex items-center gap-4">
                    <div class="relative">
                        <input type="text" placeholder="Cari..." class="pl-10 pr-4 py-2 rounded-full border border-sand bg-white focus:outline-none focus:ring-2 focus:ring-coffee w-64">
                        <svg class="w-5 h-5 absolute left-3 top-2.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <button class="w-10 h-10 rounded-full bg-white shadow flex items-center justify-center hover:shadow-md transition">
                        <svg class="w-5 h-5 text-dark" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <!-- Card 1 -->
                <div class="bg-gradient-to-br from-purple-200 to-purple-300 rounded-2xl p-6 shadow-md">
                    <div class="w-12 h-12 bg-white bg-opacity-50 rounded-xl flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-purple-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                        </svg>
                    </div>
                    <p class="text-sm text-gray-600 mb-2">Pesanan Hari Ini</p>
                    <p class="text-sm text-gray-500 mb-1">{{ date('d F Y') }}</p>
                    <p class="text-3xl font-bold text-dark">45</p>
                </div>

                <!-- Card 2 -->
                <div class="bg-gradient-to-br from-green-200 to-green-300 rounded-2xl p-6 shadow-md">
                    <div class="w-12 h-12 bg-white bg-opacity-50 rounded-xl flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-green-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <p class="text-sm text-gray-600 mb-2">Pendapatan</p>
                    <p class="text-sm text-gray-500 mb-1">{{ date('F Y') }}</p>
                    <p class="text-3xl font-bold text-dark">Rp 3.250.000</p>
                </div>

                <!-- Card 3 -->
                <div class="bg-gradient-to-br from-pink-200 to-pink-300 rounded-2xl p-6 shadow-md">
                    <div class="w-12 h-12 bg-white bg-opacity-50 rounded-xl flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-pink-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                        </svg>
                    </div>
                    <p class="text-sm text-gray-600 mb-2">Menu Terjual</p>
                    <p class="text-sm text-gray-500 mb-1">{{ date('F Y') }}</p>
                    <p class="text-3xl font-bold text-dark">892</p>
                </div>

                <!-- Card 4 -->
                <div class="bg-gradient-to-br from-orange-200 to-orange-300 rounded-2xl p-6 shadow-md">
                    <div class="w-12 h-12 bg-white bg-opacity-50 rounded-xl flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-orange-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <p class="text-sm text-gray-600 mb-2">Total Pelanggan</p>
                    <p class="text-sm text-gray-500 mb-1">{{ date('F Y') }}</p>
                    <p class="text-3xl font-bold text-dark">234</p>
                </div>
            </div>

            <!-- Recent Orders & Quick Actions -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Recent Orders -->
                <div class="lg:col-span-2 bg-white rounded-2xl shadow-md p-6">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-xl font-bold text-dark">Pesanan Terbaru</h3>
                        <button class="text-coffee hover:text-coffee/80 text-sm font-medium">Lihat Semua</button>
                    </div>

                    <div class="space-y-4">
                        <!-- Order Item -->
                        <div class="flex items-center justify-between p-4 bg-cream rounded-xl hover:shadow-md transition">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 bg-coffee rounded-full flex items-center justify-center text-white font-bold">
                                    #1
                                </div>
                                <div>
                                    <h4 class="font-semibold text-dark">Budi Santoso</h4>
                                    <p class="text-sm text-gray-500">{{ now()->format('d/m/Y H:i') }}</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="font-bold text-dark">Rp 85.000</p>
                                <span class="inline-block px-3 py-1 bg-yellow-200 text-yellow-800 text-xs rounded-full mt-1">Diproses</span>
                            </div>
                        </div>

                        <div class="flex items-center justify-between p-4 bg-cream rounded-xl hover:shadow-md transition">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 bg-coffee rounded-full flex items-center justify-center text-white font-bold">
                                    #2
                                </div>
                                <div>
                                    <h4 class="font-semibold text-dark">Siti Rahma</h4>
                                    <p class="text-sm text-gray-500">{{ now()->subMinutes(15)->format('d/m/Y H:i') }}</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="font-bold text-dark">Rp 125.000</p>
                                <span class="inline-block px-3 py-1 bg-green-200 text-green-800 text-xs rounded-full mt-1">Selesai</span>
                            </div>
                        </div>

                        <div class="flex items-center justify-between p-4 bg-cream rounded-xl hover:shadow-md transition">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 bg-coffee rounded-full flex items-center justify-center text-white font-bold">
                                    #3
                                </div>
                                <div>
                                    <h4 class="font-semibold text-dark">Ahmad Fauzi</h4>
                                    <p class="text-sm text-gray-500">{{ now()->subMinutes(30)->format('d/m/Y H:i') }}</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="font-bold text-dark">Rp 65.000</p>
                                <span class="inline-block px-3 py-1 bg-blue-200 text-blue-800 text-xs rounded-full mt-1">Baru</span>
                            </div>
                        </div>

                        <div class="flex items-center justify-between p-4 bg-cream rounded-xl hover:shadow-md transition">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 bg-coffee rounded-full flex items-center justify-center text-white font-bold">
                                    #4
                                </div>
                                <div>
                                    <h4 class="font-semibold text-dark">Dewi Lestari</h4>
                                    <p class="text-sm text-gray-500">{{ now()->subHour()->format('d/m/Y H:i') }}</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="font-bold text-dark">Rp 95.000</p>
                                <span class="inline-block px-3 py-1 bg-green-200 text-green-800 text-xs rounded-full mt-1">Selesai</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Actions & Info -->
                <div class="space-y-6">
                    <!-- Quick Actions -->
                    <div class="bg-dark rounded-2xl shadow-md p-6 text-white">
                        <h3 class="text-xl font-bold mb-4">Aksi Cepat</h3>
                        <div class="space-y-3">
                            <button class="w-full bg-coffee hover:bg-coffee/90 text-white font-semibold py-3 rounded-xl transition">
                                + Pesanan Baru
                            </button>
                            <button class="w-full bg-white/10 hover:bg-white/20 text-white font-semibold py-3 rounded-xl transition">
                                Lihat Menu
                            </button>
                            <button class="w-full bg-white/10 hover:bg-white/20 text-white font-semibold py-3 rounded-xl transition">
                                Laporan Harian
                            </button>
                        </div>
                    </div>

                    <!-- Menu Populer -->
                    <div class="bg-white rounded-2xl shadow-md p-6">
                        <h3 class="text-xl font-bold text-dark mb-4">Menu Populer</h3>
                        <div class="space-y-3">
                            <div class="flex justify-between items-center pb-3 border-b border-sand">
                                <div>
                                    <p class="font-semibold text-dark">Cappuccino</p>
                                    <p class="text-sm text-gray-500">128 terjual</p>
                                </div>
                                <span class="text-coffee font-bold">☕</span>
                            </div>
                            <div class="flex justify-between items-center pb-3 border-b border-sand">
                                <div>
                                    <p class="font-semibold text-dark">Latte</p>
                                    <p class="text-sm text-gray-500">95 terjual</p>
                                </div>
                                <span class="text-coffee font-bold">☕</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <div>
                                    <p class="font-semibold text-dark">Americano</p>
                                    <p class="text-sm text-gray-500">87 terjual</p>
                                </div>
                                <span class="text-coffee font-bold">☕</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
@endsection