<?php

namespace App\Livewire;

use App\Models\Question;
use App\Models\Respondent;
use App\Models\Score;
use Livewire\Component;
use illuminate\Support\Str;

class QuissionaireForms extends Component
{
    public $respondent_name;
    public $gender;
    public $answers = [];

    public function updated($questionId, $value)
    {
        $this->answers[$questionId] = $value;
    }

    public function submit()
    {
        $this->validate([
            'respondent_name' => 'required',
            'gender' => 'required',
        ], [
            'respondent_name.required' => 'Nama responden harus diisi',
            'gender.required' => 'Jenis kelamin harus di pilih'
        ]);

        $questionIds = array_keys(array_filter($this->answers, function ($key) {
            return is_numeric($key);
        }, ARRAY_FILTER_USE_KEY));

        $answers = array_intersect_key($this->answers, array_flip($questionIds));
        $respondentName = $this->answers['respondent_name'];
        $gender = $this->answers['gender'];

        $uniqueCode = $this->generateUniqueCode();

        foreach ($questionIds as $questionId) {
            Respondent::create([
                'respondent_code' => $uniqueCode,
                'name' => $respondentName,
                'gender' => $gender,
                'question_id' => $questionId,
                'score_id' => $answers[$questionId],
            ]);
        }

        $this->reset('respondent_name');
        $this->reset('gender');
        $this->answers = [];

        session()->flash('success', 'Analisa berhasil disubmit');
    }

    public function resetForm()
    {
        $this->reset('respondent_name');
        $this->reset('gender');
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
        return view('livewire.quissionaire-forms', [
            'questions' => $questions,
            'scores' => $scores
        ]);
    }
}
