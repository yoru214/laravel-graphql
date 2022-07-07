<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Question;
use Orchid\Screen\AsSource;

class Test extends Model
{
    use HasFactory;    
    use AsSource;

    public function Questions()
    {
        return $this->hasMany(Question::class);
    }
}
