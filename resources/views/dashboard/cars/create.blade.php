@extends('layouts.app')

@section('content')
<form class="needs-validation" novalidate action="{{ Route('cars.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    @if($errors->any())
        {!! implode('', $errors->all('<div>:message</div>')) !!}
    @endif
    <div class="form-row">
      <div class="col-md-6 mb-3">
        <label for="validationCustom01">{{ __('lan.name') }}</label>
        <input type="text" class="form-control" name="name" placeholder="Car name ..." value="Model Y" required>
        {{-- <div class="valid-feedback">
          Looks good!
        </div> --}}
      </div>
      <div class="col-md-6 mb-3">
        <label for="validationCustom02">{{ __('lan.brand') }}</label>
        <input type="text" class="form-control" name="brand" id="validationCustom02" placeholder="Car brand..." value="Tesla" required>
        {{-- <div class="valid-feedback">
          Looks good!
        </div> --}}
      </div>

      <div class="col-md-6 mb-3">
        <label for="validationCustomUsername">{{ __('lan.price') }}</label>
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroupPrepend">$</span>
          </div>
          <input type="number" class="form-control" name="price" placeholder="Price" aria-describedby="inputGroupPrepend" value="10" required>
          {{-- <div class="invalid-feedback">
            Please enter car ptice.
          </div> --}}
        </div>
      </div>

      <div class="col-md-6 mb-3">
        <label for="validationCustomUsername">{{ __('lan.model') }}</label>
        <div class="input-group">
          <input type="text" class="form-control" name="model" placeholder="Model" aria-describedby="inputGroupPrepend" value="S class" required>
          {{-- <div class="invalid-feedback">
          </div> --}}
        </div>
      </div>

      <div class="col-md-6 mb-3">
        <label for="validationCustom03">{{ __('lan.color') }}</label>
        <input type="text" class="form-control" name="color" placeholder="Color" value="red" required>
        {{-- <div class="invalid-feedback">
          Please provide a valid city.
        </div> --}}
      </div>

      <div class="col-md-6 mb-3">
        <label for="validationCustom04">{{ __('lan.type') }}</label>
        <input type="text" class="form-control" name="type" placeholder="Type" value="sport" required>
        {{-- <div class="invalid-feedback">
        </div> --}}
      </div>

    <div class="col-md-6 mb-3">
        <label for="validationCustom05">{{ __('lan.age') }}</label>
        <input type="text" class="form-control" name="age" placeholder="age" value="10 years" required>
        {{-- <div class="invalid-feedback">
        </div> --}}
    </div>

    <div class="col-md-6 mb-3">
        <label for="validationCustom04">{{ __('lan.kilometer') }}</label>
        <input type="text" class="form-control" name="kilometer" placeholder="kilometer" value="50KM" required>
        {{-- <div class="invalid-feedback">
        </div> --}}
    </div>

    <div class="col-md-6 mb-3">
        <label for="validationCustom05">{{ __('lan.status') }}</label>
        <select  class="form-control" name="status" required>
                <option value="1">{{ __('lan.new') }}</option>
                <option value="0">{{ __('lan.used') }}</option>
        </select>
        {{-- <div class="invalid-feedback">
        </div> --}}
    </div>

    <div class="col-md-6 mb-3">
        <label for="validationCustom05">{{ __('lan.image') }}</label>
        <input type="file" class="form-control" name="image" placeholder="image" value="new" accept="image/*" required>
        {{-- <div class="invalid-feedback">
        </div> --}}
    </div>

    @if ( $categories->count() > 0 )
        <div   div class="col-md-6 mb-3">
            <label> {{ __('lan.parent_category') }} </label>
            <div class="input-group">
                <select  class="form-control" name="category_id" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    @endif

    @if ( $stories->count() > 0 )
        <div   div class="col-md-6 mb-3">
            <label> {{ __('lan.store') }} </label>
            <div class="input-group">
                <select  class="form-control" name="store_id" required>
                    @foreach ($stories as $store)
                        <option value="{{ $store->id }}">{{ $store->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    @endif


      <div class="col-md-12 mb-3">
        <label for="validationCustom05">{{ __('lan.description') }}</label>
        <textarea type="text" class="form-control" name="description" placeholder="Description" required> Description here </textarea>
      </div>

    </div>
    <div class="form-group">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
        <label class="form-check-label" for="invalidCheck">
          {{ __('lan.terms_and_conditions') }}
        </label>
      </div>
    </div>
    <button class="btn btn-primary" type="submit"> {{ __('lan.add_car') }} </button>
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
