@extends('layouts.app')


@section('content')
<table class="table" id="datatable">
    <thead>
        <tr>
            <th>{{ __('lan.name') }}</th>
            <th>{{ __('lan.locatin') }}</th>
            <th>{{ __('lan.phone') }}</th>
            <th>{{ __('lan.status') }}</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($stores as $sotre)
            <tr>
                <td>{{$sotre->name}}</td>
                <td>{{$sotre->location}}</td>
                <td>{{$sotre->phone}}</td>
                <td>{{$sotre->status ?? ''}}</td>
                {{-- <td>
                    <a  href="{{Route('cars.edit',$car->id)}}" class="btn btn-danger p-1"><i class="fa fa-edit"></i></a>
                    <button type="button" class="btn btn-info p-1" onClick="deleteCar({{$car->id}},this)"><i class="fa fa-trash"></i></button>
                    <a type="button" class="btn btn-info p-1"><i class="fa fa-lock"></i></a>
                </td> --}}
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
