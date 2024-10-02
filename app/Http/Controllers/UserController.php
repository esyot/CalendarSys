<?php

namespace App\Http\Controllers;

use App\Models\User;   // Import the User model
use Inertia\Inertia;   // Import Inertia

class UserController extends Controller
{
    // Method to handle displaying the users
    public function index()
    {
        $users = User::all();  // Fetch all users from the database

        // Return the Inertia response and pass users data to the Vue component
        return Inertia::render('Users', [
            'users' => $users,  // Pass users data to the 'Users' Vue component
        ]);
    }
}
