<div class="container mx-auto my-4 px-4">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        @foreach ($chartsData as $index => $chart)
            <div class="p-4 border rounded shadow">
                <h3 class="text-lg font-semibold mb-2">{{ $chart['question'] }}</h3>
                <p class="text-sm text-gray-600 mb-2">Total Respondents: {{ $chart['total'] }}</p>
                <canvas id="chart{{ $index }}" class="chart"></canvas>
            </div>
        @endforeach
    </div>
</div>

@push('script')
    <script>
        const chartsData = @json($chartsData);

        chartsData.forEach((chart, index) => {
            const ctx = document.getElementById('chart' + index);
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: chart.labels,
                    datasets: [{
                        label: '% of Votes',
                        data: chart.data,
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
        });
    </script>
@endpush
