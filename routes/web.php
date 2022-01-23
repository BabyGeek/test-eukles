<?php

use App\Models\Customer;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CustomerMaterialController;
use App\Http\Controllers\MaterialController;
use App\Models\Material;
use Illuminate\Http\Request;

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

Route::get('/', function () {
    return redirect()->route('customer.index');
});

Route::controller(CustomerController::class)->prefix('/customers')->group(function () {
    Route::get('/', 'index')->name('customer.index');
    Route::get('/create', 'create')->name('customer.create');
    Route::post('/create', 'store')->name('customer.store');
    Route::get('/efficients', 'mostEfficients')->name('most.efficient.customers');
});

Route::controller(MaterialController::class)->prefix('/materials')->group(function () {
    Route::get('/', 'index')->name('material.index');
    Route::get('/create', 'create')->name('material.create');
    Route::post('/create', 'store')->name('material.store');
});

Route::controller(CustomerMaterialController::class)->prefix('customer/material/')->group(function () {
    Route::get('/create', 'create')->name('customer.material.create');
    Route::post('/create', 'store')->name('customer.material.store');
});

Route::get('ajax_customers', function(Request $request) {
    $data = [];

    if($request->has('q')){
        $search = $request->q;
        $data = Customer::select("id","firstname", "lastname")
            	->where('firstname','LIKE',"%$search%")
            	->orWhere('lastname','LIKE',"%$search%")
            	->get();
    }else {
        $data = Customer::all();
    }
    return response()->json($data);
});

Route::get('ajax_materials', function(Request $request) {
    $data = [];

    if($request->has('q')){
        $search = $request->q;
        $data = Material::select("id","title", "price")
            	->where('title','LIKE',"%$search%")
            	->get();
    }else {
        $data = Material::all();
    }
    return response()->json($data);
});