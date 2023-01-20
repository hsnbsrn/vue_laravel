<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCompanyRequest;
use App\Models\Company;
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
        return response()->json($companies);
    }

    public function show(Company $company)
    {
        return response()->json($company);
    }

    public function store(StoreCompanyRequest $request)
    {
        Company::create($request->validated());
        return response()->json("Company Created");
    }


    public function update(StoreCompanyRequest $request, Company $company)
    {
        $company->update($request->validated());
        return response()->json("Company Updated");

    }


    public function destroy(Company $company)
    {
        $company->delete();
        return response()->json("Company Deleted");
    }
}
