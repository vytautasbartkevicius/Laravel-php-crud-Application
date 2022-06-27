<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Faker\Provider\ar_EG\Company as Ar_EGCompany;

class EmployeeController extends Controller
{
    
    public function index()
    {
        $employees = Employee::paginate(10);
        
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
        
        $employee = Employee::where('email',$id)->firstOrFail();
        
        return view('employees.show')->with('employees', $employee);
    }
 
    
    public function edit($id)
    {
        $employee = Employee::find($id);
        return view('employees.edit')->with('employees', $employee);
       
       
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