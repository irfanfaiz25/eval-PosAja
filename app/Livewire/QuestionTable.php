<?php

namespace App\Livewire;

use App\Models\Question;
use Livewire\Component;
use Livewire\WithPagination;

class QuestionTable extends Component
{
    use WithPagination;

    public $search;
    public $showDeleteModal = false;
    public $questionToDelete;

    protected $listeners = ['deleteConfirmed' => 'deleteQuestion'];


    public function confirmDelete($question_id)
    {
        $this->questionToDelete = $question_id;
        $this->showDeleteModal = true;
    }

    public function deleteQuestion()
    {
        $question = Question::find($this->questionToDelete);

        if ($question) {
            $question->delete();
        }

        $this->showDeleteModal = false;
        $this->questionToDelete = null;

        session()->flash('success', 'Data pertanyaan berhasil dihapus');
    }

    public function render()
    {
        $questions = Question::where('text', 'like', '%' . $this->search . '%')->with('variable')->latest()->paginate(5);

        return view('livewire.question-table', [
            'questions' => $questions
        ]);
    }
}
