<?php

use App\Http\Controllers\ApprovalController;
use App\Http\Controllers\inventoryusageController;
use App\Http\Controllers\TitleController;
use App\Http\Controllers\ExpertiseController;
use App\Http\Controllers\LectureController;
use App\Http\Controllers\LogbookController;
use App\Http\Controllers\ProposalController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SvHuntingController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return redirect('login');
});




Route::get('/studentdashboard', function () {
    return view('studentdashboard');
});
// Route::get('/lecturedashboard', function () {
//     return view('lecturedashboard');
// });


Auth::routes();
Route::get('/lecturedashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('lecturedashboards');

//student profile
Route::resource('/StudentProfile', StudentController::class);

//inventory usage
Route::resource('/inventory', inventoryusageController::class);
Route::get('/listRequestLecture', [inventoryusageController::class, 'listRequestLecture'])->name('listRequestLecture');
Route::get('/studentApprovelist', [inventoryusageController::class, 'studentApprovelist'])->name('studentApprovelist');
Route::get('/listApprovetLecture', [inventoryusageController::class, 'listApprovetLecture'])->name('listApprovetLecture');



Route::resource('/expertise', ExpertiseController::class);
Route::get('/SvHunting/expertise/{id}', [ExpertiseController::class, 'view'])->name('SvHuntingExpertise');

Route::get('/expertiseEdit', function () {
    return view('expertise.edit');
});

//Proposal
Route::resource('/proposal', ProposalController::class);

//title
Route::resource('/title', TitleController::class);
Route::get('/listtitle', [TitleController::class, 'listtitlestudent'])->name('listtitle');

Route::put('/Book/{id}', [TitleController::class, 'Book'])->name('Book');


//Logbook
Route::resource('/logbook', LogbookController::class);
Route::get('/indexlogbooklecture', [LogbookController::class, 'indexlogbooklecture'])->name('indexlogbooklecture');
Route::get('/verifylogbook/{id}', [LogbookController::class, 'verifylogbook'])->name('verifylogbook');
Route::put('/comfimationverifylogbook/{id}', [LogbookController::class, 'comfimationverifylogbook'])->name('comfimationverifylogbook');

//lecture
Route::resource('/LectureProfile', LectureController::class);

//approval
Route::resource('/Approval', ApprovalController::class);

//proposal
Route::resource('/SvHunting', SvHuntingController::class);
