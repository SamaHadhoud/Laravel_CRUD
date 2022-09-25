<?php

use App\Models\User;
use App\Models\Company;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SearchController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

    Route::get('/', function () {
        return view('welcome');
    });

    Route::middleware([
        'auth:sanctum',
        config('jetstream.auth_session'),
        'verified'
    ])->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');
    });
    Route::get('/search', [SearchController::class, 'search'])->name('search');

    Route::get('/redirect', [HomeController::class, 'redirect'])->name("redirect");
    Route::get('/employees/redirect', [HomeController::class, 'redirect_employees'])->name("employees/redirect");

    Route::get('/redirect/{id}', [HomeController::class, 'redirect_show']);
    Route::get('/employee/redirect/{id}', [HomeController::class, 'redirect_employee_show']);


    Route :: prefix('admin')->middleware(["auth", "isAdmin"])->group(function(){
        // -----------------------------------company----------------------------------------
        // Store company Data
        Route::post('/postcompany', [AdminController::class, 'store'])->name("postcompany");;

        //create comapny
        Route::get('/company/create', [AdminController::class, 'create']);

        // Show Edit Form
        Route::get('company/{id}/edit', [AdminController::class, 'edit']);

        // Update Company
        Route::put('/company/{id}', [AdminController::class, 'update']);

        // Delete Listing
        Route::delete('/company/{id}', [AdminController::class, 'destroy'])->middleware('auth');

        // -----------------------------------employee----------------------------------------

        // Store employee Data
        Route::post('/postemployee', [AdminController::class, 'employeestore'])->name("postemployee");;

        //create employee
        Route::get('/employee/create', [AdminController::class, 'employeecreate']);

        // Show Edit Form
        Route::get('employee/{id}/edit', [AdminController::class, 'employeeedit']);

        // Update employee
        Route::put('/employee/{id}', [AdminController::class, 'employeeupdate']);

        // Delete Listing
        Route::delete('/employee/{id}', [AdminController::class, 'employeedestroy']);

        //show employee
        Route::get('/employee/{id}', [AdminController::class, 'employeeshow']);

        // -----------------------------------company----------------------------------------

        //show company
        Route::get('/{id}',[AdminController::class, 'show']);

    });

    Route::get('/{id}',[HomeController::class, 'show'])->name("company")->middleware('auth');
    Route::get('/employee/{id}',[HomeController::class, 'employeeshow'])->name("employee")->middleware('auth');

