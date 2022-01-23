<form class="uk-form-horizontal uk-margin-large" method="POST">
    @csrf()
    <div class="uk-margin">
        <label class="uk-form-label" for="form-horizontal-select">Nom du matériel <span class="uk-text-danger">*</span></label>
        <div class="uk-form-controls">
            <input class="uk-input" type="text" name='title' placeholder="Nom">
            @if ($errors->has('title'))
                <span class="uk-text-danger">{{ $errors->first('title') }}</span>
            @endif
        </div>
    </div>

    <div class="uk-margin">
        <label class="uk-form-label" for="form-horizontal-select">Description</label>
        <div class="uk-form-controls">
            <textarea class="uk-textarea" name="description" rows="5" placeholder="Description"></textarea>
            
            @if ($errors->has('description'))
                <span class="uk-text-danger">{{ $errors->first('description') }}</span>
            @endif
        </div>
    </div>

    <div class="uk-margin">
        <label class="uk-form-label" for="form-horizontal-select">Prix du matériel<span class="uk-text-danger">*</span></label>
        <div class="uk-form-controls">
            <input class="uk-input" type="text" id='price' name='price' placeholder="Prix">
            @if ($errors->has('price'))
                <span class="uk-text-danger">{{ $errors->first('price') }}</span>
            @endif
        </div>
    </div>

    <div class="uk-flex uk-flex-right">
        <button type="submit" class="uk-button uk-button-primary">Enregistrer</button>
    </div>

</form>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelector("#price").onchange = check
    }, false);

    function check(event) {
        if(event.target.value < 0) {
            alert("Un prix en dessous de 0 n'est pas autorisé")
            event.target.value = 0
        }
    }
</script>