<?php

namespace App\Livewire;

use App\Models\Question;
use App\Models\Respondent;
use App\Models\Score;
use Livewire\Component;

class AnalysisTable extends Component
{

    public $analysisResults = [];

    public function mount()
    {
        $this->analysisResults = $this->analyzeResults();
    }

    public function analyzeResults()
    {
        $results = [];
        $questions = Question::with('variable')->get()->sortBy('variable.name');

        $variableScores = [];

        foreach ($questions as $question) {
            // $totalScore = Respondent::where('question_id', $question->id)->sum('score.value');
            $totalScore = $question->respondents->sum('score.value');

            if (!isset($variableScores[$question->variable->name])) {
                $variableScores[$question->variable->name] = [
                    'variable' => $question->variable->name,
                    'total_score' => 0,
                    'question_count' => 0,
                    'questions' => []
                ];
            }

            $variableScores[$question->variable->name]['total_score'] += $totalScore;
            $variableScores[$question->variable->name]['question_count']++;
            $variableScores[$question->variable->name]['questions'][] = $question->text;
        }

        $questionTotal = Question::count();

        foreach ($variableScores as $variableScore) {
            $averageScore = round($variableScore['total_score'] / $questionTotal, 2);
            $variableScore['average_score'] = $averageScore;
            $variableName = strtolower($variableScore['variable']);

            if ($variableName == 'usable') {
                $scoreCategory = $averageScore >= 3.98 ? 'baik' : 'buruk';
                $variableScore['category_score'] = $scoreCategory;
            } else {
                $scoreCategory = $averageScore >= 4.19 ? 'baik' : 'buruk';
                $variableScore['category_score'] = $scoreCategory;
            }

            $results[] = $variableScore;
        }

        return $results;
    }

    public function getCategory($averageScore, $variableName)
    {
        $totalValue = Score::sum('value');
        // dd($totalValue * 4.19 / 100);
        if ($averageScore < $totalValue * 30 / 100) {
            return 'buruk';
        } elseif ($averageScore < $totalValue * 90 / 100) {
            return 'bagus';
        } else {
            return 'sangat bagus';
        }
    }

    public function render()
    {
        return view('livewire.analysis-table');
    }
}
