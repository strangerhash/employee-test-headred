<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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
}
