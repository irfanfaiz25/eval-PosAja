<?php

use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    return view('contents.dashboard');
});

Route::get('/questions', function () {
    return view('contents.questions');
})->name('question.index');

Route::get('/questions/add', function () {
    return view('contents.add-question');
})->name('question.add');

Route::get('/questions/{id}/edit', function ($id) {
    return view('contents.edit-question', [
        'id' => $id
    ]);
})->name('question.edit');

Route::get('/scores', function () {
    return view('contents.scores');
})->name('score.index');