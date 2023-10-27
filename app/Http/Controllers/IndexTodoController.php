<?php

namespace App\Http\Controllers;

use App\Models\Todo;

class IndexTodoController extends Controller
{
    public function __invoke()
    {
        return Todo::all();
    }
}
