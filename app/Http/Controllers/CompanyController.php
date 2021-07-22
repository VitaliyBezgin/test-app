<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Http\Requests\CompanyUpdateRequest;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::paginate(3);

        return view('crud.company.companyList', ['companies' => $companies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('crud.company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyRequest $request)
    {
       $company = new Company();
        try {
            $company->name = $request->name;
            $company->email = $request->email;
            $company->website = $request->website;

            if ($request->logo){
                $path = $request->file('logo')->storeAs(
                    'public/company/',
                    $request->file('logo')->getClientOriginalName(),
                );

                $company->logo = $request->file('logo')->getClientOriginalName();
            }
            $res = $company->save();

            if ($res){
                return redirect()->route('company.show', $company->id)->with('success', 'New company was successfully created !');
            }
        }catch (\Exception $exception){
            return redirect()->back()->with('error', 'Something went wrong !');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company = Company::with('employees')->findOrFail($id);

        return view('crud.company.show', ['company' => $company]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::findOrFail($id);

        return view('crud.company.edit', ['company' => $company]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyUpdateRequest $request, $id)
    {
        $company = Company::findOrFail($id);
        try {
            $company->name = $request->name;
            $company->email = $request->email;
            $company->website = $request->website;

            if ($request->logo){
                Storage::delete('public/company/'.$company->logo);

                $path = $request->file('logo')->storeAs(
                    'public/company/',
                    $request->file('logo')->getClientOriginalName(),
                );

                $company->logo = $request->file('logo')->getClientOriginalName();
            }
            $res = $company->save();

            if ($res){
                return redirect()->route('company.show', $company->id)->with('success', 'Company was successfully updated !');
            }
        }catch (\Exception $exception){
            return redirect()->back()->with('error', 'Something went wrong !');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = Company::findOrFail($id);
        Company::destroy($id);
        Storage::delete('public/company/'.$company->logo);

        return redirect()->route('company.index')->with('success', 'Record was successfully deleted !');
    }
}
