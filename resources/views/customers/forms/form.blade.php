<form class="uk-form-horizontal uk-margin-large" method="POST">
    @csrf()
    <div class="uk-margin">
        <label class="uk-form-label" for="form-horizontal-select">Prénom <span class="uk-text-danger">*</span></label>
        <div class="uk-form-controls">
            <input class="uk-input" type="text" name='firstname' placeholder="Prenom">
            @if ($errors->has('firstname'))
                <span class="uk-text-danger">{{ $errors->first('firstname') }}</span>
            @endif
        </div>
    </div>

    <div class="uk-margin">
        <label class="uk-form-label" for="form-horizontal-select">Nom <span class="uk-text-danger">*</span></label>
        <div class="uk-form-controls">
            <input class="uk-input" type="text" name='lastname' placeholder="Nom">
            @if ($errors->has('lastname'))
                <span class="uk-text-danger">{{ $errors->first('lastname') }}</span>
            @endif
        </div>
    </div>

    <div class="uk-flex uk-flex-right">
        <button type="submit" class="uk-button uk-button-primary">Enregistrer</button>
    </div>

</form>