<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Role;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::WhereRoleNot('super_admin')->whenSearch(request()->search)->paginate(5);
        return view('dashboard.roles.index',compact('roles'));
        
    }


    public function create()
    {
        return view('dashboard.roles.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|unique:roles,name',
            'permissions'=>'required|array|min:1'
        ]);

        $role = Role::create($request->all());
        $role->attachPermissions($request->permissions);
        session()->flash('success', 'Data adedd successfully');
        return redirect()->route('dashboard.roles.index');
    }

    public function edit(Role $role)
    {
        return view('dashboard.roles.edit',compact('role'));
        
    }


    public function update(Request $request,Role $role)
    {
        
        $request->validate([
            'name'=>'required|unique:roles,name,'.$role->id,
            'permissions'=>'required|array|min:1'
        ]);

        $role->update($request->all());
        $role->syncPermissions($request->permissions);
        session()->flash('success', 'Data updated successfully');
        return redirect()->route('dashboard.roles.index');
    }


    public function destroy(Role $role)
    {
        
        $role->delete();
        session()->flash('success', 'Data deleted successfully');
        return redirect()->route('dashboard.roles.index');
    }
}
