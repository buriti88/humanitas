<?php

namespace App\Http\Controllers\ProjectControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateEmployeeRequest;
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
    public function create(Employee $employees)
    {
        return view("employees.create", [
            'employees' => $employees,
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

            $employees = new Employee($request->validated());

            if ($employees->save()) {
                Session::flash('success', __('employees.created', ['name' => $employees->name . ' ' . $employees->last_name]));
                DB::commit();
            } else {
                Session::flash('error', __('employees.error', ['name' => $employees->name . ' ' . $employees->last_name, 'action' => 'crear']));
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employees = Employee::findOrFail($id);

        return view("employees.edit", [
            'employees' => $employees,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
