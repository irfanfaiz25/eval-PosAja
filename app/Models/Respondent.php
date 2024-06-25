<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Respondent extends Model
{
    use HasFactory;
    protected $fillable = [
        'respondent_code',
        'name',
        'gender',
        'question_id',
        'score_id'
    ];

    public function score(): BelongsTo
    {
        return $this->belongsTo(Score::class);
    }

    public function question(): BelongsTo
    {
        return $this->belongsTo(Question::class);
    }
}
