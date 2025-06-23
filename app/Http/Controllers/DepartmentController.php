<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
                $department=Department::with('employee')->orderBy('id','desc')->paginate(10);
        return view('department.index',compact('department'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments= Department::all();
        return view('department.create',compact('departments'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
                'name'=>"required|min:3|max:50|string|unique:departments,name",
                'description'=>'required|string',
        ]);
        $location=public_path('upload');
        Department::create([
        'name'=> $request->name,
        "description"=> $request->description,
    ]);
    return redirect()->route("department.index")->with('success',"Create department Successfully");
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $department= Department::with("employee")->find($id);
        // return $department;
        return view('department.show',compact("department"));    }

    /**
     * Show the form for editing the specified resource.
     */
public function edit($id)
{
    $department = Department::findOrFail($id);
    return view('department.edit', compact('department'));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $request->validate([
        'name' => "required|min:3|max:50|string|unique:departments,name,$id",
        'description' => 'required|string',
    ]);

    $department = Department::findOrFail($id);

    $department->update([
        'name' => $request->name,
        'description' => $request->description,
    ]);

    return redirect()->route("department.index")->with('success', "Update department Successfully");
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Department::destroy($id);
                return redirect()->route("department.index")->with('success',"Delete Department Successfully");
    }
}
