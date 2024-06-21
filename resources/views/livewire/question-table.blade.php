<div class="p-4 bg-white rounded-lg md:p-8">
    <form action="" class="flex items-center mb-4">
        <div class="relative w-full md:w-28">
            <input wire:model.live.debounce.300ms='search' type="text"
                class="py-2 pr-4 pl-10 bg-gray-100 text-gray-500 w-full outline-none border border-gray-100 rounded-md text-sm focus:border-blue-500"
                placeholder="Search...">
            <i class="ri-search-line absolute top-1/2 left-4 -translate-y-1/2 text-gray-400"></i>
        </div>
    </form>
    <div class="overflow-x-auto">
        <table class="w-full min-w-[540px]">
            <thead>
                <tr>
                    <th
                        class="text-[12px] uppercase tracking-wide font-medium text-gray-500 py-2 px-4 bg-gray-100 text-left rounded-tl-md rounded-bl-md">
                        NO</th>
                    <th
                        class="text-[12px] uppercase tracking-wide font-medium text-gray-500 py-2 px-4 bg-gray-100 text-left">
                        PERTANYAAN</th>
                    <th
                        class="text-[12px] uppercase tracking-wide font-medium text-gray-500 py-2 px-4 bg-gray-100 text-left">
                        VARIABLE</th>
                    <th
                        class="text-[12px] uppercase tracking-wide font-medium text-gray-500 py-2 px-4 bg-gray-100 text-center rounded-tr-md rounded-br-md">
                        AKSI
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($questions as $index => $question)
                    <tr>
                        <td class="py-2 px-4 border-b border-b-gray-50">
                            <span
                                class="text-[13px] font-medium text-gray-700">{{ $questions->firstItem() + $index }}</span>
                        </td>
                        <td class="py-2 px-4 border-b border-b-gray-50">
                            <span class="text-[13px] font-medium text-gray-700">{{ $question->text }}</span>
                        </td>
                        <td class="py-2 px-4 border-b border-b-gray-50">
                            <span
                                class="text-[13px] font-medium text-gray-700 capitalize">{{ $question->variable ? $question->variable->name : 'null' }}</span>
                        </td>
                        <td class="py-2 px-4 border-b border-b-gray-50">
                            <div class="flex justify-center items-center space-x-1">
                                <a href="{{ route('question.edit', $question->id) }}"
                                    class="px-4 py-1.5 text-xs bg-yellow-400 text-gray-700 rounded-sm">Edit</a>
                                <button wire:click='confirmDelete({{ $question->id }})'
                                    class="px-4 py-1.5 text-xs bg-red-500 text-white rounded-sm">Hapus</button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4">
            {{ $questions->links() }}
        </div>

    </div>
    @if ($showDeleteModal)
        <div class="fixed inset-0 flex items-center justify-center z-50">
            <div class="bg-white p-6 rounded shadow-lg max-w-sm w-full relative z-10 mx-2 lg:mx-0">
                <h2 class="text-lg font-bold mb-4">Konfirmasi Hapus</h2>
                <p>Anda yakin akan menghapus pertanyaan ini?</p>
                <div class="mt-4 flex justify-end space-x-2">
                    <button wire:click="$set('showDeleteModal', false)"
                        class="px-4 py-1.5 bg-gray-300 rounded text-sm font-medium">Cancel</button>
                    <button wire:click="$dispatch('deleteConfirmed')"
                        class="px-4 py-1.5 bg-red-500 text-white rounded text-sm font-medium">Hapus</button>
                </div>
            </div>
            <!-- Background overlay -->
            <div class="fixed inset-0 bg-black opacity-50 z-0"></div>
        </div>
    @endif
</div>
