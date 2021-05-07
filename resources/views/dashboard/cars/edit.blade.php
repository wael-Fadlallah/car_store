@extends('layouts.app')

@section('content')
<form class="needs-validation" novalidate action="{{ Route('cars.update',$car->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method("PATCH")
    <div class="form-row">
      <div class="col-md-6 mb-3">
        <label for="validationCustom01">Car name</label>
        <input type="text" class="form-control" name="name" placeholder="Car name ..." value="{{ $car->name }}" required>
        <div class="valid-feedback">
          Looks good!
        </div>
      </div>
      <div class="col-md-6 mb-3">
        <label for="validationCustom02">Car brand</label>
        <input type="text" class="form-control" name="brand" id="validationCustom02" placeholder="Car brand..." value="{{ $car->brand }}" required>
        <div class="valid-feedback">
          Looks good!
        </div>
      </div>

      <div class="col-md-6 mb-3">
        <label for="validationCustomUsername">Price</label>
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroupPrepend">$</span>
          </div>
          <input type="number" class="form-control" name="price" placeholder="Price" aria-describedby="inputGroupPrepend" value="{{ $car->price }}" required>
          <div class="invalid-feedback">
            Please enter car ptice.
          </div>
        </div>
      </div>

      <div class="col-md-6 mb-3">
        <label for="validationCustomUsername">Model</label>
        <div class="input-group">
          <input type="text" class="form-control" name="model" placeholder="Model" aria-describedby="inputGroupPrepend" value="{{ $car->model }}" required>
          <div class="invalid-feedback">
            Please choose a username.
          </div>
        </div>
      </div>

      <div class="col-md-6 mb-3">
        <label for="validationCustom03">Color</label>
        <input type="text" class="form-control" name="color" placeholder="Color" value="{{ $car->color }}" required>
        <div class="invalid-feedback">
          Please provide a valid city.
        </div>
      </div>

      <div class="col-md-6 mb-3">
        <label for="validationCustom04">Type</label>
        <input type="text" class="form-control" name="type" placeholder="Type" value="{{ $car->type }}" required>
        <div class="invalid-feedback">
          Please provide a valid state.
        </div>
      </div>

    <div class="col-md-6 mb-3">
        <label for="validationCustom05">Age</label>
        <input type="text" class="form-control" name="age" placeholder="age" value="{{ $car->age }}" required>
        <div class="invalid-feedback">
          Please provide a valid zip.
        </div>
    </div>

    <div class="col-md-6 mb-3">
        <label for="validationCustom04">kilometer</label>
        <input type="text" class="form-control" name="kilometer" placeholder="kilometer" value="{{ $car->kilometer }}" required>
        <div class="invalid-feedback">
            Please provide a valid state.
        </div>
    </div>

    <div class="col-md-6 mb-3">
        <label for="validationCustom05">Status</label>
        <input type="text" class="form-control" name="status" placeholder="Status" value="{{ $car->status }}" required>
        <div class="invalid-feedback">
            Please provide a valid zip.
        </div>
    </div>

    <div class="col-md-6 mb-3">
        <label for="validationCustom05">Image</label>
        <input type="file" class="form-control" name="image" placeholder="image" value="new" accept="image/*">
        <div class="invalid-feedback">
            Please provide a valid zip.
        </div>
    </div>

    @if ( $categories->count() > 0 )
        <div   div class="col-md-6 mb-3">
            <label> Category </label>
            <div class="input-group">
                <select  class="form-control" name="category_id" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @if( $car->category_id == $category->id ) selected @endif >{{ $category->name }}</option>
                    @endforeach
                </select>
                <div class="invalid-feedback">
                    Please enter car ptice.
                </div>
            </div>
        </div>
    @endif

    @if ( $stories->count() > 0 )
        <div   div class="col-md-6 mb-3">
            <label> Store </label>
            <div class="input-group">
                <select  class="form-control" name="store_id" required>
                    @foreach ($stories as $store)
                        <option value="{{ $store->id }}" @if( $car->store_id == $store->id ) selected @endif>{{ $store->name }}</option>
                    @endforeach
                </select>
                <div class="invalid-feedback">
                    Please enter car ptice.
                </div>
            </div>
        </div>
    @endif


      <div class="col-md-12 mb-3">
        <label for="validationCustom05">Description</label>
        <textarea type="text" class="form-control" name="description" placeholder="Description" required> {{ $car->description }} </textarea>
        <div class="invalid-feedback">
          Please provide a valid zip.
        </div>
      </div>

    </div>

    <button class="btn btn-primary" type="submit">Submit form</button>
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
