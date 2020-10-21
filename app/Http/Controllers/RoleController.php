<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;

class RoleController extends Controller
{
    public function index(){

        return view('admin.roles.roles')->with(['roles' => Role::all()]);
    }
}
