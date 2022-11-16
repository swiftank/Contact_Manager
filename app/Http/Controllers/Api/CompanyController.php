<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Contact;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::all();
        return response()->json([
         'status' => true,
         'companies' => $companies,
        ]);
    }

    /**
     * Search by company name and contact name .
     *
     */
    public function search(Request $request)
    {
        $searchString  = $request->name;
        $searchType  = $request->type;
        $data = "";
        if($searchString)
        {
            if($searchType == 'company'){
                $data = Company::where('name', 'like', '%'.$searchString.'%')->get();
            }else{
               $data = Contact::where('name', 'like', '%'.$searchString.'%')->get();
            }

            return response()->json([
                'status' => true,
                'data' => $data,
            ]);
        }
    }

    /**
     *
     * @return \Illuminate\Http\Response
     */
    public function contactByCompany($company_id)
    {
        $company = Company::with( 'contacts' )->find($company_id);
        return response()->json([
         'status' => true,
         'company' => $company,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $company = Company::create($request->all());

        return response()->json([
          'status' => true,
          'message' => 'Company Created Successfully',
          'company' => $company
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        $company->update($request->all());
        return response()->json([
            'status' => true,
            'message' => 'Company Updated Successfully',
            'company' => $company
          ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        //
    }
}
