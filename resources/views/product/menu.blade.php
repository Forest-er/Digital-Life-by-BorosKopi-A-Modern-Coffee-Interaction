@extends('layouts.app')
@section('content')
            <!-- Upload Recipe Card -->
            <div class="mx-6 mt-8 mb-4">
                <div class="bg-gradient-to-br from-sand to-coffee/20 rounded-2xl p-6 text-center">
                    <div class="w-32 h-32 mx-auto mb-4">
                        <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 200 200'%3E%3Ccircle cx='100' cy='100' r='80' fill='%23B8826D' opacity='0.2'/%3E%3Cpath d='M70 100 L100 130 L130 100 M100 70 L100 130' stroke='%23B8826D' stroke-width='8' fill='none' stroke-linecap='round'/%3E%3C/svg%3E" alt="Upload" class="w-full h-full">
                    </div>
                    <h3 class="text-dark font-semibold mb-2">Bagikan Resep Anda</h3>
                    <p class="text-sm text-gray-600 mb-4">Tambahkan menu baru ke katalog</p>
                    <button class="w-full bg-coffee hover:bg-coffee/90 text-white font-medium py-2.5 rounded-lg transition">
                        Upload Sekarang
                    </button>
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-8">
            <!-- Header -->
            <div class="flex justify-between items-center mb-8">
                <div>
                    <h2 class="text-3xl font-bold text-dark mb-1">Menu Favorit 😋</h2>
                    <p class="text-gray-500">Kelola menu coffee shop Anda</p>
                </div>
                
                <div class="flex items-center gap-4">
                    <div class="relative">
                        <input type="text" placeholder="Cari menu..." class="pl-10 pr-4 py-2.5 rounded-full border border-sand bg-white focus:outline-none focus:ring-2 focus:ring-coffee/20 w-80">
                        <svg class="w-5 h-5 absolute left-3 top-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <button class="w-10 h-10 rounded-full bg-white border border-sand flex items-center justify-center hover:shadow-md transition">
                        <svg class="w-5 h-5 text-dark" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                        </svg>
                    </button>
                    <div class="relative">
                        <div class="w-10 h-10 rounded-full bg-coffee flex items-center justify-center text-white font-bold cursor-pointer">
                            A
                        </div>
                        <div class="absolute -top-1 -right-1 w-4 h-4 bg-red-500 rounded-full border-2 border-white"></div>
                    </div>
                </div>
            </div>

            <div class="flex gap-8">
                <!-- Menu Grid -->
                <div class="flex-1">
                    <!-- Search within menu -->
                    <div class="mb-6">
                        <div class="relative">
                            <input type="text" placeholder="Cari menu..." class="w-full pl-10 pr-4 py-3 rounded-xl border border-sand bg-white focus:outline-none focus:ring-2 focus:ring-coffee/20">
                            <svg class="w-5 h-5 absolute left-3 top-3.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                    </div>

                    <!-- Menu Cards Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <!-- Menu Card 1 -->
                        <div class="bg-gradient-to-br from-pink-100 to-pink-200 rounded-2xl p-6 relative group hover:shadow-lg transition">
                            <button class="absolute top-4 right-4 w-10 h-10 bg-white rounded-full flex items-center justify-center hover:scale-110 transition">
                                <svg class="w-5 h-5 text-pink-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path>
                                </svg>
                            </button>
                            <div class="w-32 h-32 mx-auto mb-4 bg-white rounded-full flex items-center justify-center overflow-hidden">
                                <div class="w-28 h-28 bg-gradient-to-br from-orange-400 to-red-400 rounded-full"></div>
                            </div>
                            <h3 class="font-bold text-dark mb-2">Cappuccino</h3>
                            <p class="text-sm text-gray-600 mb-4">Espresso dengan foam susu lembut dan bubuk cokelat</p>
                            <div class="flex items-center justify-between">
                                <span class="text-xl font-bold text-dark">Rp 35.000</span>
                                <button class="px-4 py-2 bg-coffee hover:bg-coffee/90 text-white rounded-lg font-medium transition flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                    </svg>
                                    Tambah
                                </button>
                            </div>
                        </div>

                        <!-- Menu Card 2 -->
                        <div class="bg-gradient-to-br from-blue-100 to-cyan-200 rounded-2xl p-6 relative group hover:shadow-lg transition">
                            <button class="absolute top-4 right-4 w-10 h-10 bg-white rounded-full flex items-center justify-center hover:scale-110 transition">
                                <svg class="w-5 h-5 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path>
                                </svg>
                            </button>
                            <div class="w-32 h-32 mx-auto mb-4 bg-white rounded-full flex items-center justify-center overflow-hidden">
                                <div class="w-28 h-28 bg-gradient-to-br from-amber-400 to-yellow-300 rounded-full"></div>
                            </div>
                            <h3 class="font-bold text-dark mb-2">Caffe Latte</h3>
                            <p class="text-sm text-gray-600 mb-4">Espresso dengan steamed milk yang creamy dan latte art</p>
                            <div class="flex items-center justify-between">
                                <span class="text-xl font-bold text-dark">Rp 32.000</span>
                                <button class="px-4 py-2 bg-coffee hover:bg-coffee/90 text-white rounded-lg font-medium transition flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                    </svg>
                                    Tambah
                                </button>
                            </div>
                        </div>

                        <!-- Menu Card 3 -->
                        <div class="bg-gradient-to-br from-green-100 to-emerald-200 rounded-2xl p-6 relative group hover:shadow-lg transition">
                            <button class="absolute top-4 right-4 w-10 h-10 bg-white rounded-full flex items-center justify-center hover:scale-110 transition">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                </svg>
                            </button>
                            <div class="w-32 h-32 mx-auto mb-4 bg-white rounded-full flex items-center justify-center overflow-hidden">
                                <div class="w-28 h-28 bg-gradient-to-br from-green-400 to-emerald-500 rounded-full"></div>
                            </div>
                            <h3 class="font-bold text-dark mb-2">Matcha Latte</h3>
                            <p class="text-sm text-gray-600 mb-4">Matcha premium Jepang dengan susu steamed yang lembut</p>
                            <div class="flex items-center justify-between">
                                <span class="text-xl font-bold text-dark">Rp 38.000</span>
                                <button class="px-4 py-2 bg-coffee hover:bg-coffee/90 text-white rounded-lg font-medium transition flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                    </svg>
                                    Tambah
                                </button>
                            </div>
                        </div>

                        <!-- Menu Card 4 -->
                        <div class="bg-gradient-to-br from-yellow-100 to-amber-200 rounded-2xl p-6 relative group hover:shadow-lg transition">
                            <button class="absolute top-4 right-4 w-10 h-10 bg-white rounded-full flex items-center justify-center hover:scale-110 transition">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                </svg>
                            </button>
                            <div class="w-32 h-32 mx-auto mb-4 bg-white rounded-full flex items-center justify-center overflow-hidden">
                                <div class="w-28 h-28 bg-gradient-to-br from-amber-600 to-orange-700 rounded-full"></div>
                            </div>
                            <h3 class="font-bold text-dark mb-2">Americano</h3>
                            <p class="text-sm text-gray-600 mb-4">Double shot espresso dengan air panas, bold dan kuat</p>
                            <div class="flex items-center justify-between">
                                <span class="text-xl font-bold text-dark">Rp 28.000</span>
                                <button class="px-4 py-2 bg-coffee hover:bg-coffee/90 text-white rounded-lg font-medium transition flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                    </svg>
                                    Tambah
                                </button>
                            </div>
                        </div>

                        <!-- Menu Card 5 -->
                        <div class="bg-gradient-to-br from-blue-100 to-blue-200 rounded-2xl p-6 relative group hover:shadow-lg transition">
                            <button class="absolute top-4 right-4 w-10 h-10 bg-white rounded-full flex items-center justify-center hover:scale-110 transition">
                                <svg class="w-5 h-5 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path>
                                </svg>
                            </button>
                            <div class="w-32 h-32 mx-auto mb-4 bg-white rounded-full flex items-center justify-center overflow-hidden">
                                <div class="w-28 h-28 bg-gradient-to-br from-blue-400 to-indigo-500 rounded-full"></div>
                            </div>
                            <h3 class="font-bold text-dark mb-2">Blue Butterfly</h3>
                            <p class="text-sm text-gray-600 mb-4">Teh bunga telang dengan lemon segar, unik dan menyegarkan</p>
                            <div class="flex items-center justify-between">
                                <span class="text-xl font-bold text-dark">Rp 30.000</span>
                                <button class="px-4 py-2 bg-coffee hover:bg-coffee/90 text-white rounded-lg font-medium transition flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                    </svg>
                                    Tambah
                                </button>
                            </div>
                        </div>

                        <!-- Menu Card 6 -->
                        <div class="bg-gradient-to-br from-pink-100 to-rose-200 rounded-2xl p-6 relative group hover:shadow-lg transition">
                            <button class="absolute top-4 right-4 w-10 h-10 bg-white rounded-full flex items-center justify-center hover:scale-110 transition">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                </svg>
                            </button>
                            <div class="w-32 h-32 mx-auto mb-4 bg-white rounded-full flex items-center justify-center overflow-hidden">
                                <div class="w-28 h-28 bg-gradient-to-br from-pink-400 to-rose-500 rounded-full"></div>
                            </div>
                            <h3 class="font-bold text-dark mb-2">Strawberry Smoothie</h3>
                            <p class="text-sm text-gray-600 mb-4">Smoothie stroberi segar dengan yogurt dan madu alami</p>
                            <div class="flex items-center justify-between">
                                <span class="text-xl font-bold text-dark">Rp 42.000</span>
                                <button class="px-4 py-2 bg-coffee hover:bg-coffee/90 text-white rounded-lg font-medium transition flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                    </svg>
                                    Tambah
                                </button>
                            </div>
                        </div>

                        <!-- Menu Card 7 -->
                        <div class="bg-gradient-to-br from-purple-100 to-purple-200 rounded-2xl p-6 relative group hover:shadow-lg transition">
                            <button class="absolute top-4 right-4 w-10 h-10 bg-white rounded-full flex items-center justify-center hover:scale-110 transition">
                                <svg class="w-5 h-5 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path>
                                </svg>
                            </button>
                            <div class="w-32 h-32 mx-auto mb-4 bg-white rounded-full flex items-center justify-center overflow-hidden">
                                <div class="w-28 h-28 bg-gradient-to-br from-purple-400 to-violet-500 rounded-full"></div>
                            </div>
                            <h3 class="font-bold text-dark mb-2">Taro Latte</h3>
                            <p class="text-sm text-gray-600 mb-4">Minuman taro yang creamy dengan susu dan es batu</p>
                            <div class="flex items-center justify-between">
                                <span class="text-xl font-bold text-dark">Rp 36.000</span>
                                <button class="px-4 py-2 bg-coffee hover:bg-coffee/90 text-white rounded-lg font-medium transition flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                    </svg>
                                    Tambah
                                </button>
                            </div>
                        </div>

                        <!-- Menu Card 8 -->
                        <div class="bg-gradient-to-br from-orange-100 to-amber-200 rounded-2xl p-6 relative group hover:shadow-lg transition">
                            <button class="absolute top-4 right-4 w-10 h-10 bg-white rounded-full flex items-center justify-center hover:scale-110 transition">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection