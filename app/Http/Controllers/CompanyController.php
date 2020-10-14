<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class CompanyController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    //
    public function showAllCompany()
    {
        $company = Company::all();
        return view('home',['name' => $company[1]]);
        return response()->json(Company::all());
    }

    public function showOneCompany($id)
    {
        return response()->json(Company::find($id));
    }
    
    public function create(Request $request)
    {
        $company = Company::create($request->all());

        return response()->json($company, 201);
    }

    public function update($id, Request $request)
    {
        $company = Company::findOrFail($id);
        $company->update($request->all());

        return response()->json($company, 200);
    }

    public function delete($id)
    {
        Company::findOrFail($id)->delete();
        return response('Deleted Successfully', 200);
    }
}
