<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    public function show($id)
    {
        $company = Company::with('users')->find($id);
        return view('admin.company.company',compact('company'));

    }

    // Show Create Form
    public function create() {
        return view('admin.company.create');
    }
    // Store Company Data
    public function store(Request $request) {

        $formFields = $request->validate([
            'name' => ['required', Rule::unique('companies', 'name')],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'description' => 'required'
        ]);

        if($request->hasFile('logo')) {
            $file= $request->file('logo');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('logo'), $filename);
            $formFields['logo']= $filename;
        }


        Company::create($formFields);

        return redirect('/redirect')->with('message', 'Company created successfully!');
    }


    // Show Edit Form
    public function edit($id) {
        $company = Company::find($id);
        return view('admin.company.edit', compact('company'));
    }


        // Update Company Data
        public function update(Request $request, $id) {
            $company = Company::find($id);


            $formFields = $request->validate([

                'name' => 'required',
                'location' => 'required',
                'website' => 'required',
                'email' => ['required', 'email'],
                'description' => 'required'
            ]);

            if($request->hasFile('logo')) {
                $file= $request->file('logo');
                $filename= date('YmdHi').$file->getClientOriginalName();
                $file-> move(public_path('logo'), $filename);
                $formFields['logo']= $filename;
            }

            $company->update($formFields);

            return redirect('/redirect')->with('message', 'Comapny updated successfully!');
        }


            // Delete Company
            public function destroy($id) {
                $company = Company::find($id);
                $company->delete();
            return redirect('/redirect')->with('message', 'company deleted successfully');
        }

            //-----------------------------------empl0yee----------------------------------------------

            public function employeeshow($id) {
                $user = User::with('company')->find($id);
                return view('admin.employee.employee',compact('user'));

        }

        // Show Create Form
        public function employeecreate() {
            $company = Company::all();

        return view('admin.employee.create',compact('company'));
        }
        // Store employee Data
        public function employeestore(Request $request) {

            $formFields = $request->validate([
                'name' => 'required',
                'company_id' => 'required',
                'title' => 'required',
                'email' => ['required', 'email'],
                'password'=>'required',
            ]);

            if($request->hasFile('photo')) {
                $file= $request->file('photo');
                $filename= date('YmdHi').$file->getClientOriginalName();
                $file-> move(public_path('storage/'), $filename);
                $formFields['profile_photo_path']= $filename;
            }


            User::create($formFields);

            return redirect('/redirect')->with('message', 'Employee created successfully!');
        }
        // Show Edit Form
        public function employeeedit($id) {
            $company = Company::all();
            $user = User::find($id);
            return view('admin.employee.edit', compact('company', 'user'));
        }


        // Update employee Data
        public function employeeupdate(Request $request, $id) {
            $employee = User::find($id);


            $formFields = $request->validate([

                'name' => 'required',
                'company_id' => 'required',
                'title' => 'required',
                'email' => ['required', 'email']
            ]);

            if($request->hasFile('logo')) {
                $file= $request->file('logo');
                $filename= date('YmdHi').$file->getClientOriginalName();
                $file-> move(public_path('logo'), $filename);
                $formFields['logo']= $filename;
            }
            if($request->hasFile('photo')) {
                $file= $request->file('photo');
                $filename= date('YmdHi').$file->getClientOriginalName();
                $file-> move(public_path('storage'), $filename);
                $formFields['profile_photo_path']= $filename;
            }

            $employee->update($formFields);

            return redirect("/employees/redirect")->with('message', 'Employee updated successfully!');
        }


            // Delete employee
            public function employeedestroy($id) {
                $employee = User::find($id);
                $employee->delete();
            return redirect("/employees/redirect")->with('message', 'employee deleted successfully');
        }

}
