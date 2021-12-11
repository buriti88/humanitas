<?php

namespace App\Http\Controllers\ProjectControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = [];

        if ($request->has('q')) {
            $search = $request->get('q', []);
        } else {
            $search = get_last_user_search('employees', []);
        }

        set_last_user_search('employees', $search);

        $per_page = module_per_page('employees', 20);
        $employees = Employee::search($search)->paginate($per_page);
        $employees->appends($search + ['per_page' => $per_page]);

        return view('employees.index', [
            'search' => $search,
            'employees' => $employees,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Employee $employee)
    {
        return view("employees.create", [
            'employee' => $employee,
        ] + Employee::getArrayList());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateEmployeeRequest $request)
    {
        try {
            DB::beginTransaction();

            $employee = new Employee($request->validated());

            if ($employee->save()) {
                Session::flash('success', __('employees.created', ['name' => $employee->name . ' ' . $employee->last_name]));
                DB::commit();
            } else {
                Session::flash('error', __('employees.error', ['name' => $employee->name . ' ' . $employee->last_name, 'action' => 'crear']));
                DB::rollBack();
            }
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
        }

        return redirect()->route('employees.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::findOrFail($id);

        return view('employees.detail', [
            'employee' => $employee,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::findOrFail($id);

        return view("employees.edit", [
            'employee' => $employee,
        ] + Employee::getArrayList());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmployeeRequest $request, $id)
    {
        try {
            DB::beginTransaction();

            $employee = Employee::findOrFail($id);

            if ($employee->update($request->validated())) {
                Session::flash('success', __('employees.updated', ['name' => $employee->name . ' ' . $employee->last_name]));
                DB::commit();
            } else {
                Session::flash('error', __('employees.error', ['name' => $employee->name . ' ' . $employee->last_name, 'action' => 'actualizar']));
                DB::rollBack();
            }
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
        }

        return redirect()->route('employees.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);

        try {
            $employee->delete();
            Session::flash('success', __('employees.deleted', ['name' => $employee->name . ' ' . $employee->last_name]));
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            Session::flash('error', __('employees.error', ['name' => $employee->name . ' ' . $employee->last_name]));
        }

        return redirect()->route('employees.index');
    }
}
