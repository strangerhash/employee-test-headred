<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\UserController;
use Inertia\Inertia;

class UserController extends Controller
{
    // Fetch all users from the database
    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }

    // Search users by email or first name
    public function search(Request $request)
    {
        $query = $request->input('query');
        $users = User::where('email', 'like', '%' . $query . '%')
            ->orWhere('first_name', 'like', '%' . $query . '%')
            ->get();

        return response()->json($users);
    }


    public function renderFrontEnd()
    {
        $users = User::all(); // Fetch users from the database
        // dd($users);
        return Inertia::render('Users', ['users' => $users]);
    }

}
