<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Tool API Routes
|--------------------------------------------------------------------------
|
| Here is where you may register API routes for your tool. These routes
| are loaded by the ServiceProvider of your tool. They are protected
| by your tool's "Authorize" middleware by default. Now, go build!
|
*/

Route::post('/draft-publish/{draftId}', 'Sylapi\NovaDrafts\Http\DraftController@publishDraft');
Route::post('/draft-unpublish/{draftId}', 'Sylapi\NovaDrafts\Http\DraftController@unpublishDraft');
