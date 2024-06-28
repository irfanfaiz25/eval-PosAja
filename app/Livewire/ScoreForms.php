<?php

namespace App\Livewire;

use App\Models\Score;
use Livewire\Component;

class ScoreForms extends Component
{
    public $value_ss;
    public $value_s;
    public $value_n;
    public $value_ks;
    public $value_ts;

    public function mount()
    {
        $scores = Score::all();
        $this->value_ss = $scores->where('name', 'ss')->pluck('value')->first();
        $this->value_s = $scores->where('name', 's')->pluck('value')->first();
        $this->value_n = $scores->where('name', 'n')->pluck('value')->first();
        $this->value_ks = $scores->where('name', 'ks')->pluck('value')->first();
        $this->value_ts = $scores->where('name', 'ts')->pluck('value')->first();
    }

    public function resetForms()
    {
        $scores = Score::all();
        $this->value_ss = $scores->where('name', 'ss')->pluck('value')->first();
        $this->value_s = $scores->where('name', 's')->pluck('value')->first();
        $this->value_n = $scores->where('name', 'n')->pluck('value')->first();
        $this->value_ks = $scores->where('name', 'ks')->pluck('value')->first();
        $this->value_ts = $scores->where('name', 'ts')->pluck('value')->first();
    }

    public function updateScore()
    {
        $validated = $this->validate([
            'value_ss' => 'required|integer|gt:0',
            'value_s' => 'required|integer|gt:0',
            'value_n' => 'required|integer|gt:0',
            'value_ks' => 'required|integer|gt:0',
            'value_ts' => 'required|integer|gt:0',
        ], [
            'required' => 'Skor tidak boleh kosong',
            'gt' => 'Skor harus lebih dari 0',
            'integer' => 'Skor harus berisi angka'
        ]);

        Score::where('name', 'ss')->update(['value' => $validated['value_ss']]);
        Score::where('name', 's')->update(['value' => $validated['value_s']]);
        Score::where('name', 'n')->update(['value' => $validated['value_n']]);
        Score::where('name', 'ks')->update(['value' => $validated['value_ks']]);
        Score::where('name', 'ts')->update(['value' => $validated['value_ts']]);

        return redirect()->to(route('score.index'))->with('success', 'Skor berhasil diupdate');
    }

    public function render()
    {
        return view('livewire.score-forms');
    }
}
