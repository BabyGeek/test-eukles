<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CustomerMaterialController extends Controller
{
    public function create()
    {
        return view('customers.pages.give-material');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'customer_id' => 'required',
            'material_id' => 'required',
        ], [
            'required' => 'Le champ :attribute est obligatoire.'
        ], [
            'customer_id' => 'client',
            'material_id' => 'materiel',
        ]);

        if($validator->fails()) {
            return back()->withErrors($validator);
        }

        $customer = Customer::findOrFail($request->get('customer_id'));

        $customer->materials()->syncWithoutDetaching([
            $request->get('material_id')
        ]);

        return back()->with('success', 'Enregistrement réussi.');
    }
}
