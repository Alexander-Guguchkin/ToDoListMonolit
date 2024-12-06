<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;
class TaskManagerController extends Controller
{

    public function index()
    {
        $tasks = Task::all();
        return Inertia::render('Dashboard/Dashboard', ['data'=>$tasks], 200);
    }

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

    public function show(string $id)
    {
        $task = Task::find($id);
        return response()->json($task);
    }

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

    public function destroy(string $id)
    {
        $task = Task::find($id);
        $task->delete();
        return Redirect::route('dashboard');
    }
}
