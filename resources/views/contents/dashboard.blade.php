@extends('layouts.main')

@section('content')
    @livewire('card-dashboard')

    <div class="grid grid-cols-1 gap-6 mb-6">
        <div class="bg-white border border-gray-100 shadow-md shadow-black/5 p-6 rounded-md">
            <div class="flex justify-center mb-6">
                <img src="{{ asset('assets/img/logo.png') }}" alt="" class="w-8 h-8 rounded object-cover">
                <p class="font-bold text-2xl pl-2">e-PosAja</p>
            </div>
            <div class="text-base font-bold justify-start">
                <h2>
                    Welcome to Admin Dashboard !
                </h2>
            </div>
            <div
                class="mt-2 flex justify-start w-full px-3 py-4 border border-blue-500 rounded-md bg-blue-200 text-gray-800 text-sm font-medium">
                <h2>
                    Pilih menu bagian kiri untuk memulai aplikasi
                </h2>
            </div>
        </div>
    </div>
@endsection
