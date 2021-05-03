<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class RoleController extends Controller
{
    public function role (Request $request)
    {
        $roles = Role::select('id','title')->with('permissions')->get();
        return view('admin.showRoles', compact('roles'));
    }
}
