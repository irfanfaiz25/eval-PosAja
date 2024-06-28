<div class="mx-2 my-3">

    <form wire:submit.prevent='updateScore'>
        <div class="grid grid-cols-5 gap-4">
            <div>
                <label for="value_ss" class="block mb-1 text-sm font-medium text-gray-900">
                    SS
                </label>
                <input wire:model='value_ss' type="text" id="value_ss"
                    class="bg-gray-50 border border-gray-300 @error('value_ss') border-red-600 @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2" />
                @error('value_ss')
                    <p class="mt-2 text-xs text-red-600">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div>
                <label for="value_s" class="block mb-1 text-sm font-medium text-gray-900">
                    S
                </label>
                <input wire:model='value_s' type="text" id="value_s"
                    class="bg-gray-50 border border-gray-300 @error('value_s') border-red-600 @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2" />
                @error('value_s')
                    <p class="mt-2 text-xs text-red-600">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div>
                <label for="value_n" class="block mb-1 text-sm font-medium text-gray-900">
                    N
                </label>
                <input wire:model='value_n' type="text" id="value_n"
                    class="bg-gray-50 border border-gray-300 @error('value_n') border-red-600 @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2" />
                @error('value_n')
                    <p class="mt-2 text-xs text-red-600">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div>
                <label for="value_ks" class="block mb-1 text-sm font-medium text-gray-900">
                    KS
                </label>
                <input wire:model='value_ks' type="text" id="value_ks"
                    class="bg-gray-50 border border-gray-300 @error('value_ks') border-red-600 @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2" />
                @error('value_ks')
                    <p class="mt-2 text-xs text-red-600">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div>
                <label for="value_ts" class="block mb-1 text-sm font-medium text-gray-900">
                    TS
                </label>
                <input wire:model='value_ts' type="text" id="value_ts"
                    class="bg-gray-50 border border-gray-300 @error('value_ts') border-red-600 @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2" />
                @error('value_ts')
                    <p class="mt-2 text-xs text-red-600">
                        {{ $message }}
                    </p>
                @enderror
            </div>
        </div>
        <div class="flex justify-end mt-3 space-x-1">
            <button wire:click='resetForms' type="button"
                class="text-sm font-medium bg-gray-300 text-gray-800 hover:bg-gray-500 hover:text-gray-50 px-4 py-1.5 rounded-sm">
                Reset
            </button>
            <button type="submit"
                class="text-sm font-medium bg-blue-500 text-white hover:bg-blue-700 px-4 py-1.5 rounded-sm">
                Simpan
            </button>
        </div>
    </form>
</div>
