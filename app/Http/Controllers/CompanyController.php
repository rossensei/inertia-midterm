<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Session;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return inertia('companies/Index', [
            'companies' => Company::orderBy('name')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return inertia('companies/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'type' => 'required|string',
            'address' => 'required|string',
            'net_worth' => 'required|numeric',
        ]);

        Company::create([
            'name' => $request->name,
            'type' => $request->type,
            'address' => $request->address,
            'net_worth' => $request->net_worth,
        ]);

        return redirect('/companies')->with('success', 'Company added successfully!');
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
        return inertia('companies/Edit', [
            'company' => $company
        ]);
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
        $fields = $request->validate([
            'name' => 'required|string',
            'type' => 'required|string',
            'address' => 'required|string',
            'net_worth' => 'required|numeric',
        ]);

        $company->update($fields);

        return redirect('/companies')->with('success', 'Company updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        if($company->members->count() > 0) {
            if($company->members->count() > 1) {
                return redirect('/companies')->with('error', "You can't delete this company because it has ".$company->members->count()." members.");
            } else {
                return redirect('/companies')->with('error', "You can't delete this company because it has ".$company->members->count()." member.");
            }
        }else{
            $company->delete();

            return redirect('/companies')->with('success', 'Company has been deleted successfully!');
        }
    }
}
