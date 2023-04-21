<?php

namespace App\Http\Controllers;

use App\Models\TaskUser;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TaskUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = TaskUser::all();
        return response()->json(['data' => $users], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $user = TaskUser::create([
            'username' => $request->input('username'),
            'password' => $request->input('password')
        ]);

        return response()->json(['data' => $user], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = TaskUser::find($id);

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        return response()->json(['data' => $user], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $user = TaskUser::find($id);

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        $user->username = $request->input('username');
        $user->password = $request->input('password');
        $user->save();

        return response()->json(['data' => $user], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = TaskUser::find($id);

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        $user->delete();

        return response()->json(['message' => 'User deleted'], 200);
    }


    public function login(Request $request)
{
    $email = $request->input('email_address');
    $password = $request->input('password');

    // Validation rules for email and password
    // $rules = [
    //     'email_address' => 'required|email_address',
    //     'password' => 'required|min:6',
    // ];

    // $validator = Validator::make($request->all(), $rules);

    // if ($validator->fails()) {
    //     return response()->json([
    //         'success' => false,
    //         'errors' => $validator->errors(),
    //     ], 422);
    // }

    // Save email and password to the database
    $user = new TaskUser;
    $user->email_address = $email;
    $user->password = bcrypt($password);
    $user->save();

    return response()->json([
        'success' => true,
        'message' => 'User registered successfully!',
    ]);
}
}
