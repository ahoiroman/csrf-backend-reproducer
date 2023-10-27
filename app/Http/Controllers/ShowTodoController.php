<?php

namespace App\Http\Controllers;

use App\Models\Todo;

class ShowTodoController extends Controller
{
    public function __invoke(Todo $todo)
    {
        return $todo;
    }
}
