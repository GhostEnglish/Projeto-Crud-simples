<?php

use App\Http\Controllers\ClienteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user',function(Request $request){
    return $request->user();
});
Route::get('/index',[ClienteController::class,'index'])->name('api.index');
Route::post('/store',[ClienteController::class,'store'])->name('api.store');
Route::get('/edit/{id}',[ClienteController::class,'edit'])->name('api.edit');
Route::delete('/delete/{id}',[ClienteController::class,'destroy'])->name('api.destroy');
Route::put('/update/{id}',[ClienteController::class,'update'])->name('api.update');
Route::get('/', function () {
    return response()->json(['message' => 'Tudo Funcionando certinho'], 200);
});




