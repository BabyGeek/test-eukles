    <div>
        <div class="uk-card uk-card-hover uk-card-body">
            <h3 class="uk-card-title">{{ $customer->id }}</h3>
            <p>{{ $customer->lastname }} {{ $customer->firstname }}</p>

            @if ($customer->materials)
                <p>Matériels : {{ $customer->materials->count() }}</p>
                <p>Prix total des matériels : {{ $customer->materials->sum('price') }} €</p>
            @endif
        </div>
    </div>