<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Faker\Provider\ar_EG\Company as Ar_EGCompany;

class EmployeeController extends Controller
{
    
    public function index()
    {
        $employees = Employee::all();
        return view ('employees.index')->with('employees', $employees);
    }
 
    
    public function create()
    {
        return view('employees.create');
    }
 
   
    public function store(Request $request)
    {
        $input = $request->all();
        Employee::create($input);
        return redirect('employee')->with('flash_message', 'Company Addedd!');  
    }
 
    
    public function show($id)
    {
        $employee = Employee::find($id);
        return view('employees.show')->with('employees', $employee);
    }
 
    
    public function edit($id)
    {
        $employee = Employee::find($id);
        return view('companies.edit')->with('companies', $employee);
    }
 
  
    public function update(Request $request, $id)
    {
        $employee = Employee::find($id);
        $input = $request->all();
        $employee->update($input);
        return redirect('employee')->with('flash_message', 'employee Updated!');  
    }
 
   
    public function destroy($id)
    {
        Employee::destroy($id);
        return redirect('employee')->with('flash_message', 'employee deleted!');  
    }
}