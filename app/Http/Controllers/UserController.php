<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    public function index(){
        $users=User::all();
        return view('dashboard',compact('users'));
    }

    public function export(Request $request)
    {
        $request->validate([
            'columns' => 'required|array',
        ]);
        $columns = $request->input('columns');
        return Excel::download(new UsersExport($columns), 'users.xlsx');
    }

    public function import(Request $request) 
    {
        $validator= Validator::make($request->all(),[
            'file' => 'required|mimes:xlsx,xls',
        ]);
        
        if ($validator->fails()) {
            return redirect()->route('dashboard')->with('error','PLEASE CHOOSE FILE FIRST');
        }
        Excel::import(new UsersImport,request()->file('file'));
        return back()->with('success','FILE DATA IMPORTED SUCCESSFULLY');
    }
}
