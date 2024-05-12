<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;
use App\Models\Admin;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        $data = User::all();
        return view('admin-form', ['admin_data' => $data]);

    }

    public function store(Request $request)
    {
        $request->validate([
            'field_name' => 'required',
            'field_label' => 'required'
        ]);

        try {
            DB::beginTransaction();

            $admin = new Admin;

            $admin->field_name = $request->field_name;
            $admin->field_label = $request->field_label;
            $min = $request->filled('min') ? 'min:'.$request->min_value : '';
            $max = $request->filled('max') ? 'max:'.$request->max_value : '';
            $required = $request->filled('required') ? 'required' : '';
            $email = $request->filled('email') ? 'email' : '';

            $rules = implode('|', array_filter([$min, $max, $required,$email]));

            $admin->rules = $rules;

            $admin->save();

            DB::commit();

            return redirect('admin-form')->with('status', 'Field is Created');
        } catch (Exception $e) {
            DB::rollBack();

            return redirect('admin-form')->with('status', 'Error: ' . $e->getMessage());
        }
    }

}
