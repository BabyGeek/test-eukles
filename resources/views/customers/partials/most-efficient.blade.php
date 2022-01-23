    <div>
        <div class="uk-card uk-card-hover uk-card-body">
            <h3 class="uk-card-title uk-text-center">Le plus rentable</h3>

                <div class="uk-child-width-1-2@s" uk-grid>
                    <div>
                        <i class="uk-text-warning fas fa-medal fa-7x"></i>
                    </div>
                    <div>
                            <p>{{ $customer->lastname }} {{ $customer->firstname }}</p>
                
                            @if ($customer->materials)
                                <p>Matériels : {{ $customer->materials->count() }}</p>
                                <p>Prix total des matériels : {{ $customer->materials->sum('price') }} €</p>
                            @endif
                    </div>
                </div>
        </div>
    </div>