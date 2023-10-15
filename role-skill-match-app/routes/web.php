<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UpdateRoleController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ViewRoleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Route for role listings page
Route::get('/role-listings', [RoleController::class, 'index']);

// Route for view-role-applicants page
Route::get('/view-role-applicants/listingID={passedlisting}', [App\Http\Controllers\ViewRoleApplicants::class, 'getApplicantListing']);

# Route for browse-roles page
Route::get('browse-roles', [App\Http\Controllers\BrowseAllRoleController::class, 'index_view'])->name('browse-roles');

Route::get('/create-role', [RoleController::class, 'setup']);
Route::post('/create-role', [RoleController::class, 'store'])->name('create-role');

Route::get('/', function () {
    return view('welcome');
});

//store listing data
Route::post('/updateRole', [UpdateRoleController::class, 'store']);

//get listing 
Route::get('/edit/listingID={passedlisting}', [UpdateRoleController::class, 'autoFillRoleListing']);

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/alldept', [App\Http\Controllers\UpdateRoleController::class, 'retrieveAllSkills'])->name('home');

Route::get('/alldepartments', [App\Http\Controllers\UpdateRoleController::class, 'retrieveAllDepartments'])->name('home');

Route::get('/hiringManagerDDL', [UpdateRoleController::class, 'retrieveAllHiringManagers']);
Route::get('/skillsDDL', [UpdateRoleController::class, 'retrieveAllSkills']);

Route::get('/view-role/listingID={passedlisting}', [ViewRoleController::class, 'getListing']);