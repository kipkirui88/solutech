<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        return Task::all();
    }

    public function store(Request $request)
    {
        $tasks = new Task;
        $tasks->name = $request->input('name');
         $tasks->save();
        return response()->json($tasks);
    }

    public function show($id)
    {
        $tasks = Task::find($id);
        return response()->json($tasks);
    }

    public function update(Request $request, $id)
    {
        $tasks = Task::find($id);
        $tasks->name = $request->input('name');
         $tasks->save();
        return response()->json($tasks);
    }

    public function destroy($id)
    {
        $tasks = Task::find($id);
        $tasks->delete();
        return response()->json(['message' => 'Task deleted']);
    }
}
