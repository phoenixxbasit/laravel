<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\User;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("tasks/index", [
            'tasks' => Task::latest()->paginate(4)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("tasks/create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request)
    {
        $formfields = $request->validate([
            "Title" => ["required","min:6"],
            "Description" => 'required|min:6',
        ]);

        $formfields["Completed"] = 0;
        $formfields["user_id"] = 2;
        
        $Task = Task::create($formfields);
        return redirect('/')->with('message', 'Tasks created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        return Task::find($task);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        return view("tasks/edit", ['task' => $task]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        //
    }
}
