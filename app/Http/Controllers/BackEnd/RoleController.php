<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index(){
        $role = Role::all();
        return view('BackEnd.Role.index',compact('role'));
    }
    public function create(){
        return view('BackEnd.Role.create');

    }
    public function store(Request $request){
        $data = $request->validate([
            'role_name'=>'required',
        ]);
        $role = new Role();
        $role::create($data);
        return redirect(route('role.index'))->with('success', 'Role created successfully.');
    }
    public function edit($id){
        $role = Role::find($id);
        return view('BackEnd.Role.edit',compact('role'));
    }
    public function update(Request $request,$id){
       
        $role = Role::findOrFail($id);
        $role->role_name = $request->role_name;
        $role->save();
        return redirect(route('role.index'))->with('success','update successfully');
    }
    public function delete($id){
        $role = Role::findOrFail($id);
        $role->delete();
        return redirect()->back()->with('success','xoá thành công');
    }
}
