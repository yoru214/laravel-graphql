<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Answers;
use App\Test;

class Question extends Model
{
    use HasFactory;
    public function Answers()
    {
        return $this->hasMany(Answers::class);
    }
    
    public function Test()
    {
        return $this->hasOne(Test::class);
    }
}
