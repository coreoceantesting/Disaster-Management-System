<?php

namespace App\Http\Controllers\Admin\Masters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Masters\StoreDepartmentRequest;
use App\Http\Requests\Admin\Masters\UpdateDepartmentRequest;
use App\Models\Department;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments_list = Department::where('is_deleted','0')->latest()->get();

        return view('admin.masters.departments')->with(['departments_list'=> $departments_list]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try
        {
            $request->validate([
                'name' => 'required',
                'initial' => 'required',
            ]);

            DB::table('departments')->insert([
                'name' => $request->input('name'),
                'initial' => $request->input('initial'),
                'created_by' => Auth::user()->id,
                'created_at' => date('Y-m-d H:i:s'),
            ]);

            // DB::beginTransaction();
            // $input = $request->validated();
            // $input['created_by'] = Auth::user()->id;
            // $input['created_at'] = date('Y-m-d H:i:s');
            // Department::create( Arr::only( $input, Department::getFillables() ) );
            // DB::commit();

            return response()->json(['success'=> 'Department created successfully!']);
        }
        catch (ValidationException $e) {
            // If validation fails, return validation errors
            return response()->json(['errors' => $e->errors()]);
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
    public function edit(Department $department)
    {
        if ($department)
        {
            $response = [
                'result' => 1,
                'department' => $department,
            ];
        }
        else
        {
            $response = ['result' => 0];
        }
        return $response;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDepartmentRequest $request, Department $department)
    {
        try
        {
            // DB::beginTransaction();
            // $input = $request->validated();
            // $input['name'] = $input['name'];
            // $input['initial'] = $input['initial'];
            // $input['updated_by'] = Auth::user()->id;
            // $input['updated_at'] = date('Y-m-d H:i:s');
            // $department->update( Arr::only( $input, Department::getFillables() ) );
            // DB::commit();

            $request->validate([
                'name' => 'required',
                'initial' => 'required',
            ]);

            DB::table('departments')->where('department_id', $department->department_id)->update([
                'name' => $request->input('name'),
                'initial' => $request->input('initial'),
                'created_by' => Auth::user()->id,
                'created_at' => date('Y-m-d H:i:s'),
            ]);

            return response()->json(['success'=> 'Department updated successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'updating', 'Department');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department)
    {
        try
        {
            DB::beginTransaction();
            $department->update(['is_deleted' => '1']);
            DB::commit();
            return response()->json(['success'=> 'Department deleted successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'deleting', 'Department');
        }
    }
}
