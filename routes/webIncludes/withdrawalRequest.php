<?php
Route::prefix('admin/withdrawalRequest/')
    ->middleware(['auth'])
    ->group(function ($router) {
        Route::get('getAll',[App\Http\Controllers\Admin\WithdrawalrequestController::class, 'getALL'])->name('admin.withdrawalRequest.getAll');
    });
