<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Score extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'value'
    ];

    public function respondents(): HasMany
    {
        return $this->hasMany(Respondent::class);
    }
}
