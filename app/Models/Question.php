<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Question extends Model
{
    use HasFactory;
    protected $fillable = [
        'text',
        'variable_id'
    ];

    public function variable(): BelongsTo
    {
        return $this->belongsTo(Variable::class);
    }
}
