<div class="mx-6 my-4">

    <form wire:submit.prevent='store'>
        <div class="grid gap-6 mb-6 w-full md:w-32">
            <div>
                <label for="text" class="block mb-2 text-sm font-medium text-gray-900">
                    Pertanyaan
                </label>
                <textarea wire:model='text' type="text" id="text" rows="4"
                    class="bg-gray-50 border border-gray-300 
                    @error('text')
                    border-red-600    
                    @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2"
                    placeholder="Masukkan pertanyaan"></textarea>
                @error('text')
                    <p class="mt-2 text-xs text-red-600">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div>
                <label for="variable_id" class="block mb-2 text-sm font-medium text-gray-900">
                    Variable
                </label>
                <select wire:model.live='variable_id' id="variable_id"
                    class="bg-gray-50 border border-gray-300 
                    @error('variable_id')
                    border-red-600    
                    @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 capitalize">
                    <option value="" selected>--pilih variable--</option>
                    <option value="new">--tambah variable--</option>
                    @foreach ($variables as $variable)
                        <option value="{{ $variable->id }}">{{ $variable->name }}</option>
                    @endforeach
                </select>
                @error('variable_id')
                    <p class="mt-2 text-xs text-red-600 dark:text-red-500">
                        {{ $message }}
                    </p>
                @enderror
            </div>
        </div>
        <div class="flex justify-end space-x-1">
            <a href="{{ route('question.index') }}"
                class="bg-gray-300 hover:bg-gray-500 hover:text-white focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm sm:w-auto px-5 py-2 text-center">
                Cancel</a>
            <button type="submit"
                class="text-white bg-blue-500 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm sm:w-auto px-5 py-2 text-center">Submit</button>
        </div>
    </form>

    @if ($isNewVariable)
        <div class="fixed inset-0 flex items-center justify-center z-50">
            <div class="bg-white p-6 rounded shadow-lg max-w-sm w-full relative z-10 max-h-full overflow-y-auto">
                <form wire:submit.prevent='storeVariable'>
                    <div>
                        <label for="variable" class="block mb-2 text-sm font-medium text-gray-900">
                            Nama Variable
                        </label>
                        <input wire:model='variable' type="text" id="text"
                            class="bg-gray-50 border border-gray-300 
            @error('variable')
            border-red-600    
            @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2"
                            placeholder="Masukkan nama variable baru" />
                        @error('variable')
                            <p class="mt-2 text-xs text-red-600">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="mt-4 flex justify-end space-x-2">
                        <button type="button" wire:click="$set('isNewVariable', false)"
                            class="px-4 py-1.5 bg-gray-300 hover:bg-gray-500 hover:text-white rounded text-sm font-medium">Cancel</button>
                        <button type="submit"
                            class="px-4 py-1.5 bg-blue-500 hover:bg-blue-700 text-white rounded text-sm font-medium">Tambah</button>
                    </div>
                </form>
                <h2 class="text-sm font-medium text-gray-800 text-center mb-1 mt-3">List Variable</h2>
                @foreach ($variables as $variable)
                    <div class="flex justify-between items-center bg-gray-100 w-full px-2 py-1 mb-1 rounded-md">
                        <h2 class="text-sm text-gray-800 font-medium">
                            {{ $variable->name }}
                        </h2>
                        <button wire:click='deleteVariable({{ $variable->id }})'
                            class="bg-none text-red-500 hover:text-red-700 text-sm p-1 rounded-sm">
                            <i class="ri-delete-bin-6-line"></i>
                        </button>
                    </div>
                @endforeach
            </div>
            <!-- Background overlay -->
            <div wire:click="$set('isNewVariable', false)" class="fixed inset-0 bg-black opacity-50 z-0"></div>
        </div>
    @endif

</div>
