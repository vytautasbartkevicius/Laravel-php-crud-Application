<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::paginate(10);
        return view ('companies.index')->with('companies', $companies);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $requestData = $request->all();
        $fileName = time().$request->file('logo')->getClientOriginalName();
        $path = $request->file('logo')->storeAs('images', $fileName, 'public');
        $requestData["logo"] = '/storage/'.$path;
        Company::create($requestData);
        
        return redirect('company')->with('flash_message', 'Company Addedd!');  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company = Company::find($id);
        return view('companies.show')->with('companies', $company);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::find($id);
        return view('companies.edit')->with('companies', $company);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
        $company = Company::find($id);
        $input = $request->all();
        $company->update($input);
        return redirect('company')->with('flash_message', 'company Updated!');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Company::destroy($id);
        return redirect('company')->with('flash_message', 'company deleted!');  
    }
}
