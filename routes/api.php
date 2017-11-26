<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/test', function(){
    return response()-> json([
        'api' => [
            'api_name' => 'store management api',
            'project' => 'Vue.Js special assignment',
            'completion_date' => 'Dec 10, 2017'
        ]
    ]);
});

