<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserFormController extends Controller
{
    public function index()
    {
        return view('user-form');
    }

    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
          'name' => 'required',
          'email' => 'required|unique:employees|max:255',
          'age' => 'required',
          'contact_no' => 'required|unique:employees|max:255',
        ]);

        $emp = new Employee;

        $emp->name = $request->name;
        $emp->email = $request->email;
        $emp->age = $request->age;
        $emp->contact_no = $request->contact_no;

        $emp->save();

        return redirect('form')->with('status', 'Form Data Has Been Inserted');

    }
}
