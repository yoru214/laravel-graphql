<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Question;

class Answers extends Model
{
    use HasFactory;
    public function Question()
    {
        return $this->hasOne(Question::class);
    }
}
