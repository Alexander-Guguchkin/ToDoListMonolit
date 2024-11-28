<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;
class TaskManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::all();
        return Inertia::render('Dashboard/Dashboard', ['data'=>$tasks], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'=>'string|required|max:255',
            'description' =>'string|nullable',
            'status' => 'boolean|nullable',
            'priority' => 'integer|nullable'
        ]);
        $task = Task::create($validated);
        return Redirect::route('dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $task = Task::find($id);
        return Inertia::render('Dashboard/Dashboard', ['data'=>$task], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'title'=>'string|required|max:255',
            'description' =>'string|nullable',
            'status' => 'boolean|nullable',
            'priority' => 'integer|nullable'
        ]);
        $task = Task::find($id);
        $task->update($validated);
        return Redirect::route('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $task = Task::find($id);
        $task->delete();
        return Redirect::route('dashboard');
    }
}
