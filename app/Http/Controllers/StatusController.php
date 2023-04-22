<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function index()
    {
        return Status::all();
    }

    public function store(Request $request)
    {
        $status = new Status;
        $status->name = $request->input('name');
         $status->save();
        return response()->json($status);
    }

    public function show($id)
    {
        $status = Status::find($id);
        return response()->json($status);
    }

    public function update(Request $request, $id)
    {
        $status = Status::find($id);
        $status->name = $request->input('name');
         $status->save();
        return response()->json($status);
    }

    public function destroy($id)
    {
        $status = Status::find($id);
        $status->delete();
        return response()->json(['message' => 'Status deleted']);
    }
}
