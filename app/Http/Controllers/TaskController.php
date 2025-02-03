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
        $tasks = Task::all();
        return view('index', compact('tasks'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required|max:255',
            'is_completed' => 'nullable|boolean',
        ]);

        Task::create([
            'description' => $request->description,
            'is_completed' => $request->has('is_completed') ? 1 : 0,
        ]);

        return redirect()->route('index')
            ->with('success', 'Task created successfully.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $task = Task::find($id);
        $task->update($request->all());

        return redirect()->route('index')
            ->with('success', 'Task updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();

        return redirect()->route('index')
            ->with('success', 'Task deleted successfully.');
    }
}
