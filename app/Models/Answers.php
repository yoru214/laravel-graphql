<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Question;

class Answers extends Model
{
    use HasFactory;
    public function Question()
    {
        return $this->hasOne(Question::class);
    }
}
