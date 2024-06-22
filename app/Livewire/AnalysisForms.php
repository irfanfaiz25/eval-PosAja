<?php

namespace App\Livewire;

use App\Models\Question;
use App\Models\Respondent;
use App\Models\Score;
use Livewire\Component;
use illuminate\Support\Str;

class AnalysisForms extends Component
{
    public $respondent_name;
    public $answers = [];

    public function updated($questionId, $value)
    {
        $this->answers[$questionId] = $value;
    }

    public function submit()
    {
        $this->validate([
            'respondent_name' => 'required',
        ], [
            'required' => 'Nama responden tidak boleh kosong'
        ]);

        $questionIds = array_keys(array_filter($this->answers, function ($key) {
            return is_numeric($key);
        }, ARRAY_FILTER_USE_KEY));

        $answers = array_intersect_key($this->answers, array_flip($questionIds));
        $respondentName = $this->answers['respondent_name'];

        $uniqueCode = $this->generateUniqueCode();

        foreach ($questionIds as $questionId) {
            Respondent::create([
                'respondent_code' => $uniqueCode,
                'name' => $respondentName,
                'question_id' => $questionId,
                'score_id' => $answers[$questionId],
            ]);
        }

        $this->reset('respondent_name');
        $this->answers = [];

        session()->flash('success', 'Analisa berhasil disubmit');
    }

    public function resetForm()
    {
        $this->reset('respondent_name');
        $this->answers = [];
    }

    public function generateUniqueCode()
    {
        $uniqueCode = Str::random(20);

        while (Respondent::where('respondent_code', $uniqueCode)->exists()) {
            $uniqueCode = Str::random(20);
        }

        return $uniqueCode;
    }

    public function render()
    {
        $questions = Question::all();
        $scores = Score::all();
        return view('livewire.analysis-forms', [
            'questions' => $questions,
            'scores' => $scores
        ]);
    }
}
