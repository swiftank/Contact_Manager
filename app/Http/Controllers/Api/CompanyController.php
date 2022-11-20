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
        try {
            $companies = Company::all();
            return response()->json([
                'status' => true,
                'companies' => $companies,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => "Something went wrong. Please try after some time."
            ]);
        }
    }

    /**
     * Search by company name and contact name .
     *
     */
    public function search(Request $request)
    {
        try {
            $searchString  = $request->name;
            $searchType  = $request->type;
            $data = "";
            if ($searchString) {
                if ($searchType == 'company') {
                    $data = Company::where('name', 'like', '%' . $searchString . '%')->get();
                } else {
                    $data = Contact::where('name', 'like', '%' . $searchString . '%')->get();
                }

                return response()->json([
                    'status' => true,
                    'data' => $data,
                ]);
            }
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => "Something went wrong. Please try after some time."
            ]);
        }
    }

    /**
     *
     * @return \Illuminate\Http\Response
     */
    public function contactByCompany($company_id)
    {
        try {
            $company = Company::with('contacts')->find($company_id);
            return response()->json([
                'status' => true,
                'company' => $company,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => "Something went wrong. Please try after some time."
            ]);
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $company = Company::create($request->all());

            return response()->json([
                'status' => true,
                'message' => 'Company Created Successfully',
                'company' => $company
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => "Something went wrong. Please try after some time."
            ]);
        }
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
        try {
            $company->update($request->all());
            return response()->json([
                'status' => true,
                'message' => 'Company Updated Successfully',
                'company' => $company
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => "Something went wrong. Please try after some time."
            ]);
        }
    }

    public function fetchCompanies()
    {
        try {
            $companaies = Company::with('contacts', 'contacts.notes')->get();
            return response()->json([
                'status' => true,
                'message' => 'Data Retrived Successfully',
                'companies' => $companaies
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => "Something went wrong. Please try after some time."
            ]);
        }
    }
}
