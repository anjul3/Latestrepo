<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use App\Models\Admin;
use App\Models\User;
use Exception;


class UserFormController extends Controller
{

    public $table_name = 'user';
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
        foreach ($adminRules as $column => $rules) {
            $rulesArray = explode('|', $rules);

            foreach ($rulesArray as $rule) {
                $validationRules["$column"][] = $rule;
            }
        }

        $validatedData = $request->validate($validationRules);

        try {

            $requestData = $request->except('_token');

            $tableName = $this->table_name;
          
            $existingUser = User::where('email', $requestData['email'])->first();


            if ($existingUser) {
                return redirect('user-form')->with('error', 'User already filled form');
            }
            
            foreach ($requestData as $columnName => $value) {
                if (!Schema::hasColumn($tableName, $columnName)) {
                    Schema::table($tableName, function ($table) use ($columnName) {
                        $table->string($columnName)->nullable();
                    });
                }
            }

            if (!Schema::hasColumn($tableName, 'created_at')) {
                Schema::table($tableName, function ($table) {
                    $table->timestamps();
                });
            }
          
            $dataToInsert = $requestData;
            $dataToInsert['created_at'] = now();
            $dataToInsert['updated_at'] = now();
            $dataToInsert['submit_count'] =DB::table($tableName)->increment('submit_count');

           
            DB::table($tableName)->insert($dataToInsert);


            return redirect('user-form')->with('status', 'Form Submitted Successfully');
        } catch (Exception $e) {

            return redirect('user-form')->with('status', 'Error: ' . $e->getMessage());
        }
    }

}
