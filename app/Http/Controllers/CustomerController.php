<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCustomerRequest;
use App\Models\Customer;
use App\Models\customers;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::all();
        return response()->json($customers);
    }

    public function show(Customer $customer)
    {
        
        return response()->json($customer);
    }

    public function store(StoreCustomerRequest $request)
    {
        Customer::create($request->validated());
        return response()->json("Customer Created");
    }


    public function update(StoreCustomerRequest $request, Customer $customer)
    {
        $customer->update($request->validated());
        return response()->json("Customer Updated");

    }


    public function destroy(Customer $customer)
    {
        $customer->delete();
        return response()->json("Customer Deleted");
    }

    public function deletedData()
    {
        $companies = Customer::onlyTrashed()->get();
        return response()->json($companies);
    }

    public function getByCompanyId($company_id)
    {
        $customers = Customer::where('company_id','=',$company_id)->get();
        return response()->json($customers);
    }
}
