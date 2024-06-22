<div>
    @foreach ($category->questions as $question)
        <h4 class="text-lg mt-3 font-medium text-gray-800">
            <li>{{ $question->text }}</li>
        </h4>
        <div class="flex flex-col md:flex-row md:flex-wrap md:space-x-4 space-y-2 md:space-y-0">
            <div class="flex items-center">
                <input wire:model='answers.{{ $question->id }}' type="radio" id="option1{{ $question->id }}"
                    class="mr-1" value="sangat tidak {{ $question->answer_option }}">
                <label for="option1{{ $question->id }}" class="mr-4">sangat tidak
                    {{ $question->answer_option }}</label>
            </div>
            <div class="flex items-center">
                <input wire:model='answers.{{ $question->id }}' type="radio" id="option2{{ $question->id }}"
                    class="mr-1" value="tidak {{ $question->answer_option }}">
                <label for="option2{{ $question->id }}" class="mr-4">tidak
                    {{ $question->answer_option }}</label>
            </div>
            <div class="flex items-center">
                <input wire:model='answers.{{ $question->id }}' type="radio" id="option3{{ $question->id }}"
                    class="mr-1" value="ragu-ragu">
                <label for="option3{{ $question->id }}" class="mr-4">ragu-ragu</label>
            </div>
            <div class="flex items-center">
                <input wire:model='answers.{{ $question->id }}' type="radio" id="option4{{ $question->id }}"
                    class="mr-1" value="{{ $question->answer_option }}">
                <label for="option4{{ $question->id }}" class="mr-4">{{ $question->answer_option }}</label>
            </div>
            <div class="flex items-center">
                <input wire:model='answers.{{ $question->id }}' type="radio" id="option5{{ $question->id }}"
                    class="mr-1" value="sangat {{ $question->answer_option }}">
                <label for="option5{{ $question->id }}" class="mr-4">sangat
                    {{ $question->answer_option }}</label>
            </div>
        </div>
    @endforeach
</div>
