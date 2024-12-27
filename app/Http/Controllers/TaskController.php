<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Task::query();

        // Filter by status if provided
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Sort by finish date if provided
        if ($request->filled('sort_by') && $request->sort_by === 'due_date') {
            $query->orderBy('finish_date', $request->order ?? 'asc');
        }

        // Default sorting by latest creation date
        $data = $query->latest()->paginate(10);

        return view('backend.task.index', compact('data'));
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
        $request->validate([
            'name' => 'required|string|max:255',
            'task' => 'required|string|max:255',
            'assign_date' => 'required|date',
            'status' => 'required|in:Pending,In Progress,Completed',
        ]);

        // If status is 'Completed', finish_date should not be required at creation
        if ($request->status === 'Completed') {
            $request->validate([
                'finish_date' => 'required|date|after_or_equal:assign_date',
            ]);
        }

        // Create the task
        $task = Task::create($request->all());

        if ($task) {
            return redirect()->route('task.index');
        } else {
            return redirect()->back()->withInput()->with('error', 'Failed to create task');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        return view('backend.task.show', compact('task'));
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
        $request->validate([
            'name' => 'required|string|max:255',
            'task' => 'required|string|max:255',
            'assign_date' => 'required|date',
            'status' => 'required|in:Pending,In Progress,Completed',
        ]);

        // If status is 'Completed', finish_date should be validated
        if ($request->status === 'Completed') {
            $request->validate([
                'finish_date' => 'required|date|after_or_equal:assign_date',
            ]);
        } else {
            // If task is not completed, finish_date should be nullable
            $request->validate([
                'finish_date' => 'nullable|date|after_or_equal:assign_date',
            ]);
        }

        // Update the task
        if ($task->update($request->all())) {
            return redirect()->route('task.index');
        } else {
            return redirect()->back()->withInput()->with('error', 'Failed to update task');
        }
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
