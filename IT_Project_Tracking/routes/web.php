<?php

use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\MilestoneController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\RequirementController;
use App\Http\Controllers\RequirementtypeController;

use Illuminate\Support\Facades\Route;

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

Route::get('/',[UserController::class,'login']);

Route::get('admin', function () {
    return view('admindashboard');
});

Route::get('engineer', function () {
    return view('engineerdashboard');
});

//roles routes
Route::get('roles',[RoleController::class,'all']);
Route::get('role/add',[RoleController::class,'add']);
Route::post('role/save',[RoleController::class,'save']);
Route::post('role/update/{Role_id}',[RoleController::class,'update']);
Route::get('role/edit/{Role_id}',[RoleController::class,'edit']);
Route::get('role/delete/{Role_name}',[RoleController::class,'delete']);

//users routes
Route::get('users',[UserController::class,'all']);
Route::get('user/add',[UserController::class,'add']);
Route::post('user/save',[UserController::class,'save']);
Route::post('user/update/{User_id}',[UserController::class,'update']);
Route::get('user/edit/{User_id}',[UserController::class,'edit']);
Route::get('user/delete/{User_id}',[UserController::class,'delete']);

//organizations routes
Route::get('organizations',[OrganizationController::class,'all']);
Route::get('organization/add',[OrganizationController::class,'add']);
Route::post('organization/save',[OrganizationController::class,'save']);
Route::post('organization/update/{Organization_id}',[OrganizationController::class,'update']);
Route::get('organization/edit/{Organization_id}',[OrganizationController::class,'edit']);
Route::get('organization/delete/{Organization_id}',[OrganizationController::class,'delete']);

//milestones routes
Route::get('milestones',[MilestoneController::class,'all']);
Route::get('milestone/add',[MilestoneController::class,'add']);
Route::post('milestone/save',[MilestoneController::class,'save']);
Route::post('milestone/update/{Milestone_id}',[MilestoneController::class,'update']);
Route::get('milestone/edit/{Milestone_id}',[MilestoneController::class,'edit']);
Route::get('milestone/delete/{Milestone_id}',[MilestoneController::class,'delete']);

//payments routes
Route::get('payments',[PaymentController::class,'all']);
Route::get('payment/add',[PaymentController::class,'add']);
Route::post('payment/save',[PaymentController::class,'save']);
Route::get('payment/delete/{Payment_id}',[PaymentController::class,'delete']);

//projects routes
Route::get('projects',[ProjectController::class,'all']);
Route::get('project/add',[ProjectController::class,'add']);
Route::post('project/save',[ProjectController::class,'save']);
Route::post('project/update/{Project_id}',[ProjectController::class,'update']);
Route::get('project/edit/{Project_id}',[ProjectController::class,'edit']);
Route::get('project/delete/{Project_id}',[ProjectController::class,'delete']);

//requirements routes
Route::get('requirements',[RequirementController::class,'all']);
Route::get('requirement/add',[RequirementController::class,'add']);
Route::post('requirement/save',[RequirementController::class,'save']);
Route::post('requirement/update/{Requirement_id}',[RequirementController::class,'update']);
Route::get('requirement/edit/{Requirement_id}',[RequirementController::class,'edit']);
Route::get('requirement/delete/{Requirement_id}',[RequirementController::class,'delete']);

//requirementtypes routes
Route::get('requirementtypes',[RequirementtypeController::class,'all']);
Route::get('requirementtype/add',[RequirementtypeController::class,'add']);
Route::post('requirementtype/save',[RequirementtypeController::class,'save']);
Route::post('requirementtype/update/{RequirementType_id}',[RequirementtypeController::class,'update']);
Route::get('requirementtype/edit/{RequirementType_id}',[RequirementtypeController::class,'edit']);
Route::get('requirementtype/delete/{RequirementType_id}',[RequirementtypeController::class,'delete']);
