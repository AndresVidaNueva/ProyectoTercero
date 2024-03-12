<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CursosController;
use App\Http\Controllers\UsersController;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/User',[UsersController::class,'index']);
Route::get('/user/export',[UsersController::class,'exportExcel'])->name('user.export');

Route::get('/User',[UsersController::class,'index']);
Route::post('/user/exports',[UsersController::class,'apiConnect'])->name('api.con');


// Route::get('/info', [TestController::class,'info'])->name('info');
// Route::post('/info', [TestController::class,'store'])->name('info');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

  Route::resource('cursos',CursosController::class);
  Route::resource('users',UsersController::class);


});

require __DIR__.'/auth.php';
