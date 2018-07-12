<?php

namespace App\Http\Controllers;

use App\Branch;
use App\Company;
use App\Country;
use App\DataTables\BranchesDataTable;
use App\DataTables\CompanyDataTable;
use App\Email;
use App\Http\Requests\CompanyRequest;
use Illuminate\Http\Request;
use Response;

class CompaniesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CompanyDataTable $dataTable)
    {
        return $dataTable->render('companies.index');
    }


   public function indexBranches(BranchesDataTable $dataTable)
    {
        return $dataTable->render('companies.branches');
    }






    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


            $country = Country::pluck('name','id')->toArray();
            $companies_data = Company::pluck('name','id')->toArray();


        return view('companies.create', ['country' => $country,'companies_data' => $companies_data]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|unique:companies|max:255',
            'phone' => 'required',
            'address' => 'required',
            'field' => 'required',
            'visites_date' => 'required',
            'country_id' => 'required',
        ]);



        $new_company = Company::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'field' => $request->field,
            'visites_date' => $request->visites_date,
            'country_id' => $request->country_id,
            'branches'=>$request->company_id

        ]);

       foreach ($request->email as $emails) {
           Email::create([
           'email' => $emails,
           'company_id' => $new_company->id,

           ]);
        }




        if ($new_company) {

            return redirect()->back()->with('success', __("pages.added-successfully"));
        }
        return redirect()->back()->with('error', __('pages.add-device-error'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {


        $companies = Company::find($id);
        $country = Country::pluck('name','id')->toArray();
        $companies_data = Company::pluck('name','id')->toArray();

        $emails = Email::where('company_id',$companies->id)->pluck('email')->toArray();


        return view('companies.edit', compact('companies', 'country','emails','companies_data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $company = Company::find($id);


            if ($company) {
                $new_company = $company->update([
                    'name' => $request->name,
                    'phone' => $request->phone,
                    'address' => $request->address,
                    'field' => $request->field,
                    'visites_date' => $request->visites_date,
                    'country_id' => $request->country_id,
                    'branches'   => $request->company_id

                ]);



                foreach ($request->email as $emails) {
                    $email_array = Email::pluck('id','email')->toArray();


                    if (in_array($emails, $email_array))
                        continue;


                    $company->email()->update(['email' => $emails]);


                }




                if ($new_company) {
                    return redirect()->back()->with('success', __("pages.updated-successfully"));
                }

                return redirect()->back()->with('error', __('pages.update-device-error'));
            }
            return redirect()->back()->with('error', __('pages.data-not-found'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $company = Company::find($id);


            $check = $company->delete();
            $checks = $company->email()->delete();

            if ($check) {
                return Response::json($id, '200');
            } else {
                return redirect()->back()->with('error', __('pages.delete-group-error'));

            }
    }



}
