<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;
use App\Models\Admin;

class UserFormController extends Controller
{
    public function index()
    {
        $data = Admin::all();
        return view('user-form', ['form_data' => $data]);
    
    }

    public function userStore(Request $request)
    {
    
        
        // $validatedData = $request->validate([
        //   'name' => 'required',
        //   'email' => 'required|unique:employees|max:255',
        //   'age' => 'required',
        //   'contact_no' => 'required|unique:employees|max:255',
        // ]);

        // $emp = new Employee;

        // $emp->name = $request->name;
        // $emp->email = $request->email;
        // $emp->age = $request->age;
        // $emp->contact_no = $request->contact_no;

        // $emp->save();

        // return redirect('form')->with('status', 'Form Data Has Been Inserted');

    }
}
