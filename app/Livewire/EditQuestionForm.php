<?php

namespace App\Livewire;

use App\Models\Question;
use App\Models\Variable;
use Livewire\Component;

class EditQuestionForm extends Component
{

    public $question_id;
    public $text;
    public $variable_id;
    public $variable;
    public $isNewVariable = false;


    public function mount($id)
    {
        $question = Question::findOrFail($id);

        $this->question_id = $id;
        $this->text = $question->text;
        $this->variable_id = $question->variable_id;
    }

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

    public function update()
    {
        $validated = $this->validate([
            'text' => 'required|min:5',
            'variable_id' => 'required'
        ], [
            'text.required' => 'Pertanyaan tidak boleh kosong',
            'text.min' => 'Pertanyaan harus lebih dari 5 karakter',
            'variable_id.required' => 'Variable tidak boleh kosong'
        ]);

        $question = Question::findOrFail($this->question_id);
        $question->text = $validated['text'];
        $question->variable_id = $validated['variable_id'];

        $question->save();

        return redirect()->to('/questions')->with('success', 'Data pertanyaan berhasil diupdate');
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
        return view('livewire.edit-question-form', [
            'variables' => Variable::all()
        ]);
    }
}
