<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        $customers = Customer::with('materials')
        ->paginate(40);

        $allCustomers = Customer::all();
        $mostEfficientCustomer = $allCustomers
        ->sortByDesc(function ($customer) {
            return $customer->materials->sum('price');
        })->first();

        return view('customers.pages.index', compact('customers', 'mostEfficientCustomer'));
    }

    public function mostEfficients()
    {
        $customers = Customer::withCount('materials')
        ->with('materials')
        ->whereHas('materials', function($q) {
            $q->where('price', '>', 30000);
        })
        ->having('materials_count', '>', 30)
        ->paginate(40);

        return view('customers.pages.efficient', compact('customers'));
    }

    public function create()
    {
        return view('customers.pages.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'firstname' => 'required|string|max:50',
            'lastname' => 'required|string|max:50',
        ], [
            'required' => 'Le champ :attribute est obligatoire.',
            'max' => 'Le champ :attribute ne doit pas dépasser les :max charactères'
        ], [
            'firstname' => 'nom',
            'lastname' => 'prenom',
        ]);

        if($validator->fails()) {
            return back()->withErrors($validator);
        }

        $customer = new Customer();
        $customer->firstname = $request->get('firstname');
        $customer->lastname = $request->get('lastname');
        $customer->save();

        return back()->with('success', 'Enregistrement réussi.');
    }
}
