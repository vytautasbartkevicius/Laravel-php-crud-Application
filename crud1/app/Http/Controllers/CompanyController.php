<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use Faker\Provider\ar_EG\Company as Ar_EGCompany;
use Illuminate\Support\Facades\File;

class CompanyController extends Controller
{
    
    public function index()
    {
        $companies = Company::paginate(10);
        return view ('companies.index')->with('companies', $companies);
    }
 
    
    public function create()
    {
        return view('companies.create');
    }
 
   
    public function store(Request $request)
    {
        $requestData = $request->all();
        $fileName = time().$request->file('logo')->getClientOriginalName();
        $path = $request->file('logo')->storeAs('images', $fileName, 'public');
        $requestData["logo"] = '/storage/'.$path;
        Company::create($requestData);
        
        return redirect('company')->with('flash_message', 'Company Addedd!');  
    }
 
    
    public function show($id)
    {
        $company = Company::find($id);
        return view('companies.show')->with('companies', $company);
    }
 
    
    public function edit($id)
    {
        $company = Company::find($id);
        return view('companies.edit')->with('companies', $company);
    }
 
  
    public function update(Request $request, $id)
    {
        $company = Company::find($id);
        $company->company_name = $request->input('company_name');
        $company->email = $request->input('email');
        $company->website= $request->input('website');


        if($request->logo != ''){        
          $path = public_path();
          

          //code for remove old file
          if($company->logo != ''  && $company->logo != null){
               $file_old = $path.$company->logo;
               unlink($file_old);
          }

          $file = $request->logo;
          $filename = $file->getClientOriginalName();
          ///
          
          ///
          $file->move($path, $filename);

          //for update in table
          $company->update(['logo' => $filename]);
        }
        return redirect('company')->with('flash_message', 'company Updated!');  
    }
 
   
    public function destroy($id)
    {
        Company::destroy($id);
        return redirect('company')->with('flash_message', 'company deleted!');  
    }
}