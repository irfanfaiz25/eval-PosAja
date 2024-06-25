<div class="container mx-auto my-4 px-4">
    <div class="p-4 border rounded shadow">
        <h3 class="text-lg font-semibold mb-2">Grafik Skor Pertanyaan</h3>
        <canvas id="questionChart" class="chart"></canvas>
    </div>

    <div class="mt-5">
        <h2 class="text-lg font-bold text-center">
            Data Responden
        </h2>
        @if (session('success'))
            <div id="alert-notification" class="mx-2 px-8 py-6 bg-green-500 text-white flex justify-between rounded">
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
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        @endif
        <div class="flex justify-end mt-3">
            <button wire:click='downloadPdf'
                class="flex text-sm font-medium bg-blue-500 text-white hover:bg-blue-700 px-4 py-1.5 rounded-sm">
                <i class="ri-file-download-line pr-1"></i>Download
            </button>
        </div>
        <div class="overflow-x-auto mt-4">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jenis
                            Kelamin
                        </th>
                        @foreach ($questions as $index => $question)
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                P{{ $index + 1 }}</th>
                        @endforeach
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
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
                            <td class="px-6 py-4 whitespace-nowrap">{{ $respondent->gender }}</td>
                            @foreach ($questions as $index => $question)
                                @php
                                    $score = $respondents->firstWhere('question_id', $question->id)->score->value ?? 0;
                                    $total += $score;
                                @endphp
                                <td class="px-6 py-4 whitespace-nowrap">{{ $score }}</td>
                            @endforeach
                            <td class="px-6 py-4 whitespace-nowrap font-bold">{{ $total }}</td>
                            <td class="px-6 py-4 whitespace-nowrap font-bold">
                                <button wire:click='deleteRespondent("{{ $respondent->respondent_code }}")'
                                    class="text-xs font-medium bg-red-500 text-white hover:bg-red-700 px-2 py-1.5 rounded-sm">
                                    <i class="ri-delete-bin-5-line"></i>
                                </button>
                            </td>
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
