<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Exception;
use App\Models\Admin;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin-form');
    }
   
    public function store(Request $request)
    {
        $request->validate([
            'field_name' => 'required',
            'field_label' => 'required',
            'min' => 'nullable|boolean',
            'max' => 'nullable|boolean',
            'required' => 'nullable|boolean',
            'email' => 'nullable|email',
        ]);
    
        try {
            DB::beginTransaction();
    
            $emp = new Admin;
    
            $emp->field_name = $request->field_name;
            $emp->field_label = $request->field_label;
            $emp->min = $request->min ?? false; // Ensure defaults are set if value not provided
            $emp->max = $request->max ?? false;
            $emp->required = $request->required ?? false;
            $emp->email = $request->email;
    
            $emp->save();
    
            DB::commit();
    
            return redirect('admin-form')->with('status', 'Form Data Has Been Inserted');
        } catch (Exception $e) {
            DB::rollBack();
    
            return redirect('admin-form')->with('status', 'Error: ' . $e->getMessage());
        }
    }
    
}
