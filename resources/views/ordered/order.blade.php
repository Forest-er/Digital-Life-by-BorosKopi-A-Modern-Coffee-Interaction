@extends('layouts.app')

@section('content')
<main class="flex-1 bg-cream min-h-screen">
    <div class="flex justify-between items-end mb-10">
        <div>
            <h2 class="text-4xl font-black text-dark tracking-tighter">Daftar Pesanan<span class="text-coffee"> Hari ini.</span></h2>
            <p class="text-dark/50 font-medium mt-1">Kelola dan pantau semua pesanan pelanggan Anda.</p>
        </div>

        <div class="flex items-center gap-4">
            <button onclick="window.location.href='{{ route('order.add') }}'" class="px-8 py-3.5 bg-dark hover:bg-coffee text-cream rounded-2xl font-bold transition-all duration-300 shadow-lg hover:shadow-coffee/20 flex items-center gap-3 active:scale-95">
                <span class="text-xl">+</span>
                Buat Pesanan
            </button>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
        <div class="bg-white p-6 rounded-[2rem] shadow-sm border border-dark/30 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 group">
            <div class="flex justify-between items-center mb-4">
                <div class="w-12 h-12 bg-blue-50 text-blue-500 rounded-2xl flex items-center justify-center group-hover:bg-blue-500 group-hover:text-white transition-all">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                </div>
            </div>
            <p class="text-3xl font-black text-dark">{{ $OrdersActive->count() }}</p>
            <p class="text-sm font-bold text-dark/40">Pesanan Aktif</p>
        </div>

        <div class="bg-white p-6 rounded-[2rem] shadow-sm border border-dark/30 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 group">
            <div class="flex justify-between items-center mb-4">
                <div class="w-12 h-12 bg-orange-50 text-orange-500 rounded-2xl flex items-center justify-center group-hover:bg-orange-500 group-hover:text-white transition-all">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
            </div>
            <p class="text-3xl font-black text-dark">{{ $processingOrders->count() }}</p>
            <p class="text-sm font-bold text-dark/40">Sedang Diproses</p>
        </div>

        <div class="bg-white p-6 rounded-[2rem] shadow-sm border border-dark/30 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 group">
            <div class="flex justify-between items-center mb-4">
                <div class="w-12 h-12 bg-purple-50 text-purple-500 rounded-2xl flex items-center justify-center group-hover:bg-purple-500 group-hover:text-white transition-all">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
            </div>
            <p class="text-3xl font-black text-dark">{{ $WaitingOrders->count() }}</p>
            <p class="text-sm font-bold text-dark/40">Menunggu</p>
        </div>

        <div class="bg-white p-6 rounded-[2rem] shadow-sm border border-dark/30 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 group">
            <div class="flex justify-between items-center mb-4">
                <div class="w-12 h-12 bg-green-50 text-green-500 rounded-2xl flex items-center justify-center group-hover:bg-green-500 group-hover:text-white transition-all">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                </div>
                <span class="text-[10px] font-black text-sand uppercase tracking-widest">Completed</span>
            </div>
            <p class="text-3xl font-black text-dark">{{ $doneOrders->count() }}</p>
            <p class="text-sm font-bold text-dark/40">Selesai</p>
        </div>
    </div>

    <div class="bg-white rounded-[2rem] shadow-sm border border-dark/30 overflow-hidden">
        <div class="flex bg-cream p-1.5 rounded-2xl items-center">
            @php $currentStatus = request('status', 'all'); @endphp
            <a href="{{ route('order', ['status' => 'all']) }}"
            class="px-6 py-2.5 {{ $currentStatus == 'all' ? 'bg-white shadow-sm rounded-xl text-dark' : 'text-dark/40 hover:text-dark' }} font-bold text-sm transition-all text-center">
            Semua
            </a>
            <a href="{{ route('order', ['status' => 'Proses']) }}"
            class="px-6 py-2.5 {{ $currentStatus == 'Proses' ? 'bg-white shadow-sm rounded-xl text-dark' : 'text-dark/40 hover:text-dark' }} font-bold text-sm transition-all text-center">
            Aktif
            </a>
            <a href="{{ route('order', ['status' => 'Selesai']) }}"
            class="px-6 py-2.5 {{ $currentStatus == 'Selesai' ? 'bg-white shadow-sm rounded-xl text-dark' : 'text-dark/40 hover:text-dark' }} font-bold text-sm transition-all text-center">
            Selesai
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-[#FAF7F0]/50 text-[10px] font-black text-coffee uppercase tracking-[0.2em]">
                        <th class="px-10 py-5">Order ID</th>
                        <th class="px-6 py-5">Pelanggan</th>
                        <th class="px-6 py-5">Status</th>
                        <th class="px-6 py-5">Total Pembayaran</th>
                        <th class="px-6 py-5">Kontak</th>
                        <th class="px-10 py-5 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-sand/10">
                    @forelse ($Orders as $O)
                    <tr class="hover:bg-cream/30 transition-colors group">
                        <td class="px-10 py-6">
                            <span class="font-black text-dark group-hover:text-coffee transition-colors">#{{ $O->order_id }}</span>
                            <p class="text-[10px] text-coffee font-bold mt-0.5">{{ $O->created_at->format('d/y/m') }}</p>
                        </td>
                        <td class="px-6 py-6">
                            <div class="flex items-center gap-3">
                                <div class="w-9 h-9 rounded-full bg-sand/30 flex items-center justify-center font-bold text-dark text-xs">
                                    {{ substr($O->customer_name, 0, 1) }}
                                </div>
                                <div>
                                    <p class="font-bold text-dark leading-none">{{ $O->customer_name }}</p>
                                    <p class="text-[11px] text-dark/40 mt-1 truncate max-w-[150px]">{{ $O->address }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-6">
                            @php
                                $statusClasses = [
                                    'Done' => 'bg-green-100 text-green-600',
                                    'Processing' => 'bg-orange-100 text-orange-600',
                                    'Pending' => 'bg-purple-100 text-purple-600'
                                ];
                                $class = $statusClasses[$O->status] ?? 'bg-sand/20 text-dark/60';
                            @endphp
                            <span class="px-4 py-1.5 rounded-full text-[10px] font-black uppercase tracking-wider {{ $class }}">
                                {{ $O->status }}
                            </span>
                        </td>
                        <td class="px-6 py-6">
                            <p class="font-black text-dark italic">Rp {{ number_format($O->total_price, 0, ',', '.') }}</p>
                        </td>
                        <td class="px-6 py-6">
                            <div class="flex items-center gap-2 text-dark/60">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                                <span class="text-sm font-bold">{{ $O->number_phone }}</span>
                            </div>
                        </td>
                        <td class="px-10 py-6 text-right">
                            @if ($O->status == 'Dibatalkan')
                            <form action="{{ route('order.destroy', $O->order_id) }}" method="POST"
                                  onsubmit="return confirm('Apakah Anda yakin ingin menghapus pesanan ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                class="inline-flex text-white items-center gap-2 bg-red-500 hover:bg-coffee hover:text-white px-5 py-2.5 rounded-xl text-xs font-black uppercase tracking-widest transition-all duration-300 shadow-sm border border-sand">
                                    hapus
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                </button>
                            </form>
                            @else

                            <a href="{{ route('order.detail', $O->order_id) }}"
                               class="inline-flex items-center gap-2 bg-cream hover:bg-coffee hover:text-white px-5 py-2.5 rounded-xl text-coffee text-xs font-black uppercase tracking-widest transition-all duration-300 shadow-sm border border-sand">
                                Detail
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                            </a>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-10 py-20 text-center">
                            <div class="flex flex-col items-center">
                                <div class="w-20 h-20 bg-cream rounded-full flex items-center justify-center mb-4">
                                    <svg class="w-10 h-10 text-sand" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
                                </div>
                                <h3 class="text-lg font-bold text-dark">Belum ada pesanan</h3>
                                <p class="text-sand font-medium">Pesanan yang masuk akan muncul di sini.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="px-10 py-6 bg-[#FAF7F0]/30 border-t border-sand/20 flex items-center justify-between">
            <p class="text-xs font-bold text-dark/40 italic">Menampilkan {{ $Orders->count() }} hasil dari seluruh database.</p>
            <div class="flex gap-2">
                <button class="w-8 h-8 rounded-lg border border-sand flex items-center justify-center hover:bg-white transition-colors"><svg class="w-4 h-4 text-dark" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg></button>
                <button class="w-8 h-8 rounded-lg border border-sand flex items-center justify-center bg-dark text-white text-xs font-bold">1</button>
                <button class="w-8 h-8 rounded-lg border border-sand flex items-center justify-center hover:bg-white transition-colors text-xs font-bold">2</button>
                <button class="w-8 h-8 rounded-lg border border-sand flex items-center justify-center hover:bg-white transition-colors"><svg class="w-4 h-4 text-dark" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg></button>
            </div>
        </div>
    </div>
</main>
@endsection
