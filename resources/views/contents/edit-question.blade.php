@extends('layouts.main')

@section('content')
    <div class="md:flex md:justify-center">
        <div class="sm:w-full md:w-1/2 bg-white border border-gray-200 rounded-lg shadow">
            <div
                class="flex flex-wrap justify-between items-center text-base font-medium text-center border-b border-gray-200 rounded-t-lg bg-gray-50 py-4 px-3">
                <h2 class="font-medium text-blue-500">
                    Edit Data Pertanyaan
                </h2>
            </div>

            @livewire('edit-question-form', ['id' => $id], key($id))

        </div>
    </div>
@endsection
