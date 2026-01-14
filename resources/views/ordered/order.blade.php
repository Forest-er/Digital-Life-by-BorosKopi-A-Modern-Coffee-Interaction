@extends('layouts.app')
@section('content')
        <main class="flex-1 p-8">
            <!-- Header -->
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-3xl font-bold text-dark">Daftar Pesanan</h2>
                
                <div class="flex items-center gap-4">
                    <button class="flex items-center gap-2 text-gray-600 hover:text-dark">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"></path>
                        </svg>
                    </button>
                    <button class="px-6 py-2.5 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-medium transition flex items-center gap-2">
                        <span>+</span>
                        Buat Pesanan
                    </button>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <!-- Active Orders -->
                <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
                    <div class="flex justify-between items-start mb-4">
                        <p class="text-sm text-gray-500 font-medium">Pesanan Aktif</p>
                        <svg class="w-16 h-10" viewBox="0 0 80 40" fill="none">
                            <path d="M0 20 L10 15 L20 25 L30 10 L40 18 L50 8 L60 15 L70 5 L80 12" stroke="#3B82F6" stroke-width="2" fill="none"/>
                            <path d="M0 20 L10 15 L20 25 L30 10 L40 18 L50 8 L60 15 L70 5 L80 12 L80 40 L0 40 Z" fill="url(#blueGradient)" opacity="0.2"/>
                            <defs>
                                <linearGradient id="blueGradient" x1="0" y1="0" x2="0" y2="1">
                                    <stop offset="0%" stop-color="#3B82F6"/>
                                    <stop offset="100%" stop-color="#3B82F6" stop-opacity="0"/>
                                </linearGradient>
                            </defs>
                        </svg>
                    </div>
                    <p class="text-3xl font-bold text-dark">1.046</p>
                </div>

                <!-- Unfulfilled -->
                <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
                    <div class="flex justify-between items-start mb-4">
                        <p class="text-sm text-gray-500 font-medium">Belum Dipenuhi</p>
                        <svg class="w-16 h-10" viewBox="0 0 80 40" fill="none">
                            <path d="M0 25 L10 22 L20 28 L30 20 L40 25 L50 18 L60 22 L70 15 L80 20" stroke="#F59E0B" stroke-width="2" fill="none"/>
                            <path d="M0 25 L10 22 L20 28 L30 20 L40 25 L50 18 L60 22 L70 15 L80 20 L80 40 L0 40 Z" fill="url(#yellowGradient)" opacity="0.2"/>
                            <defs>
                                <linearGradient id="yellowGradient" x1="0" y1="0" x2="0" y2="1">
                                    <stop offset="0%" stop-color="#F59E0B"/>
                                    <stop offset="100%" stop-color="#F59E0B" stop-opacity="0"/>
                                </linearGradient>
                            </defs>
                        </svg>
                    </div>
                    <p class="text-3xl font-bold text-dark">159</p>
                </div>

                <!-- Pending Receipt -->
                <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
                    <div class="flex justify-between items-start mb-4">
                        <p class="text-sm text-gray-500 font-medium">Menunggu Konfirmasi</p>
                        <svg class="w-16 h-10" viewBox="0 0 80 40" fill="none">
                            <path d="M0 30 L10 25 L20 28 L30 22 L40 26 L50 20 L60 24 L70 18 L80 22" stroke="#A855F7" stroke-width="2" fill="none"/>
                            <path d="M0 30 L10 25 L20 28 L30 22 L40 26 L50 20 L60 24 L70 18 L80 22 L80 40 L0 40 Z" fill="url(#purpleGradient)" opacity="0.2"/>
                            <defs>
                                <linearGradient id="purpleGradient" x1="0" y1="0" x2="0" y2="1">
                                    <stop offset="0%" stop-color="#A855F7"/>
                                    <stop offset="100%" stop-color="#A855F7" stop-opacity="0"/>
                                </linearGradient>
                            </defs>
                        </svg>
                    </div>
                    <p class="text-3xl font-bold text-dark">624</p>
                </div>

                <!-- Fulfilled -->
                <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
                    <div class="flex justify-between items-start mb-4">
                        <p class="text-sm text-gray-500 font-medium">Selesai</p>
                        <svg class="w-16 h-10" viewBox="0 0 80 40" fill="none">
                            <path d="M0 28 L10 24 L20 26 L30 20 L40 23 L50 17 L60 20 L70 14 L80 18" stroke="#10B981" stroke-width="2" fill="none"/>
                            <path d="M0 28 L10 24 L20 26 L30 20 L40 23 L50 17 L60 20 L70 14 L80 18 L80 40 L0 40 Z" fill="url(#greenGradient)" opacity="0.2"/>
                            <defs>
                                <linearGradient id="greenGradient" x1="0" y1="0" x2="0" y2="1">
                                    <stop offset="0%" stop-color="#10B981"/>
                                    <stop offset="100%" stop-color="#10B981" stop-opacity="0"/>
                                </linearGradient>
                            </defs>
                        </svg>
                    </div>
                    <p class="text-3xl font-bold text-dark">263</p>
                </div>
            </div>

            <!-- Filters & Table -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100">
                <!-- Tabs -->
                <div class="flex items-center gap-8 px-6 pt-6 border-b border-gray-200">
                    <button class="text-gray-500 hover:text-dark pb-4 font-medium">Semua Pesanan</button>
                    <button class="text-blue-600 pb-4 font-medium border-b-2 border-blue-600">Aktif</button>
                    <button class="text-gray-500 hover:text-dark pb-4 font-medium">Belum Dibayar</button>
                    <button class="text-gray-500 hover:text-dark pb-4 font-medium">Belum Dipenuhi</button>
                    
                    <div class="ml-auto flex items-center gap-3 pb-4">
                        <div class="relative">
                            <input type="text" placeholder="Cari..." class="pl-4 pr-10 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-coffee/20 w-64">
                            <svg class="w-5 h-5 absolute right-3 top-2.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Table -->
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50 border-b border-gray-200">
                            <tr>
                                <th class="px-6 py-4 text-left">
                                    <input type="checkbox" class="w-4 h-4 rounded border-gray-300 text-coffee focus:ring-coffee">
                                </th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">Order ID</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">Dibuat</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">Pelanggan</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">Fulfillment</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">Total</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">Keuntungan</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">Status</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">Diperbarui</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            <!-- Order Row 1 -->
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4">
                                    <input type="checkbox" class="w-4 h-4 rounded border-gray-300 text-coffee focus:ring-coffee">
                                </td>
                                <td class="px-6 py-4">
                                    <a href="#" class="text-blue-600 hover:text-blue-800 font-medium">#121091</a>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-600">1 Ags, 2019</td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-8 h-8 rounded-full bg-coffee flex items-center justify-center text-white text-sm font-semibold">
                                            H
                                        </div>
                                        <span class="text-sm text-gray-700">Harriet Santiago</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex items-center gap-1 px-3 py-1 bg-yellow-100 text-yellow-700 rounded-md text-sm font-medium">
                                        Belum Dipenuhi
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-700">Rp 604.500</td>
                                <td class="px-6 py-4 text-sm text-gray-700">Rp 182.500</td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex items-center gap-1 px-3 py-1 bg-orange-100 text-orange-700 rounded-md text-sm font-medium">
                                        Authorized
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-600">Hari ini</td>
                            </tr>

                            <!-- Order Row 2 -->
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4">
                                    <input type="checkbox" class="w-4 h-4 rounded border-gray-300 text-coffee focus:ring-coffee">
                                </td>
                                <td class="px-6 py-4">
                                    <a href="#" class="text-blue-600 hover:text-blue-800 font-medium">#121090</a>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-600">21 Jul, 2019</td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-8 h-8 rounded-full bg-dark flex items-center justify-center text-white text-sm font-semibold">
                                            S
                                        </div>
                                        <span class="text-sm text-gray-700">Sara Graham</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex items-center gap-1 px-3 py-1 bg-purple-100 text-purple-700 rounded-md text-sm font-medium">
                                        Pending Receipt
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-700">Rp 1.175.500</td>
                                <td class="px-6 py-4 text-sm text-gray-700">Rp 524.250</td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex items-center gap-1 px-3 py-1 bg-green-100 text-green-700 rounded-md text-sm font-medium">
                                        Paid
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-600">Hari ini</td>
                            </tr>

                            <!-- Order Row 3 -->
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4">
                                    <input type="checkbox" class="w-4 h-4 rounded border-gray-300 text-coffee focus:ring-coffee">
                                </td>
                                <td class="px-6 py-4">
                                    <a href="#" class="text-blue-600 hover:text-blue-800 font-medium">#121058</a>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-600">16 Jul, 2019</td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-8 h-8 rounded-full bg-gray-400 flex items-center justify-center text-white text-sm font-semibold">
                                            E
                                        </div>
                                        <span class="text-sm text-gray-700">Elmer McGee</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex items-center gap-1 px-3 py-1 bg-green-100 text-green-700 rounded-md text-sm font-medium">
                                        Fulfilled
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-700">Rp 175.500</td>
                                <td class="px-6 py-4 text-sm text-gray-700">Rp 78.000</td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex items-center gap-1 px-3 py-1 bg-orange-100 text-orange-700 rounded-md text-sm font-medium">
                                        Authorized
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-600">Kemarin</td>
                            </tr>

                            <!-- Order Row 4 -->
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4">
                                    <input type="checkbox" class="w-4 h-4 rounded border-gray-300 text-coffee focus:ring-coffee">
                                </td>
                                <td class="px-6 py-4">
                                    <a href="#" class="text-blue-600 hover:text-blue-800 font-medium">#120999</a>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-600">17 Jul, 2019</td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-8 h-8 rounded-full bg-coffee flex items-center justify-center text-white text-sm font-semibold">
                                            V
                                        </div>
                                        <span class="text-sm text-gray-700">Victor Arnold</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex items-center gap-1 px-3 py-1 bg-green-100 text-green-700 rounded-md text-sm font-medium">
                                        Fulfilled
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-700">Rp 402.500</td>
                                <td class="px-6 py-4 text-sm text-gray-700">Rp 83.000</td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex items-center gap-1 px-3 py-1 bg-orange-100 text-orange-700 rounded-md text-sm font-medium">
                                        Authorized
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-600">26 Jul, 2019</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
@endsection