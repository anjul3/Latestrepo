<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee; // Import the Employee model

class AdminController extends Controller
{
    public function index()
    {
        return view('admin-form');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:employees|max:255', // Change 'employees' to 'employees' if that's your model's table name
            'age' => 'required|numeric', // Assuming age should be numeric
            'contact_no' => 'required|unique:employees|max:255', // Change 'employees' to 'employees' if that's your model's table name
        ]);

        // Create a new Employee instance
        $emp = new Employee;

        // Assign values from the request to the Employee instance
        $emp->name = $request->name;
        $emp->email = $request->email;
        $emp->age = $request->age;
        $emp->contact_no = $request->contact_no;

        // Save the Employee instance to the database
        $emp->save();

        // Redirect with success message
        return redirect('form')->with('status', 'Form Data Has Been Inserted');
    }
}
