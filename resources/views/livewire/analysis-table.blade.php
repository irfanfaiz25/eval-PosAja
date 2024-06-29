<div class="overflow-x-auto m-4">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    No
                </th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Pertanyaan
                </th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Variable
                </th>
                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Total Skor
                </th>
                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                    AVG Skor (%)
                </th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Analisa
                </th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200 text-xs">
            @php
                $no = 1;
            @endphp
            @foreach ($analysisResults as $index => $result)
                <tr>
                    <td class="px-6 py-3 whitespace-nowrap">{{ $no++ }}</td>
                    <td class="px-6 py-3 whitespace-nowrap">
                        <ul class="list-disc space-y-1">
                            @foreach ($result['questions'] as $question)
                                <li>{{ $question }}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td class="px-6 py-3 whitespace-nowrap">
                        {{ $result['variable'] }}
                    </td>
                    <td class="px-6 py-3 whitespace-nowrap text-center">
                        {{ $result['total_score'] }}
                    </td>
                    <td class="px-6 py-3 whitespace-nowrap text-center">
                        {{ $result['average_score'] }}
                    </td>
                    <td class="px-6 py-3 whitespace-nowrap font-medium text-center space-y-2">
                        @if ($result['category_score'] === 'buruk')
                            <p class="text-red-500 capitalize">{{ $result['category_score'] }}</p>
                            <div class="w-full bg-gray-200 rounded-full h-2.5">
                                <div class="bg-red-500 h-2.5 rounded-full" style="width: 30%"></div>
                            </div>
                        @else
                            <p class="text-green-500 capitalize">{{ $result['category_score'] }}</p>
                            <div class="w-full bg-gray-200 rounded-full h-2.5">
                                <div class="bg-green-500 h-2.5 rounded-full" style="width: 100%"></div>
                            </div>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
