<?php

namespace App\Http\Controllers;

use App\Task;

class TasksController extends Controller
{
    public function index()
    {
        $tasks = Task::all();

        //return $tasks;
        return view('tasks.index', compact('tasks'));
    }

    public function show(Task $task){

        return view('tasks.show', compact('task'));
    }
}
