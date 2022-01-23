@extends('layouts.default', ['title' => 'Clients'])

@section('content') 

            <div class="uk-child-width-1-1 uk-grid-match" uk-grid>
                @include('customers.partials.most-efficient', ['customer' => $mostEfficientCustomer])
            </div>


            <div>
                {{ $customers->links() }}
            </div>

            <div class="uk-child-width-1-3@s uk-grid-match" uk-grid>
                @each('customers.partials.listing', $customers->sortByDesc(function ($customer) {
                    return $customer->materials->sum('price');
                }), 'customer', 'customers.partials.listingEmpty')
            </div>

            <div>
                {{ $customers->links() }}
            </div>
@endsection