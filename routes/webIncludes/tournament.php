<?php
Route::prefix('admin/tournament/')
    ->middleware(['auth'])
    ->group(function ($router) {
        Route::get('add',[App\Http\Controllers\Admin\TournamentController::class, 'addView'])->name('admin.tournament.add');
        Route::post('add',[App\Http\Controllers\Admin\TournamentController::class, 'add'])->name('admin.tournament.add');
        Route::get('getOne/{id}',[App\Http\Controllers\Admin\TournamentController::class, 'getOne'])->name('admin.tournament.getOne');
        Route::get('deleteOne/{id}',[App\Http\Controllers\Admin\TournamentController::class, 'deleteOne'])->name('admin.tournament.deleteOne');
        Route::post('update/{id}',[App\Http\Controllers\Admin\TournamentController::class, 'update'])->name('admin.tournament.update');
        Route::any('start/{id}',[App\Http\Controllers\Admin\TournamentController::class, 'start'])->name('admin.tournament.start');
        Route::any('end/{id}',[App\Http\Controllers\Admin\TournamentController::class, 'end'])->name('admin.tournament.end');
        Route::get('getAll',[App\Http\Controllers\Admin\TournamentController::class, 'getALL'])->name('admin.tournament.getAll');
    });
