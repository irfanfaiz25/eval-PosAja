<?php

namespace App\Livewire;

use App\Models\Question;
use Livewire\Component;

class ChartResults extends Component
{
    public $chartsData = [];


    public function mount()
    {
        $this->loadChartsData();
    }

    public function loadChartsData()
    {
        $scoreOrder = ['ss', 's', 'ks', 'ts'];

        $questions = Question::with(['respondents.score'])->get();

        foreach ($questions as $question) {
            $chartData = [
                'question' => $question->text,
                'total' => $question->respondents->count(),
                'labels' => [],
                'data' => []
            ];

            $scores = $question->respondents->groupBy('score.name');

            $sortedScores = collect($scoreOrder)->mapWithKeys(function ($scoreName) use ($scores) {
                return [$scoreName => $scores->get($scoreName, collect())];
            });

            foreach ($sortedScores as $scoreName => $respondents) {
                $chartData['labels'][] = $scoreName;
                $chartData['data'][] = $respondents->sum('score.value');
            }

            $this->chartsData[] = $chartData;
        }
    }

    public function render()
    {
        return view('livewire.chart-results');
    }
}
