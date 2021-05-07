@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <form class="needs-validation" novalidate action="{{ Route('categories.store') }}" method="post">
            @csrf
            <div class="form-row">
            <div class="col-md-12 mb-3">
                <label>{{ __('lan.name') }}</label>
                <input type="text" class="form-control" name="name"  value="" required>
                {{-- <div class="valid-feedback">
                    Looks good!
                </div> --}}
            </div>
            <div class="col-md-12 mb-3">
                <label>{{ __('lan.description') }}</label>
                <textarea class="form-control" name="description" required></textarea>
                {{-- <div class="valid-feedback">
                    Looks good!
                </div> --}}
            </div>
            @if ( $categories->count() > 0 )
                <div class="col-md-12 mb-3">
                    <label> {{ __('lan.parent_category') }} </label>
                    <div class="input-group">
                        <select  class="form-control" name="parent_category" required>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        {{-- <div class="invalid-feedback">
                            Please enter car ptice.
                        </div> --}}
                    </div>
                </div>
            @endif

            <div class="col-md-12 mb-3">
                <label for="validationCustomUsername">{{ __('lan.status') }}</label>
                <div class="input-group">
                <select class="form-control" name="status">
                    <option value="1"> {{ __('lan.active') }} </option>
                    <option value="0"> {{ __('lan.inactive') }} </option>
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

            <div class="col-md-12 d-flex justify-content-center">
                <button class="btn btn-primary" type="submit">{{ __('lan.add_category') }}</button>
            </div>
        </form>
    </div>
</div>

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
