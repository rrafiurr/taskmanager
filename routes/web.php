<?php

use Illuminate\Support\Facades\Route;
use Rafiur\Controllers\TaskController;
use Rafiur\Controllers\AgentController;
//use Rafiur\TaskManager\Controller\TaskController;

Route::get('/task-list', [TaskController::class, 'show_task']);
Route::get('/add-task-with-assing', [TaskController::class, 'new_tas_with_assing']);
// Route::get('/update-task', [TaskController::class, 'new_tas_with_assing']);
// Route::get('/update-task-assing', [TaskController::class, 'new_tas_with_assing']);
// Route::get('/update-task/{id}', [TaskController::class, 'new_tas_with_assing']);
// Route::get('update-task-roting', [TaskController::class, 'new_tas_with_assing']);

Route::get('/agent-list', [AgentController::class, 'agent_list']);


Route::get('/my', function(){
    return "Hlw Rafiur";
});
