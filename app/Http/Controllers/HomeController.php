<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function redirect()
    {
        if(Auth :: check())
        {
            $company = Company::with('users')->get();
            // admin role= 1, user role == 0
            if(Auth :: user()->role == '1'){
                return view('admin.home',compact('company'));
            }
            else{
                return view('home',compact('company'));
            }
        }
        else{
            return redirect('/login')->with('message', 'Login to access the website info');
        }
    }
    public function redirect_employees()
    {
        if(Auth :: check())
        {
            $company = Company::with('users')->get();
            // admin role= 1, user role == 0
            if(Auth :: user()->role == '1'){
                return view('admin.employees',compact('company'));
            }
            else{
                return view('employees',compact('company'));
            }
        }
        else{
            return redirect('/login')->with('message', 'Login to access the website info');
        }
    }
    public function redirect_show($id)
    {
        if(Auth :: check())
        {
            $company = Company::with('users')->find($id);
            // admin role= 1, user role == 0
            if(Auth :: user()->role == '1'){
                return view('admin.company.company',compact('company'));
            }
            else{
                return view('company',compact('company'));
            }
        }
        else{
            return redirect('/login')->with('message', 'Login to access the website info');
        }
    }
    public function redirect_employee_show($id)
    {
        if(Auth :: check())
        {
            $user = User::with('company')->find($id);
            // admin role= 1, user role == 0
            if(Auth :: user()->role == '1'){
                return view('admin.employee.employee',compact('user'));
            }
            else{
                return view('employee',compact('user'));
            }
        }
        else{
            return redirect('/login')->with('message', 'Login to access the website info');
        }
    }

    public function show($id)
    {
        $company = Company::with('users')->find($id);
        return view('company',compact('company'));

    }
    public function employeeshow($id)
    {
        $user = User::with('company')->find($id);
        return view('employee',compact('user'));

    }



}

