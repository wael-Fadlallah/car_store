@extends('layouts.app')

@section('content')
<form class="needs-validation" novalidate action="{{ Route('stores.store') }}" method="post">
    @csrf
    @if($errors->any())
        {!! implode('', $errors->all('<div>:message</div>')) !!}
    @endif
    <div class="form-row">
      <div class="col-md-6 mb-3">
        <label for="validationCustom01">{{ __('lan.name') }}</label>
        <input type="text" class="form-control" name="name"  value="" required>
        {{-- <div class="valid-feedback">
          Looks good!
        </div> --}}
      </div>
      <div class="col-md-6 mb-3">
        <label for="validationCustom02"> {{ __('lan.locatin') }} </label>
        <input type="text" class="form-control" name="location" id="validationCustom02" required>
        {{-- <div class="valid-feedback">
          Looks good!
        </div> --}}
      </div>

      <div class="col-md-6 mb-3">
        <label for="validationCustomUsername"> {{ __('lan.phone') }} </label>
        <div class="input-group">
          <div class="input-group-prepend">
            {{-- <span class="input-group-text" id="inputGroupPrepend"><i class="fa fa-user"></i></span> --}}
          </div>
          <input type="text" class="form-control" name="phone"  aria-describedby="inputGroupPrepend" required>
          {{-- <div class="invalid-feedback">
            Please enter car ptice.
          </div> --}}
        </div>
      </div>

      <div class="col-md-6 mb-3">
        <label for="validationCustomUsername">{{ __('lan.password') }}</label>
        <div class="input-group">
          <input type="password" class="form-control" name="password" aria-describedby="inputGroupPrepend" required>
          {{-- <div class="invalid-feedback">
            Please choose a username.
          </div> --}}
        </div>
      </div>

      <div class="col-md-6 mb-3">
        <label for="validationCustomUsername">{{ __('lan.status') }}</label>
        <div class="input-group">
          <select class="form-control" name="status">
            <option value="1"> {{ __('lan.open') }} </option>
            <option value="0"> {{ __('lan.close') }} </option>
          </select>
          {{-- <div class="invalid-feedback">
            Please choose a username.
          </div> --}}
        </div>
      </div>
    </div>

    <div class="form-group">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
        <label class="form-check-label" for="invalidCheck">
            {{ __('lan.terms_and_conditions') }}
        </label>
        <div class="invalid-feedback">
            {{ __('lan.must_agree') }}
        </div>
      </div>
    </div>
    <button class="btn btn-primary" type="submit">{{ __('lan.add_store') }}</button>
  </form>

  <script>
  // Example starter JavaScript for disabling form submissions if there are invalid fields
  (function() {
    'use strict';
    window.addEventListener('load', function() {
      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      var forms = document.getElementsByClassName('needs-validation');
      // Loop over them and prevent submission
      var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
          if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
          }
          form.classList.add('was-validated');
        }, false);
      });
    }, false);
  })();
  </script>
@endsection
