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

        $adminRules = Admin::pluck('rules', 'field_name')->mapWithKeys(function ($rules, $fieldName) {
            return [str_replace(' ', '_', strtolower($fieldName)) => $rules];
        })->toArray();
  
    $validationRules = [];
    foreach ($adminRules as $column => $rules){
        $rulesArray = explode('|', $rules);
        
       
        foreach ($rulesArray as $rule) {
          
            $validationRules["$column"][] = $rule;
        }
    }
   
    $validatedData = $request->validate($validationRules);
    


         try {
            DB::beginTransaction();

            $user = new User;

            $user->field_name = $request->field_name;
            $user->field_label = $request->field_label;
            $user->min = $request->min . '-' . $request->min_value;
            $user->max = $request->max . '-' . $request->max_value;
            $user->required = $request->required;
            $user->email = $request->email;

            $user->save();

            DB::commit();

            return redirect('user-form')->with('status', 'Form Submitted Successfully');
        } catch (Exception $e) {
            DB::rollBack();

            return redirect('user-form')->with('status', 'Error: ' . $e->getMessage());
        }

    }
}
