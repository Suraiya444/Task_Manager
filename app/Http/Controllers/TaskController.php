<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=Task::latest()->paginate(10);
        return view('backend.task.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.task.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(Task::create($request->all()))
            return redirect()->route( 'task.index');
        else
            return redirect()->back()->withInput()->with('error', 'Failed to create task');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        
            $task = Task::find($id);
            if (!$task) {
                return redirect()->route('task.index')->with('error', 'Task not found'); 
            }
            return view('backend.task.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        if($task->update($request->all()))
            return redirect()->route('task.index');
        else
            return redirect()->back()->withInput()->with('error', 'Failed to create task level');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->back();
    }
}
