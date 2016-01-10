<?php

//user routes
Route::get('user/signup/{name}/{token}', 'UserController@signUp'); //mudar essa rota de get para post assim q possível
Route::post('user/login', 'UserController@login');
Route::put('user', 'UserController@update');
Route::put('user/saveGcmToken', 'UserController@saveGcmToken');
Route::put('user/saveFaceId', 'UserController@saveFaceId');
Route::put('user/saveProfilePicUrl', 'UserController@saveProfilePicUrl');
Route::get('user/{id}/mutualFriends', 'UserController@getMutualFriends');

//ride routes
Route::get('ride/all', 'RideController@listAll');
Route::post('ride', 'RideController@store');
Route::delete('ride/{rideId}', 'RideController@delete');
Route::post('ride/listFiltered', 'RideController@listFiltered');
Route::post('ride/requestJoin', 'RideController@requestJoin');
Route::get('ride/getRequesters/{rideId}', 'RideController@getRequesters');
Route::post('ride/answerJoinRequest', 'RideController@answerJoinRequest');
Route::get('ride/getMyActiveRides', 'RideController@getMyActiveRides');
Route::post('ride/leaveRide', 'RideController@leaveRide');
Route::post('ride/finishRide', 'RideController@finishRide');
Route::get('ride/getRidesHistory', 'RideController@getRidesHistory');
Route::get('ride/getRidesHistoryCount/{userId}', 'RideController@getRidesHistoryCount');
Route::post('ride/saveFeedback', 'RideController@saveFeedback');

//falae routes
Route::post('falae/sendMessage', 'FalaeController@sendMessage');

//rota padrão do laravel podemos excluir depois
Route::get('/', function () {
    return View::make('welcome');
});