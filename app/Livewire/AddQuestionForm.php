<?php

namespace App\Livewire;

use App\Models\Question;
use App\Models\Variable;
use Livewire\Component;

class AddQuestionForm extends Component
{
    public $text;
    public $variable_id = '';
    public $variable;
    public $isNewVariable = false;


    public function updatedVariableId($value)
    {
        if ($value == 'new') {
            $this->setNewVariable();
        }
    }

    public function setNewVariable()
    {
        $this->isNewVariable = !$this->isNewVariable;
        $this->variable_id = '';
    }

    public function store()
    {
        $validated = $this->validate([
            'text' => 'required|min:5',
            'variable_id' => 'required'
        ], [
            'text.required' => 'Pertanyaan tidak boleh kosong',
            'text.min' => 'Pertanyaan harus lebih dari 5 karakter',
            'variable_id.required' => 'Variable tidak boleh kosong'
        ]);

        Question::create($validated);

        return redirect()->to('/questions')->with('success', 'Data pertanyaan berhasil ditambahkan');
    }

    public function storeVariable()
    {
        $validated = $this->validate([
            'variable' => 'required|min:3|unique:variables,name'
        ], [
            'variable.required' => 'Nama variable tidak boleh kosong',
            'variable.min' => 'Nama variable harus lebih dari 3 karakter'
        ]);

        Variable::create([
            'name' => $validated['variable']
        ]);

        return redirect()->to(route('question.add'));
    }

    public function render()
    {
        return view('livewire.add-question-form', [
            'variables' => Variable::all()
        ]);
    }
}
