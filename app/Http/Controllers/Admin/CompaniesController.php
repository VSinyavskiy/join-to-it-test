<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Company;
use App\Http\Requests\Companies\StoreCompanyRequest;
use App\Http\Requests\Companies\UpdateCompanyRequest;

use Datatables;
use Html;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTitle      = __('admin.companies.title');

        return view('admin.companies.index', compact('pageTitle'));
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function data()
    {
        $companies = Company::select(['*'])->with('media');

        // fields
        $datatables = Datatables::of($companies)
            ->editColumn('logo', function(Company $company) {
                if ($company->logo) {
                    $logo = Html::image($company->logo->getFullUrl(), null, ['width' => 100])->toHtml();
                }

                return $logo ?? __('admin.non_image');
            })
            ->addColumn('actions', function(Company $company) {
                return view('admin.companies._actions', compact('company'))->render();
            });

        return $datatables->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Company $company)
    {
        $pageTitle = __('admin.companies.create_title');

        return view('admin.companies.create', compact('pageTitle', 'company'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCompanyRequest $request, Company $company)
    {
        $company->fill($request->all())
                ->save();

        if($request->hasFile('logo')) {
            $company->setLogoAttribute($request->file('logo'));
        }

        return redirect()->route('admin.companies.show', $company);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        $pageTitle = __('admin.companies.show_title');

        return view('admin.companies.show', compact('pageTitle', 'company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        $pageTitle = __('admin.companies.edit_title');

        return view('admin.companies.edit', compact('pageTitle', 'company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCompanyRequest $request, Company $company)
    {
        $company->fill($request->all())
                ->save();

        if($request->hasFile('logo')) {
            $company->clearMediaCollection('logo')
                    ->setLogoAttribute($request->file('logo'));
        }

        return redirect()->route('admin.companies.show', $company);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company, Request $request)
    {
        $company->clearMediaCollection('logo')
                ->delete();

        if(!$request->ajax()) {
            return redirect()->route('admin.companies.index');
        }
    }
}
