<div class="uk-navbar-right">
        
    <ul class="uk-navbar-nav">
        <li class="{{ request()->is('customers*') ? 'uk-active' : '' }}">
            <a href="#">Clients</a>
            <div class="uk-navbar-dropdown">
                <ul class="uk-nav uk-navbar-dropdown-nav">
                    <li class="{{ request()->is('customers') ? 'uk-active' : '' }}"><a href="{{ route('customer.index') }}">Liste</a></li>
                    <li class="{{ request()->is('customers/efficients') ? 'uk-active' : '' }}"><a href="{{ route('most.efficient.customers') }}">Clients les plus rentables (30 matériels, 30 000 €)</a></li>
                    <li class="{{ request()->is('customers/create') ? 'uk-active' : '' }}"><a href="{{ route('customer.create') }}">Ajouer un client</a></li>
                </ul>
            </div>
        </li>
        <li class="{{ request()->is('materials*') ? 'uk-active' : '' }}">
            <a href="#">Materiels</a>
            <div class="uk-navbar-dropdown">
                <ul class="uk-nav uk-navbar-dropdown-nav">
                    <li class="{{ request()->is('materials') ? 'uk-active' : '' }}"><a href="{{ route('material.index') }}">Liste</a></li>
                    <li class="{{ request()->is('materials/create') ? 'uk-active' : '' }}"><a href="{{ route('material.create') }}">Ajouer un matériel</a></li>
                    <li class="{{ request()->is('customer/material/create') ? 'uk-active' : '' }}"><a href="{{ route('customer.material.create') }}">Lier un matériel à un client</a></li>
                </ul>
            </div>
        </li>
    </ul>
        
</div>
        