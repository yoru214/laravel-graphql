<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Test;

class TestController extends Controller
{
    //
    public function list() {
        return response()->json(Test::all());
    }
}
