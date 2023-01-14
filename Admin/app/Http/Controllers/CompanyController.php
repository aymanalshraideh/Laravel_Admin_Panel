<?php

namespace App\Http\Controllers;


use App\Models\Company;
use Illuminate\Support\Facades\Storage;

use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\StorecompanyRequest;
use App\Http\Requests\UpdatecompanyRequest;


class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $companies = Company::latest()->Paginate(10);
        // dd($companies);
        return view('Companies.index', compact('companies'));
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
     * @param  \App\Http\Requests\StorecompanyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorecompanyRequest $request)
    {

        $validated = $request->validated();
        if ($request->hasFile('company_logo')) {
            $file = $request->file('company_logo');
            $filename = time() . $file->getClientOriginalName();

            $file->storeAs('public/', $filename);
            $validated['company_logo'] = $filename;
        }
        $add =  Company::create($validated);

        if ($add) {
            return redirect('companies')->with('message', 'Success Add Company');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(company $company)
    {
        return view('Companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatecompanyRequest  $request
     * @param  \App\Models\company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatecompanyRequest $request, company $company)
    {
        $validated = $request->validated();
        if ($request->hasFile('company_logo')) {
            $file = $request->file('company_logo');
            $filename = time() . $file->getClientOriginalName();

            $file->storeAs('public/', $filename);
            $validated['company_logo'] = $filename;
        } else {
            $validated['company_logo'] = $company['company_logo'];
        }
        $company->update($validated);


        return redirect()->back()->with('message', 'Success Edit Company');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(company $company)
    {
        $company->delete();

        return redirect()->route('companies.index')
            ->with('message', 'Company deleted successfully');
    }
}
