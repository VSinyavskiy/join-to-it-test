<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Company;
use App\Models\Employee;
use App\Http\Requests\Employees\StoreEmployeeRequest;
use App\Http\Requests\Employees\UpdateEmployeeRequest;

use Datatables;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTitle           = __('admin.employees.title');
        $companiesSearchJson = json_encode(Company::getCompaniesList());

        return view('admin.employees.index', compact('pageTitle', 'companiesSearchJson'));
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function data()
    {
        $employees = Employee::joinCompanies()->select([
            'employees.id',
            'employees.company_id',
            'companies.name',
            'employees.first_name',
            'employees.last_name',
            'employees.email',
            'employees.phone',
            'employees.created_at',
        ]);

        // fields
        $datatables = Datatables::of($employees)
            ->addColumn('actions', function(Employee $employee) {
                return view('admin.employees._actions', compact('employee'))->render();
            });

        return $datatables->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Employee $employee)
    {
        $pageTitle = __('admin.employees.create_title');

        return view('admin.employees.create', compact('pageTitle', 'employee'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployeeRequest $request, Employee $employee)
    {
        $employee->fill($request->all())
                ->save();

        return redirect()->route('admin.employees.show', $employee);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        $pageTitle = __('admin.employees.show_title');

        return view('admin.employees.show', compact('pageTitle', 'employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        $pageTitle = __('admin.employees.edit_title');

        return view('admin.employees.edit', compact('pageTitle', 'employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        $employee->fill($request->all())
                ->save();

        return redirect()->route('admin.employees.show', $employee);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee, Request $request)
    {
        $employee->delete();

        if(!$request->ajax()) {
            return redirect()->route('admin.employees.index');
        }
    }
}
