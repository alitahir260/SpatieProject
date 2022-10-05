<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\ResourceController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/Route::get('/', function () {
    return view('welcome');
});
Route::get('/test', function () {
    return view('test');
});



Route::prefix('admin')->group(function()
{
    Route::get('/registeradmin', [AdminController::class, 'registeradmin'])->name('registeradmin')->middleware((['role:admin', 'auth']));
    Route::post('/storeadmin', [AdminController::class, 'storeadmin'])->middleware(['auth','role:admin'])->name('storeadmin');

    Route::get('RegisterWithModal',[AdminController::class, 'testroute']);
    Route::post('storetesting',[AdminController::class, 'storetesting']);

    
    Route::get('/data', [AdminController::class, 'showdata'])->middleware(['auth'])->name('data');
    Route::get('/DataUpdate/{users}', [AdminController::class, 'DataUpdate'])->middleware(['auth']);
    Route::put('/DataUpdated/{users}', [AdminController::class, 'DataUpdated'])->middleware(['auth']);

    Route::get('/roles', [AdminController::class, 'showroles'])->middleware(['auth'])->name('roles');
    Route::get('/role-edit/{roles}',[AdminController::class,'editrole'])->middleware(['auth','role:admin']);
    Route::put('/role-update/{roles}',[AdminController::class,'updaterole'])->middleware(['auth','role:admin']);
    Route::get('/role-delete/{roles}',[AdminController::class,'deleterole'])->middleware(['auth','role:admin']);
    Route::get('/add-role',[AdminController::class,'addrole'])->middleware(['auth','role:admin']);

    Route::get('/Permission',[AdminController::class,'showpermission'])->middleware(['auth','role:admin']);
    Route::get('/permission-edit/{permissions}',[AdminController::class,'editpermission'])->middleware(['auth','role:admin']);
    Route::put('/permission-update/{permissions}',[AdminController::class,'updatepermission'])->middleware(['auth','role:admin']);
    Route::get('/permission-delete/{permissions}',[AdminController::class,'deletepermission'])->middleware(['auth','role:admin']);
    Route::post('/roles/assign-permission/{roles}',[AdminController::class,'assignpermission'])->middleware(['auth','role:admin']);
    Route::get('/revoke-roles/{roles}/{permissions}',[AdminController::class,'revokepermissions'])->middleware(['auth','role:admin']);
    Route::get('/add-permission',[AdminController::class,'addpermission'])->middleware(['auth','role:admin']);
    Route::post('/store-permission',[AdminController::class,'storepermission'])->middleware(['auth','role:admin']);
    Route::post('/store-role',[AdminController::class,'storerole'])->middleware(['auth','role:admin']);

});
Route::get('/dashboard',[AdminController::class,'index'])->middleware(['auth', 'role:admin']);

// Route::get('/home',[HomeController::class,'homepage'])->middleware(['auth','role:admin']);

Route::get('/home',[HomeController::class,'homepage'])->middleware(['auth','role:admin']);
Route::get('/add-files', [FileController::class,'addfiles']);
Route::post('/store-files', [FileController::class,'storefiles']);
Route::get('/show-files', [FileController::class,'showfiles']);

Route::resource('AllData/', ResourceController::class);
Route::put('UpdateAllData/{id?}',[AdminController::class,'UpdateAllData']);
Route::get('ShowData',[AdminController::class,'EditAllData']);


//edit with ajax/jquery

Route::get('/Users/{id}',[AdminController::class,'getUserId']);
Route::put('/User',[AdminController::class,'updateStudent'])->name('student.update');






require __DIR__.'/auth.php';


























// Route::get('/registeradmin', [AdminController::class, 'registeradmin'])->name('registeradmin')->middleware((['role:admin', 'auth']));
// Route::post('/storeadmin', [AdminController::class, 'storeadmin'])->middleware(['auth','role:admin'])->name('storeadmin');
// Route::get('/dashboard',[AdminController::class,'index'])->middleware(['auth']);
// Route::get('/data', [AdminController::class, 'showdata'])->middleware(['auth'])->name('data');
// Route::get('/roles', [AdminController::class, 'showroles'])->middleware(['auth'])->name('roles');
// Route::get('send-email', [MailController::class,'sendemail'])->middleware(['auth']);
// Route::get('/Permission',[AdminController::class,'showpermission'])->middleware(['auth','role:admin']);
// Route::get('/add-role',[AdminController::class,'addrole'])->middleware(['auth','role:admin']);
// Route::post('/store-role',[AdminController::class,'storerole'])->middleware(['auth','role:admin']);
// Route::get('/add-permission',[AdminController::class,'addpermission'])->middleware(['auth','role:admin']);
// Route::post('/store-permission',[AdminController::class,'storepermission'])->middleware(['auth','role:admin']);
// Route::get('/permission-edit/{permissions}',[AdminController::class,'editpermission'])->middleware(['auth','role:admin']);
// Route::put('/permission-update/{permissions}',[AdminController::class,'updatepermission'])->middleware(['auth','role:admin']);
// Route::get('/permission-delete/{permissions}',[AdminController::class,'deletepermission'])->middleware(['auth','role:admin']);
// Route::get('/role-edit/{roles}',[AdminController::class,'editrole'])->middleware(['auth','role:admin']);
// Route::put('/role-update/{roles}',[AdminController::class,'updaterole'])->middleware(['auth','role:admin']);
// Route::get('/role-delete/{roles}',[AdminController::class,'deleterole'])->middleware(['auth','role:admin']);
// Route::post('/roles/assign-permission/{roles}',[AdminController::class,'assignpermission'])->middleware(['auth','role:admin']);
// Route::get('/revoke-roles/{roles}/{permissions}',[AdminController::class,'revokepermissions'])->middleware(['auth','role:admin']);

