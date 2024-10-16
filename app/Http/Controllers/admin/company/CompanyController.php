<?php

namespace App\Http\Controllers\admin\company;

use App\Http\Controllers\Controller;
use App\Models\admin\company\Company;
use App\Models\admin\company\CompanyActivity;
use App\Models\admin\company\CompanyContacts;
use App\Models\admin\company\CompanyDetail;
use App\Models\admin\company\CompanyLicense;
use App\Models\admin\company\CompanyMembers;
use App\Models\Level;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        if (Level::has_permission('show-companies')) {
            $companies_num = DB::select('select count(id) as total from companies where user_id = ? ', [Auth::user()->id]);
            $companies = Company::where('user_id', '=', Auth::user()->id)->latest()->paginate(25);
            return view('admin.companies.index', compact('companies', 'companies_num'));
        } else {
            return redirect()->route('admin')->with('error', 'Sorry you can\'t visit this page');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Level::has_permission('add-company')) {
            $parents = Company::all();
            $countries = DB::select('select * from countries');
            return view('admin.companies.create', compact('parents', 'countries'));
        } else {
            return redirect()->route('admin')->with('error', 'Sorry you can\'t visit this page');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        if (Level::has_permission('add-company')) {

            $company = new Company();
            $request->validate([
                'name' => 'required|unique:Companies,name',
            ], [
                'name.required' => 'Please enter company name',
                'name.unique' => 'This name is already exist',
            ]);
            if (isset($_FILES['logo']['name']) && $_FILES['logo']['name'] = "") {

                $logo = time() . "." . $request->file('logo')->getClientOriginalExtension();
                $request->file('logo')->move(public_path('uploads/companies/logos/'), $logo);
                $company->logo = $logo;
            }
            $company->domain = $request->domain;
            $company->user_id = Auth::user()->id;
            $company->name = $request->name;
            $company->save();
            $companyDetail = new CompanyDetail();
            $companyDetail->abbr = $request->details['abbr'];
            $companyDetail->dlh = $request->details['dlh'];
            $companyDetail->taxid = $request->details['taxid'];
            $companyDetail->currency_id = $request->details['currency_id'];
            $companyDetail->country_id = $request->details['country_id'];
            $companyDetail->parent_id = $request->details['parent_id'];
            $companyDetail->company_id = $request->details['company_id'];
            $companyDetail->establish_date = $request->details['establish_date'];
            $companyDetail->isgroup = $request->details['isgroup'];
            $companyDetail->save();

            return redirect()->route('companies.create')->with('success', 'The company has been added');
        } else {
            return redirect()->route('admin')->with('error', 'Sorry you can\'t visit this page');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $company = Company::find($id);
        $contacts = CompanyContacts::all()->where('company_id', '=', $id);
        $members = CompanyMembers::all()->where('company_id', '=', $id);
        $licenses = CompanyLicense::all()->where('company_id', '=', $id);
        $activities = CompanyActivity::all()->where('company_id', '=', $id);

        return view('admin.companies.edit', compact('company', 'contacts', 'members', 'licenses', 'activities'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request);
        if (Level::has_permission('edit-company')) {

            $company = Company::find($id);
            $request->validate([
                'name' => 'required|unique:Companies,name,' . $id,
            ], [
                'name.required' => 'Please enter company name',
                'name.unique' => 'This name is already exist',
            ]);
            if (isset($_FILES['logo']['name']) && $_FILES['logo']['name'] = "") {

                $logo = time() . "." . $request->file('logo')->getClientOriginalExtension();
                $request->file('logo')->move(public_path('uploads/companies/logos/'), $logo);
                $company->logo = $logo;
                unlink(public_path('uploads/companies/logos/' . $company->logo));
            }
            $company->domain = $request->domain;
            $company->user_id = Auth::user()->id;
            $company->name = $request->name;
            $company->save();
            $companyContact = new CompanyContacts();
            $companyContact->addCompanyContact($request->contact, $company->id);
            $companyLicense = new CompanyLicense();
            $companyLicense->addCompanyLicense($request->license, $company->id);
            $companyMember = new CompanyMembers();
            $companyMember->addCompanyMember($request->member, $company->id);
            $companyActivity = new CompanyActivity();
            $companyActivity->addCompanyActivity($request->activity, $company->id);

            return redirect()->route('companies.edit', $id)->with('success', 'The company has been updated');
        } else {
            return redirect()->route('admin')->with('error', 'Sorry you can\'t visit this page');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
