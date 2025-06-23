<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{

    public function index()
    {
        $employees=Employee::with('department')->orderBy('id','desc')->paginate(10);
        return view('employess.index',compact('employees'));
    }


    public function create()
    {
        $departments= Department::all();
        return view('employess.create',compact('departments'));
    }


    public function store(Request $request)
    {
        $miga =2* 1024;
        $request->validate([
                'name'=>"required|min:3|max:50|string|unique:employees,name",
                'salary'=>'required|numeric',
                'image'=> "required|file|max:$miga|mimes:png,jpg,jpeg,jif",
                "department_id"=>"required|exists:departments,id"
        ]);
        if($request->hasfile('image')){
        $image_data= $request->file("image");
        $image_name=time(). $image_data->getClientOriginalName();
        $location=public_path('upload');
        $image_data->move($location,$image_name);
        } else{
            $image_name =null ;
        }
        Employee::create([
        'name'=> $request->name,
        "salary"=> $request->salary,
        'image'=>$image_name,
        "department_id"=> $request->department_id,
    ]);
    return redirect()->route("employee.index")->with('success',"Create Employee Successfully");
    }


    public function show($id)
    {
        $employee= Employee::with("department")->find($id);
        // return $employee;
        return view('employess.show',compact("employee"));
    }


    public function edit($id )
    {
        $employee = Employee::find($id);
        $departments = Department::all();

        return view('employess.edit',compact("employee","departments"));
    }


    public function update(Request $request, $id)
    {
            $miga =2* 1024;
        $request->validate([
                'name'=>"required|min:3|max:50|string|unique:employees,name,$id",
                'salary'=>'required|numeric',
                'image'=> "required|file|max:$miga|mimes:png,jpg,jpeg,jif",
                "department_id"=>"required|exists:departments,id"
        ]);
        if($request->hasfile('image')){
        $image_data= $request->file("image");
        $image_name=time(). $image_data->getClientOriginalName();
        $location=public_path('upload');
        $image_data->move($location,$image_name);
        } else{
            $image_name =null ;
        }
                Employee::find($id)->update([
        'name'=> $request->name,
        "salary"=> $request->salary,
        'image'=>$image_name,
        "department_id"=> $request->department_id,
    ]);
        return redirect()->route("employee.index")->with('success',"Update Employee Successfully");

    }


    public function destroy($id)
    {
        Employee::destroy($id);
                return redirect()->route("employee.index")->with('success',"Delete Employee Successfully");

    }
}
