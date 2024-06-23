@extends('layouts.main')

@section('content')
    <div class="w-full bg-white border border-gray-200 rounded-lg shadow">
        <div
            class="flex flex-wrap justify-between items-center text-base font-medium text-center border-b border-gray-200 rounded-t-lg bg-gray-50 py-4 px-3">
            <h2 class="font-medium text-blue-500">
                Hasil
            </h2>
        </div>

        @livewire('chart-results')

    </div>
@endsection
