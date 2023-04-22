<?php

namespace App\Http\Controllers;

use App\Models\UserTask;
use Illuminate\Http\Request;

class UserTaskController extends Controller
{
    public function index()
    {
        return UserTask::all();
    }

    public function store(Request $request)
    {
        $user_task = new UserTask;
        $user_task->name = $request->input('name');
         $user_task->save();
        return response()->json($user_task);
    }

    public function show($id)
    {
        $user_task = UserTask::find($id);
        return response()->json($user_task);
    }

    public function update(Request $request, $id)
    {
        $user_task = UserTask::find($id);
        $user_task->name = $request->input('name');
         $user_task->save();
        return response()->json($user_task);
    }

    public function destroy($id)
    {
        $user_task = UserTask::find($id);
        $user_task->delete();
        return response()->json(['message' => 'UserTask deleted']);
    }
}
