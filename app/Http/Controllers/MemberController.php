<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Company;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return inertia('members/Index', [
            'members' => Member::orderBy('last_name')
                        ->with('company')
                        ->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::orderBy('id')->get();
        return inertia('members/Create', [
            'companies' => $companies
        ]);
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
            'last_name' => 'required',
            'first_name' => 'required',
            'designation' => 'required',
            'company_id' => 'required',
        ]);

        Member::create([
            'last_name' => $request->last_name,
            'first_name' => $request->first_name,
            'designation' => $request->designation,
            'company_id' => $request->company_id,
        ]);

        return redirect('/members')->with('message', 'Member added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {

        $companies = Company::orderBy('id')->get();

        return inertia('members/Edit', [
            'member' => $member,
            'companies' => $companies
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member)
    {
        $fields = $request->validate([
            'last_name' => 'required',
            'first_name' => 'required',
            'designation' => 'required',
            'company_id' => 'required',
        ]);

        $member->update($fields);

        return redirect('/members')->with('message', 'Member updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        //
    }
}
