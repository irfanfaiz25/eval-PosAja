<?php

namespace App\Livewire;

use App\Models\Question;
use App\Models\Respondent;
use App\Models\Score;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Support\Facades\View;
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
        $questions = Question::with(['respondents.score'])->get();

        $labels = [];
        $data = [];

        foreach ($questions as $index => $question) {
            $alias = 'P' . ($index + 1);
            $labels[] = $alias;

            // Sum the score values of all respondents for this question
            $totalScore = $question->respondents->sum(function ($respondent) {
                return $respondent->score->value;
            });

            $data[] = $totalScore;
        }

        $this->chartsData = [
            'labels' => $labels,
            'data' => $data
        ];
    }

    public function downloadPdf()
    {
        // Ensure DOMPDF options are set correctly
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);

        // Create a new DOMPDF instance
        $dompdf = new Dompdf($options);

        $questions = Question::all();
        $data = Respondent::with(['question', 'score'])
            ->get()
            ->groupBy('respondent_code');

        $possibleScores = ['ss', 's', 'n', 'ks', 'ts'];

        $questionsData = [];

        // Process each question
        foreach ($questions as $question) {
            // Fetch respondents' data grouped by score name
            $questionScores = Respondent::where('question_id', $question->id)
                ->with('score')
                ->get()
                ->groupBy('score.name');

            // Initialize counts for all possible scores
            $scoreCounts = array_fill_keys($possibleScores, 0);

            // Populate the counts from the actual data
            foreach ($questionScores as $scoreName => $respondents) {
                $scoreCounts[$scoreName] = $respondents->count();
            }

            // Calculate the total score
            $totalScore = $questionScores->sum(fn($group) => $group->sum(fn($respondent) => $respondent->score->value));

            $questionsData[] = array_merge(
                ['question' => $question->text],
                $scoreCounts,
                ['total' => $totalScore]
            );
        }

        // Load the HTML from a view
        $html = View::make('pdf.score-report', [
            'data' => $data,
            'questions' => $questions,
            'questionsData' => $questionsData,
            'scores' => $possibleScores
        ])->render();

        // Load HTML to DOMPDF
        $dompdf->loadHtml($html);

        // Set paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // Render the PDF
        $dompdf->render();

        // Output the PDF to the browser
        return response()->streamDownload(
            function () use ($dompdf) {
                echo $dompdf->output();
            },
            'e-PosAja_Report.pdf'
        );
    }

    public function deleteRespondent($respondent_code)
    {
        $respondent = Respondent::where('respondent_code', $respondent_code);

        $respondent->delete();

        session()->flash('success', 'Data responden berhasil di hapus');
    }

    public function render()
    {
        $questions = Question::all();
        $data = Respondent::with(['question', 'score'])
            ->get()
            ->groupBy('respondent_code');

        return view('livewire.chart-results', [
            'questions' => $questions,
            'data' => $data,
        ]);
    }
}
