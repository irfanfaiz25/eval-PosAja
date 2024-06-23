<div class="container mx-auto my-4 px-4">
    <div class="p-4 border rounded shadow">
        <h3 class="text-lg font-semibold mb-2">Grafik Skor Pertanyaan</h3>
        <canvas id="questionChart" class="chart"></canvas>
    </div>

    <div class="mt-5">
        <h2 class="text-lg font-bold text-center">
            Data Responden
        </h2>
        <div class="flex justify-end">
            <button wire:click='downloadPdf'
                class="flex text-sm font-medium bg-red-500 text-white hover:bg-red-700 px-4 py-1.5 rounded-sm">
                <i class="ri-file-download-line pr-1"></i>Download
            </button>
        </div>
        <div class="overflow-x-auto mt-4">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name
                        </th>
                        @foreach ($questions as $index => $question)
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                P{{ $index + 1 }}</th>
                        @endforeach
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200 text-xs">
                    @php
                        $num = 1;
                    @endphp
                    @foreach ($data as $respondentCode => $respondents)
                        @php
                            $respondent = $respondents->first(); // Get any respondent from the group for the name and code
                            $total = 0;
                        @endphp
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $num++ }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $respondent->name }}</td>
                            @foreach ($questions as $index => $question)
                                @php
                                    $score = $respondents->firstWhere('question_id', $question->id)->score->value ?? 0;
                                    $total += $score;
                                @endphp
                                <td class="px-6 py-4 whitespace-nowrap">{{ $score }}</td>
                            @endforeach
                            <td class="px-6 py-4 whitespace-nowrap font-bold">{{ $total }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>

@push('script')
    <script>
        const chartData = @json($chartsData);

        const ctx = document.getElementById('questionChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: chartData.labels,
                datasets: [{
                    label: 'Total Skor',
                    data: chartData.data,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endpush
