<?php

namespace App\Livewire;

use Livewire\Component;

class AnalysisForms extends Component
{
    public $answers = [];

    public function render()
    {
        return view('livewire.analysis-forms');
    }
}
