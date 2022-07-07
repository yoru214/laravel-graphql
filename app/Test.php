<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Question;

class Test extends Model
{
    use HasFactory;
    public function Questions()
    {
        return $this->hasMany(Question::class);
    }
}
