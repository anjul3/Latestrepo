<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
            'field_label' => 'required'
        ]);

        try {
            DB::beginTransaction();

            $emp = new Admin;

            $emp->field_name = $request->field_name;
            $emp->field_label = $request->field_label;
            $min = $request->filled('min') ? 'min:'.$request->min_value : '';
            $max = $request->filled('max') ? 'max:'.$request->max_value : '';
            $required = $request->filled('required') ? 'required' : '';
            $email = $request->filled('email') ? 'email' : '';

            $rules = implode('|', array_filter([$min, $max, $required,$email]));

            $emp->rules = $rules;

            $emp->save();

            DB::commit();

            return redirect('admin-form')->with('status', 'Field is Created');
        } catch (Exception $e) {
            DB::rollBack();

            return redirect('admin-form')->with('status', 'Error: ' . $e->getMessage());
        }
    }

}
