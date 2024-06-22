@extends('layouts.main')

@section('content')
    @if (session('success'))
        <div id="alert-notification" class="mb-3 px-8 py-6 bg-green-500 text-white flex justify-between rounded">
            <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="28" height="28" fill="currentColor">
                    <path
                        d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM12 20C16.4183 20 20 16.4183 20 12C20 7.58172 16.4183 4 12 4C7.58172 4 4 7.58172 4 12C4 16.4183 7.58172 20 12 20ZM11.0026 16L6.75999 11.7574L8.17421 10.3431L11.0026 13.1716L16.6595 7.51472L18.0737 8.92893L11.0026 16Z">
                    </path>
                </svg>
                <p class="pl-3">{{ session('success') }}</p>
            </div>
            <button onclick="hideAlert()" class="text-green-100 hover:text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    @endif

    <div class="w-full bg-white border border-gray-200 rounded-lg shadow">
        <div
            class="flex flex-wrap justify-between items-center text-base font-medium text-center border-b border-gray-200 rounded-t-lg bg-gray-50 py-4 px-3">
            <h2 class="font-medium text-blue-500">
                Analisa
            </h2>
        </div>

        @livewire('analysis-forms')

    </div>
@endsection
