<?php

    use App\Http\Controllers\UserController;
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\AnnonceController;
    use App\Http\Controllers\ChatController;

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


Route::get('/form',[\App\Http\Controllers\AnnonceController::class,'showForm'])->middleware('auth');
Route::get('/',[\App\Http\Controllers\AnnonceController::class,'show'])->middleware('auth');
Route::post('/store-form',[\App\Http\Controllers\AnnonceController::class,'store'])->middleware('auth');

    Route::controller(UserController::class)->group(function () {
        Route::get('/users', 'index')->name('user.index');
        Route::get('/user/create', 'create')->name('user.create');
        Route::post('/user/store', 'store')->name('user.store');
        Route::get('/user/{user}', 'show')->name('user.show');
        Route::get('/user/{user}/edit', 'edit')->name('user.edit');
        Route::put('/user/{user}/update', 'update')->name('user.update');
        Route::delete('/user/{user}/delete', 'delete')->name('user.delete');
    });

    Route::get('/editpro',[UserController::class,'edit'])->middleware('auth');;
    Route::get('/user/{id}/update',[UserController::class,'update'])->middleware('auth');;

    Route::get('/test1',[\App\Http\Controllers\AnnonceController::class,'useAnnoce'])->middleware('auth');;
    //Route::get('/test2',[\App\Http\Controllers\AnnonceController::class,'useAnnoce']);



    Route::get('/annonce/{id}/edit',[AnnonceController::class,'edit'])->name('annonce.update')->middleware('auth');
    Route::put('annonce/{id}/update',[AnnonceController::class,'update'])->middleware('auth')->middleware('auth');
    Route::delete('/annonce/{id}/delete',[AnnonceController::class,'delete'])->name('annonce.delete')->middleware('auth');


    Route::get('/s','\App\Http\Controllers\SearchController@index')->middleware('auth')->middleware('auth');
    Route::get('/search','\App\Http\Controllers\SearchController@search')->middleware('auth')->middleware('auth');

   Route::get('/message/{id}/form',[ChatController::class,'showwindow'])->middleware('auth');
   Route::post('/message/{id_receive}/store',[ChatController::class,'store'])->middleware('auth');
   Route::get('/listchat',[ChatController::class,'showlist'])->middleware('auth');




Route::get('/dashboard', function () {
    return redirect('/');
})->middleware(['auth','verified'])->name('/');

require __DIR__.'/auth.php';
