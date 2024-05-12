<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Admin;
use App\Models\User;
use Exception;


class UserFormController extends Controller
{
    public function index()
    {
        $data = Admin::all();
        return view('user-form', ['form_data' => $data]);
    
    }

    public function userStore(Request $request)
    {

    $adminRules = Admin::pluck('rules', 'field_name')->toArray(); // Assuming 'column_name' is the name of the column
   
    $validationRules = [];
    foreach ($adminRules as $column => $rules){
        $rulesArray = explode('|', $rules);
        
       
        foreach ($rulesArray as $rule) {
          
            $validationRules["$column"][] = $rule;
        }
    }
    
    $validatedData = $request->validate($validationRules);
    
  

         try {
        //     DB::beginTransaction();

        //     $emp = new User;

        //     $emp->field_name = $request->field_name;
        //     $emp->field_label = $request->field_label;
        //     $emp->min = $request->min . '-' . $request->min_value;
        //     $emp->max = $request->max . '-' . $request->max_value;
        //     $emp->required = $request->required;
        //     $emp->email = $request->email;

        //     $emp->save();

        //     DB::commit();

            return redirect('user-form')->with('status', 'Form Submitted Successfully');
        } catch (Exception $e) {
           // DB::rollBack();

            return redirect('user-form')->with('status', 'Error: ' . $e->getMessage());
        }

    }
}
