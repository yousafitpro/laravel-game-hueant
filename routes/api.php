<?php

Route::group([
    'namespace' => 'App\Http\Controllers',
    'prefix' => 'v1/auth'

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
    Route::post('register', 'AuthController@register');
});

Route::group([
    'namespace' => 'App\Http\Controllers\API',
    'prefix' => 'v1'

], function ($router) {

    Route::get('score_by_game_id', 'ScoreController@score_by_game_id');
    Route::post('save_score', 'ScoreController@save_score');

    Route::post('set_wallet_amount', 'WalletAmountController@set_wallet_amount');
    Route::get('get_wallet', 'WalletAmountController@get_wallet');


    Route::post('withdraw_request', 'WithdrawalrequestController@withdraw_request');

    Route::get('get_withdraw_history', 'WithdrawalhistoryController@get_withdraw_history');

    Route::post('send_time', 'leaderboardController@send_time');
});
