@extends('layouts.app')


@section('content')
<table class="table" id="datatable">
    <thead>
        <tr>
            <th>{{ __('lan.name') }}</th>
            <th>{{ __('lan.image') }}</th>
            <th>{{ __('lan.description') }}</th>
            <th>{{ __('lan.price') }}</th>
            <th>{{ __('lan.brand') }}</th>
            <th>{{ __('lan.model') }}</th>
            <th>{{ __('lan.color') }}</th>
            <th>{{ __('lan.type') }}</th>
            <th>{{ __('lan.age') }}</th>
            <th>{{ __('lan.kilometer') }}</th>
            <th>{{ __('lan.status') }}</th>
            <th>{{ __('lan.actions') }}</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($cars as $car)
            <tr>
                <td>{{$car->name}}</td>
                <td>
                    <img src="{{ asset("storage/car/$car->image") }}" alt="car image" class="img-responsive" width="100px">
                </td>
                <td>{{$car->description}}</td>
                <td>{{$car->price}}</td>
                <td>{{$car->brand}}</td>
                <td>{{$car->model}}</td>
                <td>{{$car->color}}</td>
                <td>{{$car->type}}</td>
                <td>{{$car->age}}</td>
                <td>{{$car->kilometer}}</td>
                <td>{{$car->status}}</td>
                @if (Auth::user()->hasRole('SuperAdmin'))
                    <td style="text-align:center;">
                        <a  href="{{Route('cars.edit',$car->id)}}" class="btn btn-danger p-1 action-btn"><i class="fa fa-edit"></i></a>
                        <button type="button" class="btn btn-info p-1 action-btn" onClick="deleteCar({{$car->id}},this)"><i class="fa fa-trash"></i></button>
                        <a type="button" class="btn btn-info p-1 action-btn"><i class="fa fa-lock"></i></a>
                    </td>
                @else
                    <td>
                        login as a super admin to make actions
                    </td>
                @endif
            </tr>
        @endforeach
    </tbody>
</table>
@endsection

@section('scripts')
<script>
    function deleteCar(id,element) {
        const tr = element.closest('tr');
        Swal.fire({
        title: `{{ __('lan.you_sure') }}`,
        text: `{{ __('lan.not_revertable') }}`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText:`{{ __('lan.yes_delete') }}`,
        cancelButtonText:`{{ __('lan.cancel') }}`,
        }).then((result) => {
        if (result.isConfirmed) {
            const url = `/cars/${id}`;
            var xhr = new XMLHttpRequest();
            xhr.open("DELETE", url);
            xhr.setRequestHeader("X-CSRF-TOKEN", document.querySelector('meta[name="csrf-token"]').content );
            xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                console.log(xhr.status);
                console.log(xhr.responseText);
                Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
                )
                tr.remove();
            }};
            xhr.send();
        }
        })
    }
</script>
@endsection
