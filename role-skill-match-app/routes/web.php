<?php

use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
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
use Illuminate\Support\Facades\Route;

Route::get('/role-listings', [RoleController::class, 'index']);
Route::get('/setup-role-listing', [RoleController::class, 'setup']);
Route::get('/create-role', function () {

    // Call the GET route and get the response
    $response = Route::dispatch(Request::create('/setup-role-listing', 'GET'));

    // Render the view and pass in the response content
    return view('/create-role')->with('content', $response->getContent());
});

Route::post('/create-role', [RoleController::class, 'store'])->name('create-role');

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('/create-role', function () {
//     return view('create-role', [
//         'header' => 'Create Role',
//         // 'role' =>$existingRole,

//         //this is the values to pass into frontend, possibly from backend
//         //retrieved values from role listing
//         'Role_Name' => '',
//         'title' => '',
//         'vacancy' => 0,
//         'deadline' => '',
//         'skills' => [],
//         'description' => '',
//         'deptDDL' => [
//             1,
//             2,
//             3,
//             4,
//             5,
//             6,
//             7,
//         ],

//         'workArrangementDDL' => [
//             1,
//             2,
//         ],

//         'countryID_DDL' => [
//             1,
//             2,
//             3,
//             4,
//             5,
//         ],

//         'Staff_ID' => 5,

//         // New role will be open by default
//         'status' => 1,

//         'hiringManagerDDL' => [
//             [
//                 'Staff_ID' => 1,
//                 'Staff_FullName' => 'Derek Tan',
//             ],

//             [
//                 'Staff_ID' => 2,
//                 'Staff_FullName' => 'Ernest Sim',
//             ],

//             [
//                 'Staff_ID' => 3,
//                 'Staff_FullName' => 'Eric Loh',
//             ],
//             [
//                 'Staff_ID' => 4,
//                 'Staff_FullName' => 'Philip Lee',
//             ],
//             [
//                 'Staff_ID' => 5,
//                 'Staff_FullName' => 'Sally Loh',
//             ],
//             [
//                 'Staff_ID' => 6,
//                 'Staff_FullName' => 'David Yap',
//             ],
//             [
//                 'Staff_ID' => 7,
//                 'Staff_FullName' => 'Peter Yap',
//             ],
//         ],

//         'skillsDDL' => [
//             1,
//             2,
//             3,
//             4,
//             5,
//             6,
//             7,
//             8,
//             9,
//             10,
//             11,
//             12,
//             13,
//             14,
//         ],

//         'dummyRoleList' => [

//             [
//                 'Role_ID' => 1,
//                 'Role_Name' => 'Sales Manager',
//                 'Description' => 'Manage sales team',
//                 'Department_ID' => 1, // Sales
//                 'Country_ID' => 1, //Singapore
//                 'Work_Arrangement' => 'Full-time',
//                 'Vacancy' => 5,
//                 'Status' => 1, //Open
//                 'Deadline' => '31/12/2023',
//                 'Creation_Date' => '20/9/2023',
//                 'Created_By' => 'Park Bo Gum',
//                 'Skills' => [
//                     'Python',
//                     'Excel',
//                     'Management',
//                 ],
//             ],

//         ],
//     ]);
// });
