<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6 mb-6">
    <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
        <div class="flex justify-between mb-6">
            <div>
                <div class="text-2xl font-semibold mb-1">
                    {{ $question_total }}
                </div>
                <div class="text-sm font-medium text-gray-400">Total pertanyaan</div>
            </div>
        </div>
        <a href="{{ route('question.index') }}" class="text-blue-500 font-medium text-sm hover:text-blue-600">View
            details</a>
    </div>
    <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
        <div class="flex justify-between mb-6">
            <div>
                <div class="text-2xl font-semibold mb-1">
                    {{ $respondent_total }}
                </div>
                <div class="text-sm font-medium text-gray-400">Total responden</div>
            </div>
        </div>
        <a href="{{ route('result.index') }}" class="text-blue-500 font-medium text-sm hover:text-blue-600">View
            details</a>
    </div>
</div>
