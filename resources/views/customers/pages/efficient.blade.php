@extends('layouts.default', ['title' => 'Clients avec 30 matériels minimum à 30000€ minimum'])

@section('content') 
            <div>
                {{ $customers->links() }}
            </div>
            
            <div class="uk-child-width-1-3@s uk-grid-match" uk-grid>
                @each('customers.partials.listing', $customers, 'customer', 'customers.partials.listingEmpty')
            </div>

            <div>
                {{ $customers->links() }}
            </div>
@endsection