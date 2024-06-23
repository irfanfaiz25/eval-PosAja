<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function respondents(): HasMany
    {
        return $this->hasMany(Respondent::class);
    }
}
