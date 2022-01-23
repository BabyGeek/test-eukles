<form class="uk-form-horizontal uk-margin-large" method="POST">
    @csrf()
    <div class="uk-margin">
        <label class="uk-form-label" for="form-horizontal-select">Client</label>
        <div class="uk-form-controls">
            <select name="customer_id" class="uk-select customer-single-select" id="form-horizontal-select-customer">
            </select>
            @if ($errors->has('customer_id'))
                <span class="uk-text-danger">{{ $errors->first('customer_id') }}</span>
            @endif
        </div>
    </div>

    <div class="uk-margin">
        <label class="uk-form-label" for="form-horizontal-select">Materiel</label>
        <div class="uk-form-controls">
            <select name="material_id" class="uk-select material-single-select" id="form-horizontal-select-material">
            </select>
            @if ($errors->has('material_id'))
                <span class="uk-text-danger">{{ $errors->first('material_id') }}</span>
            @endif
        </div>
    </div>

    <div class="uk-flex uk-flex-right">
        <button type="submit" class="uk-button uk-button-primary">Enregistrer</button>
    </div>

</form>

<script type="text/javascript">
    $('.customer-single-select').select2({
      placeholder: 'Selectionner un client',
      ajax: {
        url: '/ajax_customers',
        dataType: 'json',
        delay: 250,
        processResults: function (data) {
          return {
            results:  $.map(data, function (item) {
                  return {
                      text: item.firstname + ' ' + item.lastname,
                      id: item.id
                  }
              })
          };
        },
        cache: true
      }
    });

    $('.material-single-select').select2({
      placeholder: 'Selectionner un matériel',
      ajax: {
        url: '/ajax_materials',
        dataType: 'json',
        delay: 250,
        processResults: function (data) {
          return {
            results:  $.map(data, function (item) {
                  return {
                      text: item.title + ' (' + item.price + ' €)',
                      id: item.id
                  }
              })
          };
        },
        cache: true
      }
    });
</script>