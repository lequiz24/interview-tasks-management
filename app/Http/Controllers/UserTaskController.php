<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserTask;
use App\Http\Controllers\Controller;

class UserTaskController extends Controller
{
    public function index()
    {
        $userTasks = UserTask::all();
        return response()->json($userTasks);
    }

    public function show($id)
    {
        $userTask = UserTask::find($id);
        if (!$userTask) {
            return response()->json(['message' => 'User Task not found'], 404);
        }
        return response()->json($userTask);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'user_id' => 'required|integer',
            'task_id' => 'required|integer',
            'due_date' => 'required|date',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'remarks' => 'nullable|string',
            'status_id' => 'required|integer'
        ]);

        $userTask = UserTask::create($request->all());
        return response()->json($userTask, 201);
    }

    public function update(Request $request, $id)
    {
        $userTask = UserTask::find($id);
        if (!$userTask) {
            return response()->json(['message' => 'User Task not found'], 404);
        }

        $this->validate($request, [
            'user_id' => 'required|integer',
            'task_id' => 'required|integer',
            'due_date' => 'required|date',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'remarks' => 'nullable|string',
            'status_id' => 'required|integer'
        ]);

        $userTask->fill($request->all());
        $userTask->save();

        return response()->json($userTask);
    }

    public function destroy($id)
    {
        $userTask = UserTask::find($id);
        if (!$userTask) {
            return response()->json(['message' => 'User Task not found'], 404);
        }
        $userTask->delete();
        return response()->json(['message' => 'User Task deleted successfully']);
    }
}
