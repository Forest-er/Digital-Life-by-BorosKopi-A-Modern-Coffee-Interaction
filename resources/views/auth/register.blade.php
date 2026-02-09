@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class=" w-full flex flex-col md:flex-row bg-white rounded-[2.5rem] shadow-2xl overflow-hidden border border-brand-beige/50">

        <div class="w-full md:w-5/12 bg-brand-dark p-10 text-white relative flex flex-col justify-between overflow-hidden">
            <div class="absolute inset-0 opacity-10 pointer-events-none transform -rotate-12 translate-x-10">
                <svg width="400" height="400" viewBox="0 0 100 100" fill="currentColor">
                    <circle cx="20" cy="20" r="2" /> <circle cx="50" cy="50" r="2" />
                    <circle cx="80" cy="80" r="2" /> <circle cx="20" cy="80" r="2" />
                </svg>
            </div>

            <div class="relative z-10">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-brand-primary/20 border border-brand-primary/30 text-brand-primary text-xs font-bold uppercase tracking-widest mb-6">
                    <span class="relative flex h-2 w-2">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-brand-primary opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-brand-primary"></span>
                    </span>
                    Admin Panel
                </div>
                <h2 class="text-4xl font-serif font-black leading-tight mb-4">Ekspansi <br><span class="text-brand-primary">Tim BorosKopi</span></h2>
                <p class="text-brand-beige/70 text-sm leading-relaxed">Pastikan data pekerja diinput dengan benar untuk akses sistem kasir dan manajemen stok.</p>
            </div>

            <div class="relative z-10 mt-8 space-y-4">
                <div class="bg-white/5 backdrop-blur-md p-4 rounded-2xl border border-white/10 flex items-center gap-4">
                    <div class="w-10 h-10 bg-brand-primary rounded-xl flex items-center justify-center shadow-lg shadow-brand-primary/20">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                    </div>
                    <div>
                        <p class="text-[10px] uppercase tracking-widest text-brand-beige/50 font-bold">Keamanan</p>
                        <p class="text-sm font-semibold text-brand-cream">Enkripsi Data Berlapis</p>
                    </div>
                </div>
            </div>

            <div class="relative z-10 pt-10">
                <img src="{{ asset('storage/images/logo.png') }}" alt="Logo" class="h-8 brightness-0 invert">
            </div>
        </div>

        <div class="w-full md:w-7/12 p-8 sm:p-12 lg:p-16">
            <div class="max-w-sm mx-auto">
                <div class="mb-8">
                    <h3 class="text-2xl font-bold text-brand-dark mb-1">Daftarkan Rekan Baru</h3>
                    <div class="h-1.5 w-12 bg-brand-primary rounded-full"></div>
                </div>

                <form method="POST" action="{{ route('admin.register.store') }}" class="space-y-5">
                    @csrf

                    <div class="group">
                        <label for="name" class="block text-xs font-black uppercase tracking-widest text-brand-dark/50 mb-2 group-focus-within:text-brand-primary transition-colors">Nama Lengkap</label>
                        <div class="relative">
                            <input type="text" id="name" name="name" value="{{ old('name') }}"
                                class="w-full pl-4 pr-4 py-3.5 bg-brand-cream/30 rounded-2xl border-2 {{ $errors->has('name') ? 'border-red-400' : 'border-brand-beige/50' }} focus:border-brand-primary focus:bg-white outline-none transition-all placeholder:text-gray-300"
                                required placeholder="Contoh: Andi Wijaya">
                        </div>
                        @if($errors->has('name'))
                            <p class="mt-1.5 text-[10px] font-bold text-red-500 uppercase tracking-tight">{{ $errors->first('name') }}</p>
                        @endif
                    </div>

                    <div class="group">
                        <label for="email" class="block text-xs font-black uppercase tracking-widest text-brand-dark/50 mb-2 group-focus-within:text-brand-primary transition-colors">Alamat Email Kerja</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}"
                            class="w-full px-4 py-3.5 bg-brand-cream/30 rounded-2xl border-2 {{ $errors->has('email') ? 'border-red-400' : 'border-brand-beige/50' }} focus:border-brand-primary focus:bg-white outline-none transition-all placeholder:text-gray-300"
                            required placeholder="andi@boroskopi.com">
                        @if($errors->has('email'))
                            <p class="mt-1.5 text-[10px] font-bold text-red-500 uppercase tracking-tight">{{ $errors->first('email') }}</p>
                        @endif
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="group">
                            <label for="password" class="block text-xs font-black uppercase tracking-widest text-brand-dark/50 mb-2 group-focus-within:text-brand-primary transition-colors">Password</label>
                            <input type="password" id="password" name="password"
                                class="w-full px-4 py-3.5 bg-brand-cream/30 rounded-2xl border-2 {{ $errors->has('password') ? 'border-red-400' : 'border-brand-beige/50' }} focus:border-brand-primary focus:bg-white outline-none transition-all"
                                required placeholder="••••••••">
                        </div>

                        <div class="group">
                            <label for="password_confirmation" class="block text-xs font-black uppercase tracking-widest text-brand-dark/50 mb-2 group-focus-within:text-brand-primary transition-colors">Konfirmasi</label>
                            <input type="password" id="password_confirmation" name="password_confirmation"
                                class="w-full px-4 py-3.5 bg-brand-cream/30 rounded-2xl border-2 border-brand-beige/50 focus:border-brand-primary focus:bg-white outline-none transition-all"
                                required placeholder="••••••••">
                        </div>
                    </div>
                    @if($errors->has('password'))
                        <p class="mt-[-10px] text-[10px] font-bold text-red-500 uppercase tracking-tight">{{ $errors->first('password') }}</p>
                    @endif

                    <div class="pt-6">
                        <button type="submit" class="w-full bg-brand-dark hover:bg-brand-primary text-white font-black py-4 rounded-2xl transition-all duration-500 shadow-xl hover:shadow-brand-primary/20 flex items-center justify-center gap-3 group">
                            <span>Daftarkan Pekerja</span>
                            <svg class="w-5 h-5 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
