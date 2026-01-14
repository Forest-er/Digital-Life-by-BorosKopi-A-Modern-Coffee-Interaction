<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coffee Shop Admin - Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        cream: '#F5F1E8',
                        sand: '#E5E0D5',
                        coffee: '#B8826D',
                        dark: '#3D3D3D',
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-cream">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <div class="w-64"></div>
        <aside class="w-64 bg-white shadow-lg fixed h-full flex flex-col"> <div class="flex-grow"> 
            <div class="p-6 border-b border-sand">
                <img src="{{ asset('storage/images/boroskopi.png') }}" alt="">
            </div>

            <div class="p-6 border-b border-sand">
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 rounded-full bg-coffee flex items-center justify-center text-white font-bold">
                        A
                    </div>
                    <div>
                        <h3 class="font-semibold text-dark">Admin</h3>
                        <p class="text-sm text-gray-500">admin@coffee.com</p>
                    </div>
                </div>
            </div>

                        <nav class="p-4">
                <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-4 py-3 text-coffee bg-cream border-l-4 border-coffee rounded-r">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                    <span class="font-medium">Dashboard</span>
                </a>

                <a href="{{ route('order') }}" class="flex items-center gap-3 px-4 py-3 text-dark hover:bg-cream rounded transition mt-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                    </svg>
                    <span class="font-medium">Pesanan</span>
                </a>

                <a href="{{ route('transaction') }}" class="flex items-center gap-3 px-4 py-3 text-dark hover:bg-cream rounded transition mt-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span class="font-medium">Transaksi</span>
                </a>

                <a href="{{ route('product.menu') }}" class="flex items-center gap-3 px-4 py-3 text-dark hover:bg-cream rounded transition mt-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                    </svg>
                    <span class="font-medium">Menu</span>
                </a>

                <a href="#" class="flex items-center gap-3 px-4 py-3 text-dark hover:bg-cream rounded transition mt-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    <span class="font-medium">Pengaturan</span>
                </a>

                <a href="#" class="flex items-center gap-3 px-4 py-3 text-dark hover:bg-cream rounded transition mt-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span class="font-medium">Riwayat</span>
                </a>
            </nav>
        </div>

        <div class="p-4 border-t border-sand">
            <form method="POST" action="{{ route('logout') }}">
                @csrf <button type="submit" class="w-full flex items-center gap-3 px-4 py-3 text-white hover:text-black hover:bg-cream rounded transition bg-red-600">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                    </svg>
                    <span class="font-medium">Logout</span>
                </button>
            </form>
        </div>

        </aside>
        <main class="">@yield('content')</main>
    </div>
</body>
</html>