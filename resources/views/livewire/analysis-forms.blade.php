<div class="mx-5 my-3">
    @if (session('success'))
        <div id="alert-notification" class="mx-4 px-5 py-6 bg-green-500 text-white flex justify-between rounded">
            <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="28" height="28"
                    fill="currentColor">
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
    <form wire:submit.prevent='submit'>
        <div>
            <label for="value_ks" class="block mb-1 text-sm font-semibold text-gray-900">
                Responden
            </label>
            <input wire:model='respondent_name' type="text" id="text"
                class="bg-gray-50 border border-gray-300 @error('respondent_name') border-red-600 @enderror text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-1.5"
                placeholder="Nama responden" />
            @error('respondent_name')
                <p class="mt-2 text-xs text-red-600">
                    {{ $message }}
                </p>
            @enderror
        </div>
        @foreach ($questions as $question)
            <h4 class="text-sm mt-4 mb-2 font-semibold text-gray-800">
                {{ $question->text }}
            </h4>
            <div class="flex flex-col md:flex-row md:flex-wrap md:space-x-16 lg:space-x-52 sm:space-y-2 md:space-y-0">
                @foreach ($scores as $score)
                    <div class="flex items-center text-sm">
                        <input wire:model='answers.{{ $question->id }}' type="radio" id="option1{{ $question->id }}"
                            class="mr-1" value="{{ $score->id }}">
                        <label for="option1{{ $question->id }}" class="mr-4 uppercase">{{ $score->name }}</label>
                    </div>
                @endforeach
            </div>
        @endforeach
        <div class="flex justify-end mt-4">
            <button type="submit"
                class="text-base font-medium bg-blue-500 hover:bg-blue-700 text-white px-4 py-1.5 rounded-sm">
                Submit
            </button>
        </div>
    </form>
</div>
