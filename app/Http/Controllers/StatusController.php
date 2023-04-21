<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Status;
use App\Http\Controllers\Controller;

class StatusController extends Controller
{
    public function index()
    {
        $statuses = Status::all();

        return response()->json([
            'success' => true,
            'data' => $statuses
        ]);
    }

    public function store(Request $request)
    {
        $status = Status::create([
            'name' => $request->name
        ]);

        return response()->json([
            'success' => true,
            'data' => $status
        ]);
    }

    public function show($id)
    {
        $status = Status::find($id);

        return response()->json([
            'success' => true,
            'data' => $status
        ]);
    }

    public function update(Request $request, $id)
    {
        $status = Status::find($id);

        $status->name = $request->name;

        $status->save();

        return response()->json([
            'success' => true,
            'data' => $status
        ]);
    }

    public function destroy($id)
    {
        $status = Status::find($id);

        $status->delete();

        return response()->json([
            'success' => true
        ]);
    }
}
