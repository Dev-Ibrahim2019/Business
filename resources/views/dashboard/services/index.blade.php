@extends('layouts.dashboard')
@section('title', 'Services')
@section('breadcrumb')
    @parent
    <span class="text-muted mt-1 tx-13 ms-2 mb-0">/ Services</span>
@endsection
@section('content')
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">Service List</h3>
                    <div class="d-flex">
                        <a class="btn btn-primary text-light mx-3" href="{{ route('dashboard.services.create') }}">Create
                            Service</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                            <thead>
                                <tr>
                                    <th class="wd-5p">ID</th>
                                    <th class="wd-15p">Service</th>
                                    <th class="wd-20p">Description</th>
                                    <th class="wd-20p">Created At</th>
                                    <th class="wd-10p">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($services as $service)
                                    <tr>
                                        <td>{{ $service->id }}</td>
                                        <td>{{ $service->name }}</td>
                                        <td>{{ Str::limit($service->desc, 20) }}</td>
                                        <td>{{ $service->created_at }}</td>
                                        <td name="bstable-actions">
                                            <div class="btn-list d-flex">
                                                <a id="bEdit"
                                                    href="{{ route('dashboard.services.edit', $service->id) }}"
                                                    class="btn btn-sm btn-primary mx-3">
                                                    <span class="fe fe-edit"> </span>
                                                </a>
                                                {{-- <form action="{{ route('dashboard.services.destroy', $service->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button id="bDel" type="submit" class="btn btn-sm btn-danger">
                                                        <span class="fe fe-trash-2"> </span>
                                                    </button>
                                                </form> --}}
                                                <a id="bDel" onclick="confirmDestroy({{ $service->id }}, this)" class="btn btn-sm btn-danger">
                                                    <span class="fe fe-trash-2"> </span>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-center" colspan="7">No Services Defined</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $services->withQueryString()->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
<script>
    function confirmDestroy(id, reference) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                destroy(id, reference);
            }
        })
    }

    function destroy(id, reference) {
        axios.delete('/dashboard/services/' + id)
            .then(function(response) {
                // handle success
                console.log(response);
                reference.closest('tr').remove();
                showMessage(response.data)
            })
            .catch(function(error) {
                // handle error
                console.log(error);
                showMessage(error.response.data);
            })
            .then(function() {
                // always executed
            });
    }

    function showMessage(data) {
        Swal.fire({
            icon: data.icon,
            title: data.title,
            showConfirmButton: false,
            timer: 1500
        })
    }
</script>
@endpush
