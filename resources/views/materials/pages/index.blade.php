@extends('layouts.default', ['title' => 'Matériels'])

@section('content') 
            <div>
                {{ $materials->links() }}
            </div>

            <div class="uk-child-width-1-3@s uk-grid-match" uk-grid>
                @each('materials.partials.listing', $materials, 'material', 'materials.partials.listingEmpty')
            </div>

            <div>
                {{ $materials->links() }}
            </div>
@endsection