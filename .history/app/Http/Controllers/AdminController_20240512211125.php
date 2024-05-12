<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin-form');
    }

    public function store(Request $request)
    {
      try {
            $request->validate([
                'field_name' => 'required',
                'field_label' => 'required'   
            ]);
            

            $emp = new Admin;

        
            $emp->field_name = $request->field_name;
            $emp->field_label = $request->field_label;
            $emp->min = $request->min;
            $emp->max = $request->max;
            $emp->required = $request->required;
            $emp->email = $request->email;

            $emp->save();

            return redirect('admin-form')->with('status', 'Form Data Has Been Inserted');
        } catch (\Exception $e) {
            return redirect('admin-form')->with('status', $e->getMessage());
        }
    }
}
